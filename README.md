# Laravel Coffee Shop

This is a project for building a coffee shop website using Laravel framework.

## Getting Started

To get started with this project, follow the instructions below.

### Prerequisites

Make sure you have the following software installed on your machine:

- PHP (version 8.0.0)
- Laravel (version 10.X.X)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/IlhamGhaza/laravel-coffee-shop.git
    ```

2. Navigate to the project directory:

    ```bash
    cd laravel-coffee-shop
    ```

3. Install the dependencies:

    ```bash
    composer install
    ```

4. Configure the environment variables:

    - Rename the `.env.example` file to `.env`.
    - Update the necessary environment variables in the `.env` file.

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Make sure to create a database and update the database name in the `.env` file.
7. Run the database migrations:

    ```bash
    php artisan migrate:fresh --seed
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

9. Open your browser and visit `http://localhost:8000` to see the application.
10. You can login as an admin using the following credentials:

    - look at the seeder file to get the credentials

    ```bash
    App\Database\Seeders\UserSeeder.php
    ```

11. See the postman collection for the API documentation.

    ```bash
    Laravel Coffee Shop.postman_collection.json
    ```

## API Documentation

Api documentation can be found in the postman collection file.

## Docker

coming soon (＾▽＾)

## Contributing

Contributions are welcome! If you find any issues or have suggestions, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE.md).
