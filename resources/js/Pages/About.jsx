import React from 'react'
import Landing from '@/Layouts/LandingLayout';

const About = () => {
  return (
    <>
    <div className='flex flex-col items-center justify-center mx-4'>
                <img src='/images/chim.jpg' className='w-32 h-32 border-4 rounded-full border-radius-3xl border-tertiary' />
                <h1 className='my-3 text-4xl font-black text-secondary'>Chimwemwe Luwanda</h1>
                <p className='my-4 text-center font-inter font-extralight text-wrap'>

                </p>
     </div>
    </>
  )
}

About.layout = (page) => <Landing children={page} />
export default About;
