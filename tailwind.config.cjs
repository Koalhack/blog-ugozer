/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            figtree: ["Figtree", "sans-serif"],
        },
        colors: {
            transparent: "transparent",
            carbon: {
                50: "#FFFFFF",
                100: "#FFF5EE",
                200: "#C6C6C6",
                300: "#181818",
                900: "#0F0F0F",
                950: "#000000",
            },
            ember: "#DD4E21",
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "2rem",
                sm: "2rem",
                lg: "5rem",
                xl: "10rem",
                "2xl": "15rem",
            },
        },
        extend: {},
    },
    plugins: [],
};
