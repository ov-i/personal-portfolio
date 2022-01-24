const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./resources/**/*.blade.php", 
    "./resources/**/*.js", 
    "./resources/**/*.vue",
  ],
  theme: {
    fontFamily: {
      'body': ['Roboto Condensed'],
      'display': ['Poppins1']
    },
    colors: {
      'primary-accent': '#0284C7',
      'secondary-accent': '##2563EB'
    },
    extend: {},
  },
  plugins: [],
}
