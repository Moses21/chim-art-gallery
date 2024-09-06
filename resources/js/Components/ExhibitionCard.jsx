import React, { useState } from 'react';
import { ArrowUpRight } from 'react-bootstrap-icons';
import Skeleton from 'react-loading-skeleton';

const ExhibitionCard = ({ item }) => {
    const [isLoading, setIsLoading] = useState(true);
  return (
    <div className="flex  mx-6 flex-col items-center overflow-hidden w-[248px] h-[264px]">

        { isLoading && <Skeleton height={248} width={264} /> }

        <div className='w-[248] h-[264px]'>
        <img onLoad={() => setIsLoading(false)}
            src={item.avatar} alt={item.name}
             className="object-cover w-full h-full overflow-hidden rounded shadow-lg aspect-square hover:scale-105" width="248" height="264" />
        </div>



       <h2 className="my-4 mb-2 font-bold text-gray-900">{item.name || <Skeleton /> }</h2>


      {/* <div className="p-6">
        <h2 className="mb-2 text-2xl font-bold text-gray-900">{item.name}</h2>
        <p className="mb-4 text-gray-700 truncate">{item.description.substring(0, 100)}</p>
        <div className="flex items-center justify-between">
          <h3 className="text-xl font-semibold text-gray-900">MWK {item.price}</h3>
          <span className="flex items-center justify-center text-gray-600 transition hover:text-gray-900">
            <ArrowUpRight size={20} />
          </span>
        </div>
        <div className="flex items-center justify-between mt-4 text-gray-600">
          <small>Created on: {item.created_at}</small>
          <small>Dimensions: {item.dimensions}</small>
        </div>
      </div> */}

    </div>
  );
};

export default ExhibitionCard;
