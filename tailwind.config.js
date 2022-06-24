module.exports = {
  content: [
    "./templates/**/*.{html,twig,js}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('flowbite/plugin')
  ],
}
