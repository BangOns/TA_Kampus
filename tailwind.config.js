/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{php,html,js}", "./App/views/**/*.{php,html,js}"],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['"poppins"', "sans-serif"],
        poppins_bold: ['"poppins_bold"', "sans-serif"],
        mona: ['"mona"', "sans-serif"],
      },
    },
    backgroundImage: {
      "custom-green-gradient":
        "linear-gradient(105deg,rgba(255, 255, 255, 0.54) 0%, rgba(3, 133, 1, 1) 100%)",
      "custom-green-gradient-2":
        " linear-gradient(293deg,rgba(255, 255, 255, 0.54) 0%, rgba(3, 133, 1, 1) 100%)",
    },
  },
  plugins: [require("@tailwindcss/typography")],
};
