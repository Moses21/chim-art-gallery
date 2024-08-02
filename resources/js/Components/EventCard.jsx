import { Heart } from "react-bootstrap-icons";
import { TicketDetailed } from "react-bootstrap-icons";
import { Calendar } from "react-bootstrap-icons";
const EventCard = ({imgURL, topic, price, scheduleDay,scheduleMon, details}) => {
  return (
    <div className="rounded overflow-hidden shadow-lg">
    <div className="relative">
      <a href="#">
        <img className="w-full object-cover" src={imgURL}  alt=""/>
          <div className="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
          </div>
      </a>
      <a href="#!">
        <div className="absolute top-0 left-0 rounded bg-white inline-block font-semibold px-4 py-2 text-black text-sm hover:bg-white hover:text-yellow-600 transition duration-500 ease-in-out mt-3 ml-3">
         <span><TicketDetailed color="red"/></span> MK{price}
        </div>
      </a>

      <a href="!#">
        <div className="text-sm absolute top-0 right-0 bg-white px-4 text-black rounded-full h-12 w-12 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-yellow-600 transition duration-500 ease-in-out">
          <span className="font-bold"><Heart color="#ff6347"/></span>
        </div>
      </a>
    </div>
    <div className="flex items-center font-semibold font-montserrat px-4 gap-4 py-4">
      <a href="#">
      {scheduleDay}<br/>{scheduleMon}
      </a>
      <p className="text-gray font-medium md:font-semibold md:text-lg justify-start">
        {topic}<br/>
        <small className="font-light">{details}</small>
      </p>
    </div>
  </div>
  )
}

export default EventCard;