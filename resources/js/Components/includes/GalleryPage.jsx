import React from 'react';
import { Cart } from 'react-bootstrap-icons';
import { galleries } from '@/constants';


const GalleryPage = () => {
  return (
    <div className='container pt-18 lg:pt-28'>
      <div className='grid grid-cols-2 mb-8 border border-gray-200 md:mb-12 md:grid-cols-4 bg-pale-blue'>
        {galleries.map(gallery=> (
          <div className='flex flex-col p-6 bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e' key={gallery.id} >
            <div className="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
              <img src={gallery.imgURL}/>
            </div>
            <div className="">
              <div className="space-y-0.2 flex justify-between items-center ms-3">
                  <div className=''>
                    <h3 className='text-sm md:text-xl font-semibold capitalize font-inter'>{gallery.title}</h3>
                    <p className='font-inter'><span className='text-[14px]'>{gallery.dimensions}</span><br/>{gallery.price}</p>
                  </div>
                  
                  <span className='flex text-white items-center justify-center p-3 text-red rounded-full bg-[#f9db23]'>
                        <Cart size={22}/>
                    </span>
              </div>
          </div>
          </div>
        ))}
      </div>
    </div>
  )
}

export default GalleryPage
