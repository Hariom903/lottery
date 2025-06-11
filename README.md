# Lottery APK - Laravel Project

This is a Laravel-based lottery web application that allows users to register, buy lottery tickets, view winners, and manage lotteries via an admin panel. The project uses Stripe for payments and supports user authentication, notifications, and an admin dashboard.

## Features

- User registration and login (including Google OAuth)
- Buy lottery tickets online
- Stripe payment integration
- View your tickets and lottery results
- Admin panel for managing lotteries and winners
- Notifications for winners
- Responsive Bootstrap-based UI

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/lottery_apk.git
   cd lottery_apk
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Copy `.env` and set up your environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   - Set your database credentials in `.env`
   - Set your Stripe keys (`STRIPE_KEY`, `STRIPE_SECRET`)

4. **Run migrations and seeders:**
   ```bash
   php artisan migrate --seed
   ```

5. **Start the development server:**
   ```bash
   php artisan serve
   ```

6. **Access the app:**
   - Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Main Routes

- `/` - Home page (list lotteries)
- `/signup` - User registration
- `/login` - User login
- `/cards/{tid}` - Buy tickets for a lottery
- `/mytickets` - View your tickets
- `/admin/dashboard` - Admin dashboard (admin only)
- `/ramram` - Run lottery winner selection (for testing)

## Admin Access

- Visit `/admin/login` to access the admin panel.
- Default admin credentials can be set in the database or via seeder.

## Payment Integration

- Stripe is used for secure payments.
- Set your Stripe API keys in the `.env` file.

## Customization

- Update styles in `public/css/style.css`.
- Update header/footer in `resources/views/header.blade.php` and `resources/views/footer.blade.php`.

## License

This project is for educational/demo purposes. For production use, review and update security, validation, and payment logic.

---

**Crafted with ❤️ by Team Hariom Dangi**
