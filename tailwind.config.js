/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                biru: "#13B2E3",
                ungu: "#19172B",
            },
        },
    },
    plugins: [],
};
