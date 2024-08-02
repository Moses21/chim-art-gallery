import Footer from '@/Components/Landing/Footer';
import Nav from '@/Components/Nav';

export default function Landing({ children }) {
    return (
        <>
        <Nav/>
         <div className="w-full mx-auto bg-chimzy_bg">
         {children}
         </div>

        <Footer />
        </>
    );
}
