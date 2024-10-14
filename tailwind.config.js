/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
  safelist: [
    'bg-blue-100',
    'bg-red-100',
    'bg-green-100',
    'bg-purple-100',
    'bg-orange-100',
    'bg-yellow-100',
  ]
}

