/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.php",],
   theme: {
     extend: {
      width: {
        '64': '2rem',
      }
     },
},
plugins: [
  // ...
  require('@tailwindcss/forms'),
  require('tailwindcss'),
  require('autoprefixer'),
],
}
