<?php
declare(strict_types=1);
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            TeamsTableSeeder::class,
            MatchesTableSeeder::class,
            TournamentsTableSeeder::class,
            TournamentMatchesTableSeeder::class,
        ]);
    }
}
