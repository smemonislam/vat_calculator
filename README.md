# Laravel Project

This is a Laravel project for [brief description or purpose].

## Installation

1. Clone the repository:

   ```bash
   git clone <repository-url>

    cd project-directory

    Install composer dependencies:
    composer update

    Copy the .env.example file to .env:
    cp .env.example .env

## Key Generation
    php artisan key:generate

## Environment Configuration
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

## Database Migration

    php artisan migrate

## Database Seeding
    php artisan db:seed

## Login Information
    Name: Test User
    email: test@example.com
    password: password

# Customizing Authentication
## Login
To customize the login functionality and include validation:

- **Create a custom login form in your view.**
- **Customize the login logic in the AuthenticatedSessionController.**
- **Define routes for the login form and logic.**
- **Implement validation for login input fields in the AuthenticatedSessionController using Laravel's validation features.**

## Registration
To customize the registration functionality and include validation:

- **Create a custom registration form in your view.**
- **Customize the registration logic in the RegisteredUserController.**
- **Define routes for the registration form and logic.**
- **Implement validation for registration input fields in the RegisteredUserController using Laravel's validation features**

## Profile
To customize the user profile functionality and include validation:

- **Create a profile view for users to view and edit their information.**
- **Customize the profile update logic in the ProfileController.**
- **Define routes for the profile view and update logic.**
- **Implement validation for profile update input fields in the ProfileController using Laravel's validation features**
  

## Features

### Excluding VAT from Gross Sum

To calculate VAT excluding from the gross amount, use the following formula:

1. Divide the gross amount by 1 + VAT percentage (e.g., if VAT is 15%, divide by 1.15).
2. Subtract the gross amount from the result.
3. Round the result to the nearest value

### Adding VAT to Net Amount

To add VAT to the net amount, simply multiply the net amount by 1 + VAT percentage.


## Testing
Make sure to thoroughly test your custom authentication system to ensure it works as expected.

## Conclusion
Congratulations! You have successfully implemented custom authentication functionality in your Laravel project. For further customization and enhancements, refer to the Laravel documentation and community resources.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).