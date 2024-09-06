import React, { useState } from 'react';
import {XLg} from 'react-bootstrap-icons';
import { List } from 'react-bootstrap-icons';
import { Link, usePage } from '@inertiajs/react';
import { Cart } from 'react-bootstrap-icons';



const Nav = () => {
  const [menu, setMenu] = useState(false);
  const handleChange = () =>{
    setMenu(!menu);
  }

 const {appName,auth} = usePage().props;

  return (
    <header className="sticky top-0 z-10 py-4 shadow-sm max-w-screen bg-chimzy_bg/10 backdrop-blur ">

            <nav className="flex items-center justify-between h-10 px-4 py-4 text-xl w">
                <Link href={route('home')} className="text-sm font-black text-secondary">{appName}</Link>
                <div className="items-center hidden gap-8 text-xs bg-primary md:flex text-secondary">
                <Link className="text-sm" href={route('about')}>About Me</Link>
                <Link className="text-sm" href={route('gallery.index')}>My Work</Link>
                <Link className="text-sm" href={route('exhibition.index')}>Events</Link>
                {
                  auth.user ? (
                    <Link className="text-sm" href={route('dashboard')}>Profile</Link>
                  ) : (
                    <>
                    <Link className="text-sm" href={route('login')}>Login</Link>
                    <Link className="px-3 py-2 text-sm text-black rounded-full bg-tertiary" href={route('register')}>Register</Link>
                    </>
                  )
                }

                </div>

                {/* <div>
                  <Cart size={20}/>
                </div> */}

              <div className='flex items-center md:hidden'>
                {menu ? (
                    <XLg size={25} onClick={handleChange}/>
                  ):(<List size={25} onClick={handleChange}/>)}
              </div>

            </nav>

        <div className={`${menu ? "translate-x-0" : "-translate-x-full"} md:hidden flex flex-col absolute bg-tertiary text-secondary font-black left-0 top-16  text-2xl text-center pt-4 pb-4 gap-8 w-full h-screen transition-transform duration-300`}>
          <Link className="text-xs" href={route('home')}>Home</Link>
          <Link className="text-xs" href={route('gallery.index')}>Gallery</Link>
          <Link className="text-xs" href={route('exhibition.index')}>Exhibition</Link>
          <Link className="text-xs" href={route('about')}>About Us</Link>
          {
                  auth.user ? (
                    <Link className="text-sm" href={route('dashboard')}>Profile</Link>
                  ) : (
                    <>
                    <Link className="text-sm" href={route('login')}>Login</Link>
                    <Link className="px-3 py-2 text-sm text-black rounded-full bg-tertiary" href={route('register')}>Register</Link>
                    </>
                  )
                }
        </div>
    </header>
  )
}

export default Nav
