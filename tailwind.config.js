/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        light:{
          logo: '#15355E',   
          daftar : '#DACEE4', 
          klik : '#7E1E1E',
          header : '#F3F4F6', 
        }
      },
      fontFamily :{
        roboto : ['Roboto'],
      },
    },
  },
  plugins: [],
}