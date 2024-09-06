import { ArrowRight } from "react-bootstrap-icons"
const ContactSection = () => {


    return (
        <>

        <div className="bg-right bg-gradient-to-r min-h-auto from-tertiary to-[#FFFCE9] ">
            <div className="px-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div className="flex flex-col items-center justify-center">
                    <div className="w-full py-10 flex flex-col items-center justify-center">
                        <h1 className='text-5xl text-black font-semibold font-alef'>Shop a print and your home will love you.</h1>
                        <button className="flex items-center text-black justify-center gap-2 py-4 text-lg leading-none border rounded-3xl bg-white px-7 mt-5 font-montserrat">
                            Shop Art Prints
                            <ArrowRight />
                        </button>
                    </div>
                </div>
            </div>
       </div>
        </>

    )

}


export default ContactSection
