import React from 'react';
import GalleryPage from '@/Components/includes/GalleryPage';
import Landing from '@/Layouts/LandingLayout';

const Gallery = () => {
  return (
        <div className='mx-4 sm:py-24 py-14' >

            <div className=''>

                    <GalleryPage />
            </div>
        </div>
  )
}

Gallery.layout = (page) => <Landing children={page} />

export default Gallery
