/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{php,html,js}", "./App/views/**/*.{php,html,js}"],
  theme: {
    extend: {
      fontFamily:{
        poppins:['"poppins"','sans-serif'],
        poppins_bold:['"poppins_bold"','sans-serif'],
        mona:['"mona"','sans-serif'],
      }
    },
  },
  plugins: [],
}