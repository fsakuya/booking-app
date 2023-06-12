const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  important: true,
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  mode: 'jit',

  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        customBlue: '#305DFF',
        customBlue_2: '#0438FE',
        customBlue_3: '#4E7FFF',
      },

      outline: ['focus']
    },
  },


  plugins: [require('@tailwindcss/forms')],
};
