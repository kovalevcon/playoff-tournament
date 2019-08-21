<?php
declare(strict_types=1);
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class TeamsTableSeeder
 */
class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'country'       => 'Uruguay',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Portugal',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'France',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Argentina',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Brazil',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Mexico',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Belgium',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Japan',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Spain',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Russia',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Croatia',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Denmark',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Sweden',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Switzerland',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'Colombia',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'country'       => 'England',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
