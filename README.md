# playoff-tournament

# Install

1. Install dependencies:

    ```bash
    composer install
    ```
2. Install admin-panel:

    ```bash
    php artisan admin:install
    ```
3. Execute migrations:

    ```bash
    php artisan migrate
    ```

4. Complete seeds for teams table:

    ```bash
    php artisan db:seed --class=TeamsTableSeeder
    ```


Thanks `Joe Beason` for design ([link](https://codepen.io/jbeason/full/Wbaedb/)).
