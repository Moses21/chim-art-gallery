import React from 'react'
import ExhibitionPage from '@/Components/includes/ExhibitionPage';
import Landing from '@/Layouts/LandingLayout';

const Exhibition = () => {
  return (
    <div className='mx-4'>

        <ExhibitionPage />

    </div>
  )
}

Exhibition.layout = (page) => <Landing children={page} />

export default Exhibition