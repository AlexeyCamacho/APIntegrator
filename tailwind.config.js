import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    safelist: [
        'badge-primary',
        'badge-neutral',
        'badge-info',
        'badge-success',
        'badge-warning',
        'badge-error',

        'bg-primary',
        'bg-neutral',
        'bg-info',
        'bg-success',
        'bg-warning',
        'bg-error',

        'text-primary-content',
        'text-neutral-content',
        'text-info-content',
        'text-success-content',
        'text-warning-content',
        'text-error-content',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require("daisyui")
    ],

    daisyui: {
        themes: ["winter"],
    },
};
