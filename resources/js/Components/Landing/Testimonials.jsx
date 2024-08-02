import { testimonials } from '@/constants';
import { StarFill , StarHalf } from 'react-bootstrap-icons';
import Marquee from 'react-fast-marquee';


const Testimonials = () => {

  return (

      <Marquee pauseOnHover={true} speed={60} gradient={true} gradientWidth={200} gradientColor="rgba(248, 251, 253, 1)">
      <div className="grid grid-cols-1 gap-4 cursor-pointer sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 my-7">

       {testimonials.map(testimonial => (
          <div className="flex-1 px-8 py-6 h-[300px] place-content-center items-center w-auto bg-white rounded shadow ">
              <p className='my-4 italic font-extralight'>{testimonial.message}</p>
              <h1 className="font-bold font-montserrat">{testimonial.customer}</h1>
              <h1 className="font-semibold font-montserrat">Shamaza Brands - CEO</h1>
              <div className="flex flex-row">
                 <StarFill className="text-yellow-400" />
                 <StarFill className="text-yellow-400" />
                 <StarFill className="text-yellow-400" />
              </div>
          </div>
       ))}

        </div>

       </Marquee>

  );
};



export default Testimonials