/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        textBodyGray: '#98999a',
        bgGray: '#ebeced',
        borderGray: '#cbcbcb',
        ctaBlue: '#017cb6',
        ctaButtonBlue: '#026492',
        ctaButtonBlueHover: '#02567e',
        footerBg: '#171b23',
        footerText: '#465166',
      },
      fontFamily: {
        'open-sans': 'Open Sans, sans-serif', 
        'menlo': 'Menlo, monospace',
      },
    },
  },
  plugins: [],
};

export default config;
