/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './app/Views/**/*.php',
    './app/Views/tendencias-actuales/tendencias_actuales_content.php',
    "./src/**/*.{html,js}",
    "./node_modules/flowbite/**/*.js"
    
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}