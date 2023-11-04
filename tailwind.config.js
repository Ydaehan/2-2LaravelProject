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
      width: {
        'half': '50rem',
        'register': '35rem',
        'login': '24rem',
        'profile': '38rem',
        'inpro': '35rem',
        'post': '60rem',
      },
      height: {
        'half': '50rem',
        'register': '35rem',
        'login': '25rem',
        'profile': '31rem',
        'inpro': '27rem',
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}