import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                alef: ['Alef','serif'],
                young: ['Young Serif', 'serif'],
                montserrat: ['Montserrat', 'sans-serif'],
                inter: ['Inter','sans-serif'],
                archivo: ['Archivo Black','sans-serif']
            },
            colors:{
                chimzy_bg : "#fefef2",
                secondary: "#368a70",
                tertiary: "#f9db23"
            }
        },
    },

    plugins: [forms],
};
