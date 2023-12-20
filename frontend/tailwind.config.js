/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        'montserrat': ['Montserrat'],
        'lato': ['Lato'],
        'garamond': ['Garamond']
      }
    },
    fontSize: {
        'menu': '20px',
        '2xs': '0.7rem',
        'xs': '0.75rem',
        sm: '0.875rem',
        base: '1rem',
        'lg': '1.125rem',
        xl: '1.25rem',
        '2xl': '1.5rem',
        '3xl': '1.875rem',
        '4xl': '2.25rem',
        '5xl': '3.0rem',
    },
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'purple': '#3f3cbb',
      'midnight': '#121063',
      'metal': '#565584',
      'tahiti': '#3ab7bf',
      'silver': '#ecebff',
      'bubble-gum': '#ff77e9',
      'bermuda': '#78dcca',
      'main': '#8DD3BB',
      'mainhover': '#8DD3BB',
      'purchase': '#CDEAE1',
      'altmain': '#296751',
      'muted': '#474747',
      'gray' : '#9ca3af',
      'lightgray' : '#d1d5db',
      'green': '#16a34a',
      'darkgray': '#1f2937',
      'red': '#FF4545',
      'borderdarkgray': 'rgba(31,41,55,0.67)',
      'borderred': '#FF4545'
    },
  },
  plugins: [],
}