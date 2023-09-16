/** @type {import('tailwindcss').Config} */
export default {
  content: [
    //Buscara en que archivos se utilizara tailwind
    //Busqueda recursiva
    "./resources/**/*.blade.php",
    "./resources/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

