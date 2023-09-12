const { colors } = require("tailwindcss/defaultTheme");

module.exports = {
  purge: false,
  theme: {
    extend: {
      container: {
        center: true,
      },
      fontFamily: {
        sans: ["Poppins", "sans-serif"],
        belmist: ["Belmist", "sans-serif"],
      },
      fontSize: {
        "2xs": "0.5rem",
      },
      colors: {
        default: "#203449",
        gray: {
          ...colors.gray,
          "100": "#f6f7fb",
          "150": "#f3f7f9",
          "200": "#fafbff",
          "300": "#f4f4f4",
          "400": "#b9c2d0",
          "500": "#838f9c",
          "800": "#838f9c",
          "900": "#1d1d1f",
        },
        purple: {
          ...colors.purple,
        },
        red: {
          ...colors.red,
          "500": "#e2071c",
        },
        green: {
          ...colors.green,
          whatsapp: "#05e677",
        },
      },
      inset: {
        "-1": "-0.25rem",
        "-2": "-0.5rem",
        "-3": "-0.75rem",
        "-4": "-1rem",
        "-5": "-1.25rem",
        "-6": "-1.5rem",
        "-7": "-1.85rem",
        "-8": "-2rem",
        "-9": "-2.25rem",
        "-10": "-2.5rem",
        "-11": "-2.75rem",
        "-12": "-3rem",
        "-14": "-3.5rem",
        "-16": "-4rem",
        "-18": "-4.5rem",
        "-20": "-5rem",
        "-22": "-5.5rem",
        "1": "0.25rem",
        "2": "0.5rem",
        "3": "0.75rem",
        "4": "1rem",
        "5": "1.25rem",
        "6": "1.5rem",
        "7": "1.85rem",
        "8": "2rem",
        "9": "2.25rem",
        "10": "2.5rem",
        "11": "2.75rem",
        "12": "3rem",
        "14": "3.5rem",
        "16": "4rem",
        "18": "4.5rem",
        "20": "5rem",
        "22": "5.5rem",
      },
      width: {
        "14": "3.5rem",
        "11/20": "55%",
      },
      height: {
        "14": "3.5rem",
      },
      margin: {
        "14": "3.5rem",
      },
      zIndex: {
        "99": "99",
        "100": "100",
        "110": "110",
      },
    },
  },
  variants: {
    display: ["responsive", "hover", "focus", "group-hover"],
    translate: ["responsive", "hover", "focus", "active", "group-hover"],
    opacity: ["responsive", "hover", "focus", "active", "group-hover"],
    visibility: ["responsive", "hover", "focus", "active", "group-hover"],
    scale: ["responsive", "hover", "focus", "active", "group-hover"],
  },
  plugins: [],
};
