const mix = require("laravel-mix");
var tailwindcss = require("tailwindcss");
require("laravel-mix-purgecss");

const domain = "lankarenka.test";
const homedir = require("os").homedir();

mix
  .setPublicPath("./")
  .js("resources/js/app.js", "assets/js")
  .sass("resources/sass/app.sass", "assets/css")
  .options({
    processCssUrls: false,
    postCss: [tailwindcss("./tailwind.config.js")],
    cssNano: { discardComments: false },
  })
  .browserSync({
    open: "external",
    https: true,
    host: domain,
    proxy: "https://" + domain,
    https: {
      key: homedir + "/.config/valet/Certificates/" + domain + ".key",
      cert: homedir + "/.config/valet/Certificates/" + domain + ".crt",
    },
    files: [
      "**/*.php",
      "assets/js/*.js",
      "assets/css/*.css",
      "woocommerce/**/*.php",
      "components/**/*.php",
      "templates/**/*.php",
    ],
  });

if (mix.inProduction()) {
  mix
    .purgeCss({
      globs: [
        path.join(__dirname, "*.php"),
        path.join(__dirname, "partials/**/*.php"),
        path.join(__dirname, "functions/**/*.php"),
        path.join(__dirname, "components/**/*.php"),
        path.join(__dirname, "woocommerce/**/*.php"),
        path.join(__dirname, "templates/**/*.php"),
      ],
      extensions: ["html", "js", "php", "vue"],
    })
    .combine(["assets/css/app.css"], "assets/css/app.css")
    .combine(["assets/js/app.js"], "assets/js/app.js")
    .version();
}
