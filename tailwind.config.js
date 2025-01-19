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
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'text': '#31207B',
                'brand': {
                    '50': '#edf0ff',
                    '100': '#dee2ff',
                    '200': '#c4caff',
                    '300': '#a0a7ff',
                    '400': '#7d7bfe',
                    '500': '#685bf9',
                    '600': '#5b3eed',
                    '700': '#5336d3',
                    '800': '#402aa9',
                    '900': '#372a85',
                    '950': '#22184e',
                },
                'nd': {
                    '50': '#fbf5fe',
                    '100': '#f7ebfc',
                    '200': '#eed5f9',
                    '300': '#e4b4f3',
                    '400': '#d487eb',
                    '500': '#c56ae0',
                    '600': '#a439c0',
                    '700': '#8a2c9f',
                    '800': '#722682',
                    '900': '#60246b',
                    '950': '#3d0c46',
                },
                'rd': {
                    '50': '#fef9ee',
                    '100': '#fcf1d8',
                    '200': '#f8deb0',
                    '300': '#f2c67f',
                    '400': '#eda751',
                    '500': '#e88927',
                    '600': '#d9701d',
                    '700': '#b4571a',
                    '800': '#90451c',
                    '900': '#743a1a',
                    '950': '#3e1c0c',
                },

            }
        },
    },

    plugins: [forms],
};
