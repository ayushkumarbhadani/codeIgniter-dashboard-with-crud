/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./app/Views/**/*.php', './app/Views/**/*.html'],
  theme: {
    extend: {
      keyframes: {
        scaleX: {
          '0%': { transform: 'scaleX(0)' },
          '100%': { transform: 'scaleX(100%)' },
        },
        fadeOut:{
          '0%': { opacity: '1' },
          '98%': { opacity: '1' },
          '100%': { opacity: '0' }
        }
      },
      animation: {
        'scale-x': 'scaleX 5s ease-in-out forwards',
        'fade-out': 'fadeOut 5s ease-in-out forwards',
      }
    },
  },
  plugins: [],
}

