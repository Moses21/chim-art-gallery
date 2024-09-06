import React from 'react'
import { events } from '@/constants'
import EventCard from '../EventCard'

const ExhibitionPage = () => {
  return (
    <div className='container py-8 lg:py-28'>
        <div className="px-4 max-w-7xl mx-auto sm:px-6 lg:px-8 md:mb-12">
        <div className="">
            <h3 className="w-full text-2xl md:text-4xl font-semibold text-secondary font-alef py-4 md:w-1/2">
                Upcoming Events
            </h3>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-4 sm:grid-cols-2 gap-6">
        {events.map((event) => (
                <EventCard key={event.id} {...event} />
            ))}
        </div>
        </div>
    </div>
  )
}

export default ExhibitionPage