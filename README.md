# WP Quickstart

[![npm version](https://badge.fury.io/js/create-wp-quickstart.svg)](https://badge.fury.io/js/create-wp-quickstart)

WP Quickstart is a boilerplate to quickly set up a WordPress theme development environment with the `framesync` theme.

## Features

- **Tailwind CSS Integration** – Fully integrated with Tailwind for rapid styling.
- **Laravel Mix for Asset Bundling** – Uses Webpack via Laravel Mix to compile assets efficiently.
- **Live Reload with BrowserSync** – Automatically refreshes your browser on code changes.
- **Modular SCSS Support** – Organized SCSS structure for better maintainability.
- **ESLint & Prettier Setup** – Enforces code quality and formatting standards.
- **Optimized for Production** – Minified and versioned assets when building for production.

## Installation

Ensure you have Node.js installed:

### Using npx
```sh
npx create-wp-quickstart
```

### Steps Performed by the Script
1. Prompts you to enter a project name (default: `wp-quickstart`)
2. Clones the repository into the specified project directory
3. Cleans up unnecessary files and resets Git history
4. Installs dependencies inside `wp-content/themes/framesync`
5. Provides next steps for development

## Next Steps

Once setup is complete, navigate to your theme directory and start development:

```sh
cd wp-content/themes/framesync
```

Start watching for changes:

```sh
yarn watch  # If Yarn is available
# OR
npm run watch  # If using npm
```

## Theme Development

This project uses Laravel Mix and Tailwind CSS for theme development. The theme `framesync` includes Webpack for asset bundling and automatic browser reloading.

### Important: Update Your Proxy URL

Before running BrowserSync, make sure to update the `proxy` value in your `webpack.mix.js` file to match your local development URL:

```js
proxy: "example.local",
```

Replace `example.local` with your actual local development domain.

### Available Commands

- **Start Development:**
  ```sh
  npx mix watch
  ```
- **Lint JavaScript:**
  ```sh
  npm run lint
  ```
- **Fix Lint Issues:**
  ```sh
  npm run lint:fix
  ```
- **Build for Production:**
  ```sh
  npx mix --production
  ```

## License

This project is open-source and available under the MIT License.

---

Created by [Vaibhav Saini](https://github.com/imVSaini)