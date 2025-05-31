const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ['./**/*.php', './src/**/*.js'],
  plugins: [require('@tailwindcss/typography')],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Noto Sans Arabic', ...defaultTheme.fontFamily.sans]
      },
      colors: {
          'islamic-green': '#2D5016',
          'islamic-gold': '#D4AF37',
          'islamic-cream': '#F5F5DC'
      }
    }
  }
}