/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/**/*.php",
    "./fragments/**/*.php",
  ],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: ["business"]
  },
  plugins: [
    require("daisyui")
  ],
}

