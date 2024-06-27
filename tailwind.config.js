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
        blueUNT: {
          DEFAULT: '#12377B',
          light: '#2563ea',
        },
        yellowUNT: {
          DEFAULT: '#E6AD09',
          light: '#FACC47',
        },
        primary: {
          DEFAULT: '#12377B',
          light: '#2563ea',
        },
      },
    },
  },
  plugins: [require('daisyui')],
  daisyui: {
    themes: ["light", "dark", "cupcake"],
  },
}

