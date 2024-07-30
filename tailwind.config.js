/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"

  ],
  theme: {
    extend: {
      zIndex: {
        '500': '500',
      }
    },
  },
  plugins: [require('daisyui'),require('flowbite/plugin')],
  daisyui: {
    themes: ["light"],
  },
}

