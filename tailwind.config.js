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
          // light: '#6366F1',
          // dark: '#4338CA',
          DEFAULT: '#EC4899', // Pink 500
          light: '#F472B6', // Pink 400
          dark: '#DB2777', // Pink 600
        },
        secondary: {
          // DEFAULT: '#0EA5E9', // Sky 500 (ORIGINAL)
          // light: '#38BDF8',
          // dark: '#0284C7',
          DEFAULT: '#D946EF', // Fuchsia 500
          light: '#E879F9', // Fuchsia 400
          dark: '#C026D3', // Fuchsia 600
        },
        accent: {
          // DEFAULT: '#F43F5E', // Rose 500 (ORIGINAL)
          // light: '#FB7185',
          // dark: '#E11D48',
          DEFAULT: '#F43F5E', // Rose 500 (Keep as is or similar pinkish)
          light: '#FB7185',
          dark: '#E11D48',
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
