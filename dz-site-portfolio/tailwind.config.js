module.exports = {
  content: ["./src/**/*.{js,jsx,ts,tsx}"],
  theme: {
    extend: {
      container: {
        center: true,
      },
      fontFamily: {
        spirit: ["new-spirit", "sans-serif"],
        effra: ["effra", "sans-serif"],
      },
      fontSize: {
        "7xl": "6rem",
      },
      colors: {
        digi: {
          gray: "#f5f5f5",
          blue: "#003a5d",
          legacy: "#0090b0",
          sky: "#37c8dc",
          pink: "#df1683",
          "off-white": "#fdf6e7",
        },
        gray: {
          500: "#5E6060",
          900: "#333333",
        },
      },
      skew: {
        15: "15deg",
      },
    },
  },
  plugins: [],
}
