import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                lato: ['Lato'],
                handjet: ['Handjet'],
            },
            colors: {
                greenPrimary: "#000000",
                greenSecondary: "#B0E0E6",
                backgroundPrimary: "#B0E0E6",
                backgroundSecondary: "#F7E1AE",
                dark: "#000000",
            }
        },
    },

    plugins: [
        forms,
        require("daisyui"),
        require('tailwind-scrollbar')({ nocompatible: true }),
    ],
};
