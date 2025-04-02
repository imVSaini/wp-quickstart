const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const fs = require("fs-extra");

const isProduction = mix.inProduction();
const filenameSuffix = isProduction ? ".min" : "";
const filename = `theme.bundle${filenameSuffix}`;
const distDir = "dist";

// Clean the 'dist' directory before building
fs.emptyDirSync(distDir);

// JS and SCSS configurations
const jsConfig = {
  from: "js/index.js",
  to: `js/${filename}.js`,
};

const sassConfig = {
  from: "sass/main.scss",
  to: `css/${filename}.css`,
};

// Common configurations
const commonConfigs = {
  processCssUrls: false,
  postCss: [tailwindcss("tailwind.config.js")],
};

// Babel configuration
const babelConfigs = {
  presets: ["@babel/preset-env"],
  plugins: ["@babel/plugin-transform-runtime"],
};

// Mix configurations
mix
  .js(jsConfig.from, jsConfig.to)
  .sass(sassConfig.from, sassConfig.to)
  .options(commonConfigs)
  .babelConfig(babelConfigs)
  .setPublicPath(distDir)
  .disableNotifications();

// Versioning in production
if (isProduction) {
  mix.version();
} else {
  mix.sourceMaps();
}

// BrowserSync configuration
if (!isProduction) {
  mix.browserSync({
    ui: false,
    notify: false,
    proxy: "myapp.local",
    files: [
      "dist/**/*",
      "inc/**/*.php",
      "templates/**/*.php",
      "functions.php",
      "header.php",
      "footer.php",
      "404.php",
    ],
  });
}
