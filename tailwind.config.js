/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,php}", "./**/*.{html,php}"],
  theme: {
    extend: {
      colors: {
        primary: '#10B981',       // Teal green
        primaryHover: '#059669',  // Darker teal
        dark: '#0B0F12',          // Page background
        card: '#1A1F25',          // Card background
        border: '#2E3439',        // Borders
        textLight: '#e5e5e5',     // Main text
        textMuted: '#9CA3AF',     // Muted gray text
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
        nunito: ['Nunito', 'sans-serif'],
      },
    },
  },
  plugins: [],
};
