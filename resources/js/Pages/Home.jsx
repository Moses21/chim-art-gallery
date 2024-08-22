import Hero from '../Components/Landing/Hero';
import Testimonials from '../Components/Landing/Testimonials';
import Portfolio from '../Components/Landing/Portfolio';
import Intro from '../Components/Landing/Intro';
import Exhibition from '../Components/Landing/Exhibition';

import Landing from '@/Layouts/LandingLayout';
import ContactSection from '@/Components/Landing/Contact';
const Home = ({items,categories}) => {
  return (
    <>

        <Hero />
        <Intro/>
        <Portfolio categories={categories.data}/>
        <ContactSection/>
        <Exhibition exhibtion={items.data}  />
        {/* this will be testimonials */}
        <Testimonials />

    </>
  )
}


Home.layout = (page) => <Landing children={page} />

export default Home
