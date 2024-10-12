import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                poppins: ["Poppins"],
                futura: ["Futura"],
            },
            colors: {
                neutral: {
                    0: "#F0DBCA",
                    10: "#FFFFFF",
                    20: "#E4E4E7",
                    30: "#C7C7CD",
                    40: "#AEAEB6",
                    50: "#93949F",
                    60: "#7C7D8A",
                    70: "#666776",
                    80: "#4C4E60",
                    90: "#37384C",
                    100: "#121212",
                },
                primary: {
                    main: "#3872C3",
                    surface: "#D7E3F3",
                    border: "#BDD0EB",
                    hover: "#2F5FA2",
                    pressed: "#1C3961",
                    focus: "rgb(56 114 195/.2)",
                },
                info: {
                    main: "#52A7DD",
                    surface: "#D6F0FF",
                    border: "#ABD7F0",
                    hover: "#448BB8",
                    pressed: "#38749A",
                    focus: "rgb(82 167 221/.2)",
                },
                success: {
                    main: "#6ABC90",
                    surface: "#E7FAE8",
                    border: "#B9D4BB",
                    hover: "#4B8767",
                    pressed: "#39674F",
                    focus: "rgb(106 188 144/.2)",
                },
                warning: {
                    main: "#F6A14B",
                    surface: "#FFF3E2",
                    border: "#FFE2B7",
                    hover: "#F39636",
                    pressed: "#E47F1A",
                    focus: "rgb(246 161 75/.2)",
                },
                danger: {
                    main: "#E94759",
                    surface: "#FFE0E0",
                    border: "#F0BABA",
                    hover: "#E62A3A",
                    pressed: "#C0172A",
                    focus: "rgb(233 71 89/.2)",
                },
                bone: {
                    0: "#FBFBF9",
                    10: "#F9F9F6",
                    20: "#F7F6F2",
                    30: "#F4F3ED",
                    40: "#AEAEB6",
                    50: "#F1F0E9",
                    60: "#C7C6BE",
                    70: "#9F9E98",
                    80: "#777772",
                    90: "#4F4F4C",
                    100: "#2F2F2D",
                },
                green: {
                    10: "#6ABC90",
                    20: "#4B8767",
                    30: "#39674F",
                },
                blue: {
                    10: "#52A7DD",
                    20: "#448BB8",
                    30: "#38749A",
                },
                orange: {
                    10: "#F18661",
                    20: "#EC6636",
                    30: "#D94E1B",
                },
                pink: {
                    10: "#EA4C95",
                    20: "#DE3D83",
                    30: "#AD3268",
                },
                red: {
                    10: "#E94759",
                    20: "#E62A3A",
                    30: "#C0172A",
                },
                yellow: {
                    10: "#FFE15A",
                    20: "#FED00A",
                    30: "#DEB506",
                },
                purple: {
                    10: "#9A82BB",
                    20: "#7D6A9F",
                    30: "#6A5A86",
                },
                brown: {
                    10: "#F6A14B",
                    20: "#F39636",
                    30: "#E47F1A",
                },
            },
            dropShadow: {
                title: "4px 4px 0px rgba(0, 0, 0, 0.29)",
                heading: "2px 2px 0px rgba(0, 0, 0, 0.12)",
            },
            keyframes: {
                plus: {
                    "0%": { transform: "scale(1)" },
                    "50%": { transform: "scale(1.1)" },
                    "100%": { transform: "scale(1)" },
                },
            },
            // Define the animate-plus class with keyframes and duration
            animation: {
                plus: "plus 0.5s ease-in-out infinite", 
            },
        },
    },

    plugins: [forms],
};
