import React from 'react'

const Portfolio = ({categories}) => {
  return (
    <section className="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div className="mb-8 rounded-lg padding-t md:mb-12 md:grid-cols-3">
        <div className="">
          <h3 className="my-3 text-[18px] text-gray-500 font-montserrat uppercase text-center">my works</h3>
          <p className="w-full text-4xl font-semibold text-center text-secondary font-alef">Recent works that make me very proud</p>
        </div>


        <section class="bg-white my-10">
  <div class="py-4 px-2 mx-auto max-w-screen-xl sm:py-4 lg:px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 h-full">
      {categories.map((category, index) => (
        <>
          {/* 1st category */}
          {index === 0 && (
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-gray-50 h-auto md:h-full flex flex-col">
              <a
                href=""
                class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow"
              >
                <img
                  src={category.avatar}
                  alt={category.name}
                  class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">
                  {category.name}
                </h3>
              </a>
            </div>
          )}

          {/* 2nd category with nested categories */}
          {index === 1 && (
            <div class="col-span-2 sm:col-span-1 md:col-span-2 bg-stone-50">
              <a
                href=""
                class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 mb-4"
              >
                <img
                  src={category.avatar}
                  alt={category.name}
                  class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">
                  {category.name}
                </h3>
              </a>

              <div class="grid gap-4 grid-cols-2 sm:grid-cols-2 lg:grid-cols-2">
                {/* group it it in its own category and re iterate on it as nested 2 items  */}
                {categories.slice(2, 4).map((nestedCategory) => (
                  <a
                    href=""
                    class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40"
                  >
                    <img
                      src={nestedCategory.avatar}
                      alt={nestedCategory.name}
                      class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                    />
                    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                    <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">
                      {nestedCategory.name}
                    </h3>
                  </a>
                ))}
              </div>
            </div>
          )}

          {/* 5th category */}
          {index === 4 && (
            <div class="col-span-2 sm:col-span-1 md:col-span-1 bg-sky-50 h-auto md:h-full flex flex-col">
              <a
                href=""
                class="group relative flex flex-col overflow-hidden rounded-lg px-4 pb-4 pt-40 flex-grow"
              >
                <img
                  src={category.avatar}
                  alt={category.name}
                  class="absolute inset-0 h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/25 to-gray-900/5"></div>
                <h3 class="z-10 text-xl font-medium text-white absolute top-0 left-0 p-4 xs:text-xl md:text-2xl">
                  {category.name}
                </h3>
              </a>
            </div>
          )}
        </>
      ))}
    </div>
  </div>
</section>


      </div>
    </section>

)

}

export default Portfolio
