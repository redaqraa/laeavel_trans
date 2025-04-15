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
          'transco-gold': '#f59e0b',
          'transco-gold-dark': '#d97706',
          'transco-darkteal': '#0f766e',
        },
      },
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }