/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        textBodyGray: '#98999a',
      },
      fontFamily: {
        'open-sans': 'Open Sans, sans-serif',
      },
    },
  },
  plugins: [],
};

export default config;
