const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'primary': ['Poppins']
    },
    colors: {
      'accent': '#006BC7',
      'dark': {
          '700': '#000000',
          '300': 'rgba(0, 0, 0, 0.6)',
          '100': '#8C8C8C'
      },
      'dirty-white': '#EBEBEB'
    },
    extend: {},
  },
  plugins: [],
}
