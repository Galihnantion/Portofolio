/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: {
          // DEFAULT: '#4F46E5', // Indigo 600 (ORIGINAL)
          DEFAULT: '#F472B6', // Soft Pink (Pink 400)
          light: '#F9A8D4', // Pink 300
          dark: '#EC4899', // Pink 500
        },
        secondary: {
          // DEFAULT: '#0EA5E9', // Sky 500 (ORIGINAL)
          DEFAULT: '#FDA4AF', // Soft Rose (Rose 300)
          light: '#FECDD3', // Rose 200
          dark: '#FB7185', // Rose 400
        },
        accent: {
          // DEFAULT: '#F43F5E', // Rose 500 (ORIGINAL)
          DEFAULT: '#F0ABFC', // Soft Fuchsia (Fuchsia 300)
          light: '#E879F9',
          dark: '#D946EF',
        },
        slate: {
          950: '#020617',
        }
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        heading: ['Outfit', 'sans-serif'],
      },
      animation: {
        'gradient-x': 'gradient-x 15s ease infinite',
        'float': 'float 6s ease-in-out infinite',
      },
      keyframes: {
        'gradient-x': {
          '0%, 100%': { 'background-position': '0% 50%' },
          '50%': { 'background-position': '100% 50%' },
        },
        'float': {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-20px)' },
        }
      }
    },
  },
  plugins: [],
}
