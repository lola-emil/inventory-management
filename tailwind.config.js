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
    themes: ["dark"]
  },
  plugins: [
    require("daisyui")
  ],
}

