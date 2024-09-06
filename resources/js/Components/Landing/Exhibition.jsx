import React from 'react';
import { events } from '@/constants';
import EventCard from '@/Components/EventCard';

const Exhibition = () => {
  return (

    <>
    <div className="px-4 max-w-7xl mx-auto sm:px-6 lg:px-8 md:mb-12">
      <div className="mb-8 rounded-lg padding-t md:mb-12">
          <h3 className="w-full text-4xl font-semibold text-secondary font-alef md:w-1/2">
            Upcoming Events
          </h3>
      </div>
      <div className="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-8">
      {events.map((event) => (
            <EventCard key={event.id} {...event} />
          ))}
      </div>
    </div>
    </>
  )
}

export default Exhibition

