require("dotenv").config({
  path: `.env.${process.env.NODE_ENV}`,
})

module.exports = {
  polyfill: true,
  siteMetadata: {
    title: "Digizent",
    author: "Digizent",
    description:
      "Helping You Succeed In a Digital World. Digizent serves distinguished agency clients and a select but diverse group of direct clients.",
    externalLinks: {
      home: "https://digizent.com",
      privacy: "/privacy-policy/",
      terms: "/terms-of-use/",
      contact: "/contact-us/",
    },
    address: {
      street1: "1726 East Branch Hollow Drive",
      street2: "",
      city: "Carrollton, Dallas",
      state: "Texas",
      pc: 75007,
      country: "United States",
    },
    social: {
      facebook: "Digizent",
      twitter: "digizent",
      linkedin: "digizent-international",
    },
  },
  plugins: [
    {
      resolve: `gatsby-source-wordpress`,
      options: {
        url:
          process.env.WPGRAPHQL_URL ||
          `https://dz-site.mysitebuild.com/graphql`,
      },
    },
    {
      resolve: `gatsby-source-filesystem`,
      options: {
        name: `images`,
        path: `${__dirname}/src/images`,
      },
    },
    `gatsby-transformer-sharp`,
    {
      resolve: `gatsby-plugin-sharp`,
      options: {
        defaults: {
          quality: 100,
        },
      },
    },
    `gatsby-plugin-image`,
    {
      resolve: `gatsby-plugin-manifest`,
      options: {
        name: `Digizent Client Portfolio`,
        short_name: `GatsbyJS & WP`,
        start_url: `/`,
        lang: `en`,
        display: `minimal-ui`,
        background_color: `#ffffff`,
        icon: `src/images/icon.png`,
        theme_color_in_head: false,
      },
    },
    `gatsby-plugin-react-helmet`,
    `gatsby-plugin-postcss`,
    // To learn more, visit: https://gatsby.dev/offline
    // `gatsby-plugin-offline`,
  ],
}
