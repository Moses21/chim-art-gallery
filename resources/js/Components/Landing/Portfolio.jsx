import { artworks } from "@/constants";
import recentork1 from '../../../../public/images/portfolio-1.jpg'
import recentork2 from '../../../../public/images/portfolio-2.jpg'
import recentork3 from '../../../../public/images/portfolio-3.jpg'
import recentork4 from '../../../../public/images/portfolio-4.jpg'
import recentork5 from '../../../../public/images/portfolio-5.jpg'
import recentork6 from '../../../../public/images/portfolio6.jpg'

const Portfolio = () => {
  return (
    <section className="px-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div className="mb-8 rounded-lg padding-t md:mb-12 md:grid-cols-3">
        <div className="">
          <h3 className="my-3 text-[18px] text-gray-500 font-montserrat uppercase text-center">my works</h3>
          <p className=" w-full text-4xl font-semibold text-secondary font-alef text-center">Recent works that make me very proud</p>
        </div>
        <section class="bg-white">
          <div class="py-4 px-2 mx-auto max-w-screen-xl sm:py-4 lg:px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 h-full">
              <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-gray-50 h-auto md:h-full flex flex-col">
                <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                  <img src={recentork1} alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"/>
                  <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                  <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">Paintings</h3>
                </a>
              </div>
              <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-stone-50">
                <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 mb-4">
                  <img src={recentork2} alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"/>
                  <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                  <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">Abstracts</h3>
                </a>
                <div class="grid gap-4 grid-cols-2 sm:grid-cols-2 lg:grid-cols-2">
                  <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                    <img src={recentork3} alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"/>
                    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                    <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">Nature</h3>
                  </a>
                  <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40">
                    <img src={recentork4} alt="" class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"/>
                    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                    <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">Illustrations</h3>
                  </a>
                </div>
              </div>
              <div class="col-span-2 sm:col-span-1 md:col-span-1 bg-sky-50 h-auto md:h-full flex flex-col">
                <a href="" class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow">
                  <img src={recentork5} class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"/>
                  <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                  <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">Paintings</h3>
                </a>
              </div>
            </div>
          </div>
        </section>

      </div>
    </section>
  )
}

export default Portfolio