/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      width:{
        'half': '50rem',
        'register': '35rem',
      },
      height: {
        'half': '50rem',
        'register': '30rem',
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}