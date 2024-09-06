import Landing from '@/Layouts/LandingLayout';
import React,{useEffect} from 'react';
import Skeleton from 'react-loading-skeleton';
import { Link, TicketDetailed,HeartFill } from 'react-bootstrap-icons';
import { Clock } from 'react-bootstrap-icons';
import { Calendar } from 'react-bootstrap-icons';
import { usePage } from '@inertiajs/react';

import $ from 'jquery';

import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import axios from 'axios';


const ShowItems = ({id,pub_key,return_url}) =>{

    const {auth } = usePage().props;

    useEffect(() => {
        // Load the Paychangu script
        const script = document.createElement('script');
        script.src = "https://in.paychangu.com/js/popup.js";
        script.async = true;
        document.body.appendChild(script);

        return () => {
            // Clean up the script when the component unmounts
            document.body.removeChild(script);
        };
    }, []);


    const addToFavorites = (id) => {

        if(auth.user == undefined || auth.user == null){
          toast('you need to be logged in to add this item to your favorites; redirecting to you to the login page', {
            position: "top-right",
            autoClose: 5000,
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
          });

          window.location.href = route('login');
        }else{

            axios.post(route('wishlist.store'), {
                'item_id': id
            })
            .then(response => {
                toast(`added to favorites ${response.data}`, {
                    position: "top-right",
                    autoClose: 5000,
                    hideProgressBar: false,
                    closeOnClick: true,
                    pauseOnHover: true,
                    draggable: true,
                    progress: undefined,
                  });
            })
            .catch(error => {
                toast('something went wrong', {
                    position: "top-right",
                    autoClose: 5000,
                    hideProgressBar: false,
                    closeOnClick: true,
                    pauseOnHover: true,
                    draggable: true,
                    progress: undefined,
                  });
            })

        }
    }

    const makePayment = () => {

        if(auth.user == undefined || auth.user == null){
          toast('you need to be logged in to buy this item; redirecting to you to the login page', {
            position: "top-right",
            autoClose: 5000,
            hideProgressBar: false,
            closeOnClick: true,
            pauseOnHover: true,
            draggable: true,
            progress: undefined,
          });

          window.location.href = route('login');
        }else{

            PaychanguCheckout({
                "public_key": pub_key,
                "tx_ref": '' + Math.floor((Math.random() * 1000000000) + 1),
                "amount": id.data.pretty_price,
                "currency": "MWK",
                "callback_url": route("changu.callback"),
                "return_url": return_url,
                "customer": {
                    "email": auth.user.email,
                    "first_name": auth.user.name,
                    "last_name": auth.user.username,
                },
                "customization": {
                    "title": id.data.name,
                    "description": id.data.clean_description,
                },
                "meta": {
                    "uuid": "uuid",
                    "response": "Response"
                }
            });
        }


    };




    return (
        <>
         <div id="wrapper"></div>
        <ToastContainer
            position="top-right"
            autoClose={5000}
            hideProgressBar={false}
            newestOnTop={false}
            closeOnClick
            rtl={false}
            pauseOnFocusLoss
            draggable
            pauseOnHover
            theme="light"
        />
       {!id.data && <Skeleton count={4} />}
       <div className='container py-40 mx-4 lg:py-40'>
        <div className='grid grid-cols-1 gap-4 md:grid-cols-3'>
            <div className=''>
                <img src={id.data.avatar}  alt={id.data.name}/>
            </div>
            <div className='col-span-2 md:px-12'>
                <h1 className='text-4xl font-alef'>{id.data.name}</h1>
                <p className='my-10 font-inter' dangerouslySetInnerHTML={{ __html: id.data.description}}>
                    {/* {id.data.description} */}
                </p>
                <div className='flex flex-col items-start md:justify-between md:items-center md:flex-row'>
                    <div className='flex items-center gap-5 my-4'>
                        <Calendar />
                        <p className='font-inter'> {id.data.created_at}</p>
                    </div>
                    <div className='flex items-center gap-5 my-4'>
                        <Clock />
                        <p className='font-inter'>{id.data.dimensions}</p>
                    </div>
                    <div className='flex items-center gap-5 my-4'>
                        <TicketDetailed />
                        <p className='font-inter'>{id.data?.price}</p>
                    </div>
                </div>
                <div className='flex items-center gap-3 py-5 md:gap-8'>
                    <Link onClick={() => addToFavorites(id.data.id) } className="flex items-center justify-center gap-2 py-3 text-lg text-white bg-black border border-black rounded px-7 font-montserrat">
                        Add to Favorites
                        <HeartFill />
                    </Link>
                    <button onClick={() => makePayment()} className="flex items-center justify-center gap-2 py-3 text-lg leading-none text-white border rounded bg-secondary border-secondary px-7 font-montserrat">
                     Buy Now
                    </button>
                </div>
            </div>
        </div>
    </div>
        </>
    );
}

ShowItems.layout = (page) => <Landing children={page}/>

export default ShowItems;
