### Digizent's WordPress Theme

**Contributors:** Santiago Galeazzi, Alejandro Vargas

**Requires at least:** WordPress 5.0

**Tested up to:** WordPress 5.2.4

**Requires PHP:** 5.2.4

**Version:** 1.0

---

### Debug
Enable WP_DEBUG mode
`define( 'WP_DEBUG', true );`

Enable Debug logging to the /wp-content/debug.log file
`define( 'WP_DEBUG_LOG', true );`

Disable display of errors and warnings
`define( 'WP_DEBUG_DISPLAY', false );`
`@ini_set( 'display_errors', 0 );`

### Description

Digizent's WordPress Theme allows you to build a new website from scratch using the latest technologies. With a focus on custom sites, regardless of the business orientation.

It features custom navigation, asset versioning, Gutenberg's blocks, custom post types and ACF Theme Settings.

Feel free to add the plugins you need.

### Installation

 **Database:**
 
1. Open your database manager (TablePlus, Sequel Pro, or whatever you use...).
2. Click on **'Add database'**.
3. Provide the necesary information for your database such as name, charset and collation.
    - I suggest the following:
        3.1 **Database name:** client's name + '_db'
        3.2 **Charset:** utf8mb4
        3.3 **Collation:** utf8mb4_unicode_ci
4. Click 'Create database'.

**Dependencies:**

1. First, you need to install all project dependencies by entering `npm install` into the console.
2. Since this project is using Laravel `mix.browserSync` will automatically monitor your files for changes. You just need to modify the host and proxy options on your `webpack.config.js` file.
3. Open the `webpack.config.js` file.
4. Now you need to edit the host **(Line 15)** and proxy **(Line 16)** with your localhost URL and PORT.
    **Note:** If you are using Laravel valet just enter your site URL (`my-site-name.test`). Otherwise, just write down `localhost` by default the PORT is `3000`.
5. Once you have installed the required dependencies and updated browserSync with the options we need. Its time to run `npm run watch`.
6. Wait for npm to be finish and a new page should open on your browser.

---

### Environments

**Development:**
For the development environment you can run:

1. `npm run dev` to only compile the files.
2. `npm run watch` to keep an eye on the files you are working on without the need of refreshing the site.

**Production:**
Always is a good practice to strip off all unused code from your projects. This makes your site load faster and provides a better user experience for your users when browsing your site.

Use `npm run prod` to compile the code for production.

##### What will happen when you run the production command?

1. All unused code will be removed from the file and the compiled files will ONLY contain the necessary code. This allows you to have a lightweight version of your site.

##### I can't see my styles upon compilation?
Since you are using purgeCss some styles might be gone after this action is done, this will only happen if you forgot to wrap your code within purgeCss comments.

To solve this you have to make sure that ALL your stylesheet's code is wrapped inside these two comments:

    /* purgecss start ignore */
        .my-styles {}
    /* purgecss end ignore */

2. With versioning enabled, each time your code changes, a new hashed query string file will be generated inside the `mix-manifest.json` file.
3. Behind the scenes a function is taking care of assigning this unique hash to your CSS and JS files.

---

### Changelog

**1.0.0**
* Released: November 13, 2019

Initial release
