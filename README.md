# WP Quickstart

[![npm version](https://badge.fury.io/js/create-wp-quickstart.svg)](https://badge.fury.io/js/create-wp-quickstart) [![CI](https://github.com/imVSaini/wp-quickstart/actions/workflows/ci.yml/badge.svg)](https://github.com/imVSaini/wp-quickstart/actions/workflows/ci.yml)

WP Quickstart is a boilerplate to quickly set up a WordPress development environment using Docker, Tailwind CSS, Laravel Mix, and other modern development tools.

## Features

-   **Docker Support**: Seamless containerized WordPress development environment.
-   **Tailwind CSS Integration**: Fully integrated with Tailwind CSS for rapid UI development.
-   **Laravel Mix for Asset Bundling**: Uses Webpack via Laravel Mix to compile and bundle assets efficiently.
-   **Live Reload with BrowserSync**: Automatically refreshes your browser on code changes.
-   **Modular SCSS Support**: Organized SCSS structure for better maintainability.
-   **ESLint & Prettier Setup**: Enforces code quality and consistent formatting.
-   **Optimized for Production**: Generates minified and versioned assets for production builds.

## Project Structure

-   `wp-content/themes/framesync/`: The main WordPress theme directory where all your theme-specific files, templates, and assets reside.
-   `wp-content/mu-plugins/`: Contains custom Must-Use plugins that are automatically activated and cannot be deactivated from the WordPress admin.
-   `bin/`: Contains command-line interface (CLI) scripts for various development and operational tasks.
-   `cli/`: Contains utility scripts for development tasks, such as SSL certificate creation.
-   `nginx/`: Nginx configuration files used for serving the WordPress site within the Docker environment.
-   `config/`: PHP and phpMyAdmin configuration files, allowing customization of their respective settings.

## Custom Plugins

This project includes several custom Must-Use (MU) plugins located in the `wp-content/mu-plugins/` directory. These plugins provide essential functionalities and are automatically activated:

-   **`career.php`**: Manages job listings (Careers custom post type) with taxonomies for tags, categories (Job Types), and locations. Includes functionality to duplicate job postings and filter them in the admin area.
-   **`clientele.php`**: Manages client logos (Clientele custom post type).
-   **`google-tag-manager.php`**: Integrates Google Tag Manager (gtag.js) with configurable tracking IDs for Google Analytics (GA4) and Google Ads. Adds a settings page in the admin panel.
-   **`meta-pixel-manager.php`**: Integrates Meta Pixel (Facebook Pixel) tracking code. Adds a settings page in the admin panel for the Pixel ID.
-   **`project.php`**: Manages project showcases (Project custom post type) with taxonomies for tags, categories, and locations. Includes functionality to duplicate projects and filter them in the admin area.
-   **`social.php`**: Adds a settings page in the admin panel to manage links to various social media profiles (Facebook, Instagram, Threads, Twitter, LinkedIn, YouTube).
-   **`team.php`**: Manages team member profiles (Team custom post type) with taxonomies for tags, categories, and locations. Includes functionality to duplicate team member entries and filter them in the admin area.
-   **`testimonial.php`**: Manages testimonials (Testimonial custom post type) with taxonomies for tags, categories, and locations. Includes functionality to duplicate testimonials and filter them in the admin area.

## Installation

Ensure you have [Node.js](https://nodejs.org/) (LTS version recommended) installed on your system.

### Using npx

The easiest way to get started is by using `npx`:
```bash
npx create-wp-quickstart
```

### Steps Performed by the Script

1.  Prompts for a project name (defaults to `wp-quickstart`).
2.  Clones the repository into the specified project directory.
3.  Removes unnecessary files and resets the Git history.
4.  Installs dependencies within `wp-content/themes/framesync/`.
5.  Provides next steps for development.

### Create SSL Certificate for Local Development

To use HTTPS with a custom local domain (e.g., `myapp.local`), ensure you have **mkcert** installed. If not, follow these steps:

#### For macOS
```bash
brew install mkcert
```

#### For Windows (Using PowerShell as Administrator)
1.  Install Chocolatey (if not already installed) from [https://chocolatey.org/install](https://chocolatey.org/install).
2.  Run:
    ```powershell
    choco install mkcert
    ```
    Alternatively, download the latest `.exe` from the [mkcert releases page](https://github.com/FiloSottile/mkcert/releases) and add it to your PATH.

After installing **mkcert**:

1.  Navigate to the `cli/` directory within your project:
    ```bash
    cd cli
    ```
2.  Run the certificate creation script (Git Bash is recommended on Windows):
    ```bash
    ./create-cert.sh
    ```

### Using HTTPS with a Custom Domain

After generating the SSL certificate, update your system’s `hosts` file to point your custom domain (e.g., `myapp.local`) to your local environment.

#### For macOS
Open the `hosts` file with:
```bash
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
1.  Open Notepad as Administrator.
2.  Open the `hosts` file located at `C:\Windows\System32\drivers\etc\hosts`.
3.  Add the following lines:
    ```
    ::1 myapp.local #Local Site
    127.0.0.1 myapp.local #Local Site
    ::1 www.myapp.local #Local Site
    127.0.0.1 www.myapp.local #Local Site
    ```

### Docker Commands

Manage the development environment using these Docker commands from the project root:

-   **Build and start containers:**
    ```bash
    docker compose up --build
    ```
-   **Start containers in detached mode:**
    ```bash
    docker compose up -d
    ```
-   **Stop and remove containers:**
    ```bash
    docker compose down
    ```
-   **Restart all running containers:**
    ```bash
    docker compose restart
    ```
-   **View real-time logs from containers:**
    ```bash
    docker compose logs -f
    ```

### phpMyAdmin Login

Access phpMyAdmin with the following credentials after starting your Docker containers:
-   **URL:** [`http://localhost:8080/`](http://localhost:8080/)
-   **Username:** `root`
-   **Password:** (leave blank)

## Next Steps

Once the setup is complete:

1.  Navigate to your theme directory:
    ```bash
    cd wp-content/themes/framesync
    ```
2.  Start watching for changes:
    ```bash
    # Using npm
    npm run watch
    # OR Using Yarn
    # yarn watch
    ```

## Theme Development

This project uses Laravel Mix and Tailwind CSS for theme development. The `framesync` theme includes Webpack for asset bundling and BrowserSync for automatic browser reloading.

### Important: Update Your Proxy URL

Before running BrowserSync, ensure the `proxy` value in `wp-content/themes/framesync/webpack.mix.js` matches your local development URL:
```javascript
// webpack.mix.js
mix.browserSync({
    proxy: "https://myapp.local/", // Replace myapp.local with your actual local domain
    // ... other options
});
```

### Available NPM Commands (from `wp-content/themes/framesync/`)

-   **Start Development (watch for changes with live reload):**
    ```bash
    npm start
    ```
-   **Lint JavaScript:**
    ```bash
    npm run lint
    ```
-   **Fix Lint Issues (JavaScript and SCSS):**
    ```bash
    npm run lint:fix
    ```
-   **Build for Production (minified and versioned assets):**
    ```bash
    npm run build
    ```

## Theme Customization

The `framesync` theme provides a flexible foundation. Here’s how to customize it:

### Overview

The theme uses SCSS for structured styling, Tailwind CSS for utility-first CSS, and vanilla JavaScript for client-side interactions. Asset bundling is managed by Laravel Mix, configured in `wp-content/themes/framesync/webpack.mix.js`.

### Styling

-   **Main SCSS File:** `wp-content/themes/framesync/sass/main.scss`. This imports all other SCSS partials (variables, helpers, components).
-   **Tailwind CSS Configuration:** `wp-content/themes/framesync/tailwind.config.js`. Customize Tailwind's theme here. Theme-specific variables (CSS custom properties for colors, fonts) are often in `wp-content/themes/framesync/sass/helpers/_variables.scss`.
-   **Compiled Styles:** Output to `wp-content/themes/framesync/dist/css/`.
-   **Applying Changes:** Run `npm run watch` or `npm run build` in the theme directory.

### JavaScript

-   **Main JavaScript File:** `wp-content/themes/framesync/js/index.js`.
-   **Custom Modules:** Create and import custom JS modules into `index.js`.
-   **Compiled Scripts:** Output to `wp-content/themes/framesync/dist/js/`.
-   **Applying Changes:** Run `npm run watch` or `npm run build`.

### PHP Templates

-   **Standard Template Hierarchy:** Files like `index.php`, `page.php`, `single.php` are in `wp-content/themes/framesync/`.
-   **Template Parts:** Reusable sections (headers, footers) are in `wp-content/themes/framesync/templates/`.
-   **Theme Functionality:** Core functions, hooks, and filters are in `wp-content/themes/framesync/functions.php`. Additional functionalities are in `wp-content/themes/framesync/inc/` (e.g., CPTs, taxonomies, theme options).

### Asset Management

-   **Enqueueing Assets:** Compiled CSS/JS are enqueued via `wp-content/themes/framesync/inc/enqueue.php`.
-   **Laravel Mix:** `wp-content/themes/framesync/webpack.mix.js` handles compilation, minification, and versioning.
-   **Building/Watching Assets:** Use `npm run watch` and `npm run build` as detailed in "Available NPM Commands".

## Deployment

Deploying involves moving WordPress files and the database to a live server.

### 1. Build Production Assets

Navigate to the theme directory and build assets:
```bash
cd wp-content/themes/framesync
npm run build
```
This creates optimized assets in `wp-content/themes/framesync/dist/`.

### 2. Transfer WordPress Files

Transfer the WordPress installation, including:
-   **WordPress Core Files.**
-   **`wp-content` Directory:**
    -   `themes/framesync/` (including the `dist/` subdirectory).
    -   `mu-plugins/`.
    -   `plugins/` (other installed plugins).
    -   `uploads/` (if applicable).
Use FTP/SFTP, SSH (`scp`/`rsync`), or Git.

### 3. Database Migration

-   **Export Local Database:** Use phpMyAdmin, WP-CLI (`wp db export`), or an admin plugin.
-   **Import to Live Server:** Use tools provided by your host (e.g., phpMyAdmin).
-   **Update Site URLs:** Update `siteurl` and `home` in the `wp_options` table. Use a plugin like "Better Search Replace" or WP-CLI (`wp search-replace`) to update URLs in content.

### 4. Configure `wp-config.php`

On the live server, update `wp-config.php`:
-   **Database Credentials:** `DB_NAME`, `DB_USER`, `DB_PASSWORD`, `DB_HOST`.
-   **Salts and Keys:** Generate new ones from [https://api.wordpress.org/secret-key/1.1/salt/](https://api.wordpress.org/secret-key/1.1/salt/).

### 5. Server Environment

-   **Compatibility:** Ensure PHP, MySQL/MariaDB, and a web server (Apache/Nginx) meet WordPress requirements.
-   **Nginx Configuration:** If using Nginx, adapt the `nginx/default.conf` file for production (paths, SSL, server name). Consult your host or server admin.
-   **Apache Configuration:** Ensure `mod_rewrite` is enabled and `.htaccess` is correct for permalinks.

### 6. Domain and DNS

Point your domain’s DNS records to the live server's IP address.

### 7. SSL Certificate

-   **Production SSL:** Install an SSL certificate on the live server (e.g., Let's Encrypt). The `cli/create-cert.sh` script is for local development only.

### 8. Post-Deployment Checks

Thoroughly test:
-   Functionality (forms, CPTs, plugins).
-   Links (internal, media).
-   Mixed content issues (use browser dev tools).
-   Permalinks (resave in Settings > Permalinks if needed).
-   Performance.

## Contributing

We welcome community contributions!

### Ways to Contribute

-   **Reporting Bugs:** Open an issue with detailed reproduction steps.
-   **Suggesting Enhancements:** Open an issue to discuss new features or improvements.
-   **Submitting Pull Requests:** For code changes or documentation improvements.

### Getting Started

1.  **Fork the Repository.**
2.  **Create a Branch:** `git checkout -b feature/your-new-feature` or `fix/bug-description`.
3.  **Make Changes.**
4.  **Adhere to Coding Standards:**
    -   Uses ESLint (JavaScript) and Stylelint (SCSS), with Prettier for formatting.
    -   Run linters from `wp-content/themes/framesync/`:
        ```bash
        npm run lint       # Check for errors
        npm run lint:fix   # Auto-fix some errors
        ```
5.  **Test Your Changes.**

### Submitting Pull Requests

1.  **Commit Changes:** Use clear, descriptive messages (e.g., `feat: Add X`, `fix: Resolve Y`).
2.  **Push to Your Fork:** `git push origin your-branch-name`.
3.  **Open a Pull Request:**
    -   Target the `main` branch of `imVSaini/wp-quickstart`.
    -   Provide a clear title and detailed description, linking to any relevant issues.

### Code of Conduct

Be respectful and constructive in all community interactions.

## Troubleshooting

Common issues and solutions:

*   **Issue: BrowserSync not reloading or incorrect proxy.**
    *   **Solution:** Verify the `proxy` value in `wp-content/themes/framesync/webpack.mix.js` matches your local URL (e.g., `https://myapp.local/`). Ensure Docker containers are running.

*   **Issue: `npm run build` or `npm run watch` fails.**
    *   **Solution:**
        *   Run `npm install` in `wp-content/themes/framesync/`.
        *   Check console for error messages (syntax errors, dependency issues).
        *   Ensure Node.js and npm are up to date.

*   **Issue: SSL certificate errors (local development).**
    *   **Solution:**
        *   Confirm `mkcert` certificate generation and trust.
        *   Ensure browser trusts `mkcert` CAs.
        *   Verify `hosts` file maps the custom domain to `127.0.0.1`.

*   **Issue: Docker containers fail to start/build.**
    *   **Solution:**
        *   Check logs: `docker compose logs -f`.
        *   Ensure Docker is running with sufficient resources.
        *   Try rebuilding: `docker compose up --build`.
        *   Check for port conflicts (80, 443, 3306, 8080).

*   **Issue: PHP errors / white screen of death.**
    *   **Solution:**
        *   Enable `WP_DEBUG` in `wp-config.php`.
        *   Check PHP error logs (server or Docker container).

*   **Issue: Styles/scripts not updating.**
    *   **Solution:**
        *   Ensure `npm run watch` is running (development).
        *   Clear browser and server-side caches (if applicable).
        *   Verify `dist/` folder in the theme is updated.
        *   Check browser console for loading errors.

## License

This project is open-source and available under the [MIT License](LICENSE).

---

Created by [Vaibhav Saini](https://github.com/imVSaini)