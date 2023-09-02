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
        mulish: ['Mulish', 'sans-serif'],
        noto: ['Noto Sans JP', 'sans-serif'],

      },
      colors: {
        customBlue: '#2F5DFF',
        customBlue_2: '#305DFF',
        customBlue_3: '#4E7FFF',
        customBlue_4: '#0438FE',
      },

      outline: ['focus'],

      height: {
        '80': '17.5rem',
        '70': '15.5rem',
      },

      fontSize: {
        '2xs': '.50rem',
      }

    },
  },


  plugins: [require('@tailwindcss/forms')],
};


