/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",

  ],
  theme: {
    extend: {
      zIndex: {
        '500': '500',
      }
    },
  },
  plugins: [require('daisyui')],
  daisyui: {
    themes: ["light"],
  },
}

