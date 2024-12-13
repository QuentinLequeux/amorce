import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                sidebar: "#0077C1",
                logo: "#000ACB",
                yellow: "#E5BB0B",
                yellow2: "#FBD538",
                active: "#0099FF",
            },
            screens: {
                'mobile': '900px',
            },
        },
    },
    plugins: [],
};
