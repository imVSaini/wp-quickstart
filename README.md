# WP Quickstart

[![npm version](https://badge.fury.io/js/create-wp-quickstart.svg)](https://badge.fury.io/js/create-wp-quickstart) [![CI](https://github.com/imVSaini/wp-quickstart/actions/workflows/ci.yml/badge.svg)](https://github.com/imVSaini/wp-quickstart/actions/workflows/ci.yml)

WP Quickstart is a boilerplate to quickly set up a WordPress development environment.

## Features

- **Docker Support** – Seamless containerized WordPress development.
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

### Create SSL Certificate

To work with HTTPS using a custom domain, ensure you have **mkcert** installed. Then, follow these steps:

1. Open your terminal and navigate to the CLI directory:
   ```sh
   cd cli
   ```
2. Run the certificate creation script:
   ```sh
   ./create-cert.sh
   ```

### Using HTTPS with a Custom Domain

After generating the SSL certificate, update your system’s hosts file to point your custom domain (e.g., `myapp.local`) to your local environment.

#### For macOS
Open the hosts file with:
```sh
sudo nano /etc/hosts
```
Then add the following lines:
```
::1 myapp.local #Local Site
127.0.0.1 myapp.local #Local Site
::1 www.myapp.local #Local Site
127.0.0.1 www.myapp.local #Local Site
```

#### For Windows (Using PowerShell as Administrator)
1. Open PowerShell in Administrator mode.
2. Run the following command to open the hosts file in Notepad:
   ```powershell
   Start-Process notepad.exe -ArgumentList "C:\Windows\System32\drivers\etc\hosts" -Verb RunAs
   ```
3. Add the following lines to the hosts file:
   ```
   ::1 myapp.local #Local Site
   127.0.0.1 myapp.local #Local Site
   ::1 www.myapp.local #Local Site
   127.0.0.1 www.myapp.local #Local Site
   ```

### Docker Commands

To manage the development environment using Docker, use the following commands:

- **Build and start the containers:**
  ```sh
  docker compose up --build
  ```
- **Start Docker containers in detached mode:**
  ```sh
  docker compose up -d
  ```
- **Stop and remove containers:**
  ```sh
  docker compose down
  ```
- **Restart all running containers:**
  ```sh
  docker compose restart
  ```
- **View real-time logs from containers:**
  ```sh
  docker compose logs -f
  ```

### phpMyAdmin Login

If you want to access phpMyAdmin, use the following credentials:

1. Username: `root`
2. Password: `(leave blank)`

After starting your Docker containers, you can access phpMyAdmin by navigating to the appropriate URL [`http://localhost:8080/`](http://localhost:8080/).

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
proxy: "https://myapp.local/",
```

Replace `myapp.local` with your actual local development domain.

### Available Commands

- **Start Development:**
  ```sh
  npm start
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
  npm run build
  ```

## License

This project is open-source and available under the MIT License.

---

Created by [Vaibhav Saini](https://github.com/imVSaini)