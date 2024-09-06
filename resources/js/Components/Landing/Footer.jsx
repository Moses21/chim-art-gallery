import React from 'react'
import { Instagram, Whatsapp } from 'react-bootstrap-icons';
import { Facebook } from 'react-bootstrap-icons';
const Footer = () => {
  return (
    <div className='bottom-0 w-full text-white bg-black'>
        <div className='container py-10 mx-4'>
            <div className='py-4 border-b border-white'>
              <h1 className='w-full text-4xl font-semibold text-secondary font-alef'>Lets take a moment that last forever.</h1>
            </div>
            <div className='flex flex-col justify-between py-3 md:flex-row gap-y-4'>
                <h4 className='font-alef text-[22px] uppercase'>Lets connect</h4>
                <div className=''>
                    <h2 className='text-xl font-semibold font-alef'>Business</h2>
                    <p className='text-xl font-alef'>info@chimartgallery.com</p>
                    <p className='text-xl font-alef'>+265 991 057 321</p>
                </div>
                <div className=''>
                    <h2 className='text-xl font-semibold font-alef'>Follow me</h2>
                    <div className='flex flex-row gap-4'>
                        <Facebook />
                        <Instagram/>
                        <Whatsapp />
                    </div>
                </div>
            </div>
        </div>
    </div>
  )
}

export default Footer
