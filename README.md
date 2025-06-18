# Lottery APK - Laravel Project

This is a Laravel-based lottery web application that allows users to register, buy lottery tickets, view winners, and manage lotteries via an admin panel. The project uses **Razorpay** and **Stripe** for payments and supports user authentication (including Google OAuth), notifications, and an admin dashboard.

## Features

- User registration and login (including Google OAuth)
- Buy lottery tickets online
- Razorpay and Stripe payment integration
- View your tickets and lottery results
- Admin panel for managing lotteries and winners
- Notifications for winners
- Responsive Bootstrap-based UI
- Cookie consent bar (server-side, mobile-friendly)
- Contact form and policy pages

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
   - Set your Razorpay keys (`RAZORPAY_API_KEY`, `RAZORPAY_API_SECRET`)

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
- `/contact-us` - Contact form
- `/terms-of-use`, `/privacy-notice`, `/cookie-policy` - Policy pages

## Admin Access

- Visit `/admin/login` to access the admin panel.
- Default admin credentials can be set in the database or via seeder.

## Payment Integration

- **Razorpay** and **Stripe** are used for secure payments.
- Set your API keys in the `.env` file.

## Cookie Consent

- Cookie consent is handled server-side (no JavaScript required).
- Users see a consent bar until accepted; acceptance is stored in a cookie.

## Customization

- Update styles in `public/css/style.css`.
- Update header/footer in `resources/views/header.blade.php` and `resources/views/footer.blade.php`.

## License

This project is for educational/demo purposes. For production use, review and update security, validation, and payment logic.

---

**Crafted with ❤️ by Team Hariom Dangi**


 Fixed and improved the quantity selector (plus/minus buttons) for ticket purchase, with better validation and mobile-friendly design.
- Implemented robust countdown timer logic for lottery draw times, ensuring timers work reliably with Owl Carousel and dynamic content.
- Enhanced Razorpay payment integration: improved order creation, validation, and error handling in both frontend and backend.
- Fixed cookie consent bar to be mobile-friendly and work without JavaScript (server-side cookie handling).
- Resolved Laravel factory and seeder issues: ensured correct namespace, file location, and usage for `LotteryFactory` and dummy data generation.
- Improved authentication logic: fixed cookie-based login to use Eloquent User model, preventing session errors.
- Updated README.md with clear setup instructions, features, and usage notes.
- General code cleanup and bug fixes for a smoother user experience.
