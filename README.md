# Playoff tournament

**Objective of the project**:

This project implements the “Tournament grid” functionality, as well as the administrative interface for its management.
The tournament grid has a knockout type. 
It is based on the participation of 2 teams, of which one winner goes to the next round.
Examples of tournament nets can be found in the search engine 
[link](https://duckduckgo.com/?q=tournament+grid&t=h_&ia=web)

A tournament grid is built in the public interface.
In the administrative interface, control this grid. Tournament grid data is saved to the database.
The administrative section displays a report on commands with fields:

* “Team”;
* “place in the tournament”;
* “overall team performance in points / goals for the entire tournament”;
* “average performance per match”;
* “best performance per match”.

# Screenshots
TODO

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

4. **(Optional)** Complete seeds for example data (teams, matches, tournament, tournament matches):

    ```bash
    php artisan db:seed
    ```

Thanks `Joe Beason` for design ([link](https://codepen.io/jbeason/full/Wbaedb/)).

@kovalevcon
