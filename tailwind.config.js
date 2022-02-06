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
      'accent-darken': '#014eaf',
      'blured-accent': 'rgba(0,107,199,0.30)',
      'white': '#FFFFFF',
      'dark': {
          '700': '#000000',
          '300': 'rgba(0, 0, 0, 0.6)',
          '100': '#8C8C8C',
          '50': '#CBCBCB',
      },
      'red': '#950000',
      'dirty-white': '#EBEBEB',
      'background-accent': '#EFEFEF',
      'blog-accent': 'rgb(23, 23, 60)',
    },
    extend: {
        screens: {
            'retina': '1870px',
            'retinax2': '2300px'
        },
        backgroundImage: {
            'hero-background': 'url("/img/background.jpg");',
        },
        lineHeight: {
            'extra-loose': '3rem',
            '12': '5rem'
        },
        width: {
            'tile': '200px'
        },
        height: {
            'tile': '200px'
        }
    },
  },
  plugins: [],
}
