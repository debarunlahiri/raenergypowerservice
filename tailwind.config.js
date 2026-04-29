module.exports = {
  content: ['./*.php', './includes/**/*.php', './assets/js/**/*.js'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
      colors: {
        brand: {
          ink: '#111827',
          muted: '#5b6472',
          line: '#d9e0e8',
          paper: '#ffffff',
          soft: '#f4f7fa',
          blue: '#174ea6',
          teal: '#00796b',
          amber: '#f2b705',
          red: '#c73e1d',
        },
      },
    },
  },
  corePlugins: {
    gradientColorStops: false,
  },
};
