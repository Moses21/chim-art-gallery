import React from 'react'
import CountUp from 'react-countup';

const Intro = () => {
  return (
    <section className="px-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div className="mb-8 rounded-lg padding-t md:mb-12 md:grid-cols-3">
        <div className="">
          <h3 className=" my-3 text-[18px] text-gray-500 font-montserrat uppercase text-center">Do what I love</h3>
          <p className="w-full text-4xl font-semibold text-secondary font-alef text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
        </div>
        <div className='flex flex-col md:flex-row justify-between items-center mt-5 text-black gap-8 '>
          <div class="flex flex-col items-center justify-center p-8 text-center bg-white shadow">
              <div className='font-bold font-inter text-[40px]'>
                <CountUp start={0} end={200} duration={3}/>+
              </div>
              <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                  <h3 class="text-lg font-semibold text-gray-900">Painting</h3>
                  <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo accusamus culpa iure molestias autem quo doloremque laboriosam ducimus facere laudantium a exercitationem"</p>
              </blockquote>
          </div>
          <div class="flex flex-col items-center justify-center p-8 text-center bg-white shadow">
              <div className='font-bold font-inter text-[40px]'>
                <CountUp start={0} end={200} duration={3}/>+
              </div>
              <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                  <h3 class="text-lg font-semibold text-gray-900">Painting</h3>
                  <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo accusamus culpa iure molestias autem quo doloremque laboriosam ducimus facere laudantium a exercitationem"</p>
              </blockquote>
          </div>
          <div class="flex flex-col items-center justify-center p-8 text-center bg-white shadow">
              <div className='font-bold font-inter text-[40px]'>
                <CountUp start={0} end={200} duration={3}/>+
              </div>
              <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                  <h3 class="text-lg font-semibold text-gray-900">Painting</h3>
                  <p class="my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo accusamus culpa iure molestias autem quo doloremque laboriosam ducimus facere laudantium a exercitationem"</p>
              </blockquote>
          </div>
        </div>
      </div>
    </section>
  )
}

export default Intro
