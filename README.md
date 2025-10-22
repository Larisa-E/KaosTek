# KaosTek

## Customer database
Clear relationships between tables (customers, orders, order details, users). The use of primary and foreign keys ensures data integrity. For better functionality I used basic CRUD and security with hashed passwords.

The use of modern technologies like Bootstrap and PHP with MySQL provides a robust framework for further development. The basic functions are user authentication and order details management.

## Project structure

```
KaosTek/
├─ public/                # Web-accessible entry points
│  ├─ login.php
│  ├─ welcome.php
│  ├─ index.php           # dashboard (requires session)
│  ├─ logout.php
│  └─ create_user.php     # seeds two demo users (lale/peter)
├─ src/                   # PHP libraries/helpers
│  └─ db.php              # get_db() connection helper
├─ database/              # SQL schema, seed, queries
├─ assets/                # README demo media (gif/mp4)
├─ logo.png               # app logo (served from project root)
└─ (root) index/login/... # thin redirects to files in public/
```

To browse locally, open `http://localhost:35381/public/login.php` (root routes also redirect).

## Database setup (new)

We provide ready-to-run SQL to create the database, tables, views, and sample data.

Files:
- `database/kaostek_schema.sql` – schema for Users, Customers, Products, Orders, OrderItems, and two views: `OrderDetails`, `rapport`.
- `database/kaostek_seed.sql` – sample data.
- `database/create_all.sql` – runs both in order.
- `database/queries.sql` – helpful queries (customer order counts, product list sorted by price).

### Import via phpMyAdmin (XAMPP)
1. Start Apache and MySQL/MariaDB in XAMPP.
2. Open phpMyAdmin (http://localhost/phpmyadmin).
3. Click Import, choose `database/kaostek_schema.sql` first and run.
4. Repeat for `database/kaostek_seed.sql` (or import `database/create_all.sql` if your phpMyAdmin allows `SOURCE`).
5. Optional: run `create_user.php` to add sample users.

### Import via MySQL CLI (Windows)
```bat
"C:\xampp\mysql\bin\mysql.exe" -u root < database\kaostek_schema.sql
"C:\xampp\mysql\bin\mysql.exe" -u root < database\kaostek_seed.sql
```

### Import via MySQL CLI (Linux/macOS)
```bash
mysql -u root < database/kaostek_schema.sql
mysql -u root < database/kaostek_seed.sql
```

### PHP configuration
All PHP files use `db.php` for connection. You can override defaults with environment variables:
- `DB_HOST` (default `localhost`)
- `DB_USER` (default `root`)
- `DB_PASS` (default empty)
- `DB_NAME` (default `KaosTekDB`)
- `DB_PORT` (default `3306`)

### Where the UI reads from
- Order details: view `OrderDetails` (product_name, quantity, price)
- Customers: table `customers`
- Orders: table `orders`
- Report: view `rapport` (customer + order_count)

If you change table names, update the views or the queries in `index.php` accordingly.

### Users
This project does not include a default admin user. To create demo users, open `create_user.php` once in your browser. It will add:

- lale / 12345
- peter / 12345

You can change or remove these later.

## Demo

Add a short demo to showcase the login and dashboard.

Embed in this README:

![KaosTek demo](assets/kaostek-demo.gif)

[Watch the full demo (MP4)](assets/kaostek-demo.mp4)

Place the files in `assets/` with those names to make the links work. Keep the GIF small (<10–15 MB) so the README loads fast.

### How to record (quick options)

- Windows: Press Win+G to open Xbox Game Bar → Capture → record. Or use OBS Studio.
- macOS: Shift+Cmd+5 → record selected window/area. Or QuickTime Player → New Screen Recording.
- Linux: OBS Studio (recommended) or SimpleScreenRecorder. For terminal users, `ffmpeg` works great too.

### Trim and compress to MP4 (optional commands)

```bash
# Re-encode to 1280px wide H.264 MP4 at reasonable size
ffmpeg -i input.mp4 -vf "scale=1280:-2" -r 30 -c:v libx264 -crf 23 -preset veryfast -c:a aac -b:a 128k assets/kaostek-demo.mp4
```

### Create a high-quality GIF preview

```bash
# Generate a palette for better colors, then apply it
ffmpeg -i assets/kaostek-demo.mp4 -vf "fps=12,scale=900:-2:flags=lanczos,palettegen" -y /tmp/palette.png
ffmpeg -i assets/kaostek-demo.mp4 -i /tmp/palette.png -lavfi "fps=12,scale=900:-2:flags=lanczos,paletteuse" -y assets/kaostek-demo.gif
```

### Suggested walkthrough for the recording

1. Open `http://localhost:35381/login.php`.
2. Log in with `lale / 12345` (or `peter / 12345`).
3. Navigate to the dashboard (index) and show:
	- Order Details (sorted by price),
	- Customers,
	- Orders,
	- Rapport (order counts).
4. Optional: run `create_user.php` once and show new users in `login.php`.
5. Log out.

Tip: Keep the clip under 60 seconds. Use 1280×720 if possible for readability without large files.
