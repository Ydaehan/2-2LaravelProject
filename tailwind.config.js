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
      height: {
        'half': '50rem',
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}