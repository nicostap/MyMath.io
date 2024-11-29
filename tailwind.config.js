/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#e5f9e0',
        secondary: '#a3f7b5',
        tertiary: '#40c9a2',
        quaternary: '#2f9c95',
        quinary: '#664147',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@fortawesome/fontawesome-free')
  ],
}

