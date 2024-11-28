/** @type {import('tailwindcss').Config} */

import daisyui from "daisyui";
export default {
    content: [
        // You will probably also need these lines
        './storage/framework/views/*.php',
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
    ],
    theme: {
        extend: {},
    },
    darkMode: 'class',

    // Add daisyUI
    plugins: [daisyui],

    daisyui: {
        themes: ["light", "dark"],
        darkTheme: "dark",
        base: true,
        styled: true,
        utils: true,
        logs: true,
        themeRoot: "light",
    },
}
