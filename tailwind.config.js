/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/**/*.php',
    './public/**/*.php',
    './public/assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        ink: '#251F18',
        bronze: '#8E5829',
        gold: '#BB8533',
        cream: '#ECE8DD',
      },
      fontFamily: {
        display: ['Arizona Flare', 'Georgia', 'serif'],
        sans: ['Neue Haas', 'Arial', 'sans-serif'],
      },
    },
  },
  plugins: [],
};
