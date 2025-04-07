# PhoenixETF

A modern ETF trading platform with real-time market data, user management, and broker integration.

## Features

- Real-time market data synchronization
- User authentication with role-based access (Admin, Broker, User)
- Interactive dashboards with animated charts
- Secure API endpoints for market data
- Automated deployment with Koyeb

## Deployment Guide

### Prerequisites

- Koyeb account
- PostgreSQL database (provided by Koyeb)
- Market data API keys (Alpha Vantage, CoinMarketCap)

### Deployment Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/phoenixetf.git
   cd phoenixetf
   ```

2. **Set up environment variables in Koyeb**
   - Go to your Koyeb dashboard
   - Navigate to the Secrets section
   - Add the following secrets:
     - `APP_KEY`: Generate with `php artisan key:generate --show`
     - `APP_URL`: Your application URL
     - `DB_HOST`: Your PostgreSQL host
     - `DB_DATABASE`: Your database name
     - `DB_USERNAME`: Your database username
     - `DB_PASSWORD`: Your database password
     - `ALPHA_VANTAGE_API_KEY`: Your Alpha Vantage API key
     - `COINMARKETCAP_API_KEY`: Your CoinMarketCap API key

3. **Deploy to Koyeb**
   ```bash
   koyeb app init phoenixetf --dockerfile
   koyeb app deploy
   ```

4. **Verify deployment**
   - Check the deployment logs in Koyeb dashboard
   - Visit your application URL
   - Log in with the default credentials:
     - Admin: admin@phoenixetf.com / admin123
     - Broker: broker@phoenixetf.com / broker123
     - User: user@phoenixetf.com / user123

### Local Development

1. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Set up environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Configure database**
   - Update `.env` with your database credentials

4. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Start development server**
   ```bash
   php artisan serve
   npm run dev
   ```

## Architecture

- **Frontend**: Blade templates with TailwindCSS and Framer Motion
- **Backend**: Laravel 10 with PHP 8.2
- **Database**: PostgreSQL
- **Deployment**: Docker and Koyeb

## License

This project is licensed under the MIT License - see the LICENSE file for details. 