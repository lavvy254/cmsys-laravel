# CHURCH MANAGEMENT SYSTEM

The Church Management System is a Laravel-based application designed to help the church maintain and track their daily todaychurch activities

## Author 

Harmony Lumumba Muyagane currently a student in muranga university of technology persuing Bachelor of Science in Information Technology.Third Year Student.

## Installation

Follow these steps to set up and run the project locally:

### Prerequisites

- PHP >= 8.1 //it only works with PHP 8.1 and higher
- Composer
- MySQL (or any other compatible database)
- Node.js (for frontend assets compilation)

1. Clone the repository:

   ```bash
   git clone https://github.com/lavvy254/cmsys-laravel.git
   cd cmsys-laravel
   ```

2. Install Dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Setup Environment Variables:

   ```bash
   cp .env.example .env
   ```

   Generate the application key:

   ```bash
   php artisan key:generate
   ```

4. Configure the database:

   Update the `.env` file with your database credentials.

5. Run Migrations:

   ```bash
   php artisan migrate
   ```

6. Serve the application:

   ```bash
   php artisan serve
   ```

## Usage

- Register as an administrator or a User. Directly add details from the databse,or you can run

```bash
php artisan migrate --seed
```

- Email test@gmail.com

- password Password@123


- Enjoy

## Additional Configuration

- Customize authentication methods, roles, and permissions as needed.
- Integrate additional blockchain features for enhanced security and transparency.

## Contributing

Thank you for considering contributing to this project! Please follow the contribution guidelines.

## Security Vulnerabilities

If you discover a security vulnerability, please send an email to lumumbaharmony@gmail.com. All security vulnerabilities will be promptly addressed.

## License

This project is not licensed for production use. It is provided for educational and non-commercial purposes only.

## NOTE

1. THE SYSTEM IS NOT COMPLETE,IT IS STILL UNDER DEVELOPMENT

2. I did not create the Dashboard.You can get the dashboard used in this project from https://www.google.com/url?sa=t&source=web&rct=j&opi=89978449&url=https://www.creative-tim.com/blog/web-design/free-dashboards-templates-laravel/&ved=2ahUKEwj60KGskJmFAxUPRfEDHR5PCvsQFnoECA0QAQ&usg=AOvVaw3oWBTvvfTYyuhKRhiC8RcA. 