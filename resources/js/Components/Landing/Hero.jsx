
import { ArrowUpRight } from 'react-bootstrap-icons';
import CountUp from 'react-countup';
import { Link } from '@inertiajs/react';
const Hero = () => {

  return (
   <>

   <div className="flex min-h-[100vh] overflow-hidden flex-col items-center justify-between mx-8 sm:flex-row">
        <div className="flex flex-col order-2 w-full gap-4 sm:order-1">

        <div className="mb-4 text-4xl font-archivo uppercase font-black md:text-4xl text-secondary">Experience
            <span className="px-3 mx-3 rounded-full bg-tertiary text-secondary">
                Art with</span> Chimwemwe Luwanda</div>
        <p className="mb-8 text-sm md:text-extralight">Join My Solo Art Exhibitions
            ,Sip & Paint Events. <br />
            Discover the joy of creating art on canvases
             with expert guidance from me.
        </p>


        <div className="flex items-center gap-4 my-7 fex-col sm:flex-row">

        <button className="px-4 py-4 text-xs text-center text-white rounded-full shadow-sm min-w-28 bg-secondary hover:bg-secondary">
              Shop Now
        </button>

        <Link className="font-bold text-secondary" href="/gallery">check out my work</Link>

        </div>


        </div>


        <div className="order-1 w-full sm:order-2">

         <img src="/images/hero-image.png" alt="chimzy_art"  className='w-full h-full px-10 py-10'/>
        </div>
   </div>
   </>
  )
}

export default Hero
