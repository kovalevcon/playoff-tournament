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
    public function run(): void
    {
        /** @var \Carbon\Carbon $date */
        $date = now();
        DB::table('teams')->insert([
            [
                'id'            => 1,
                'country'       => 'Uruguay',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 2,
                'country'       => 'Portugal',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 3,
                'country'       => 'France',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 4,
                'country'       => 'Argentina',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 5,
                'country'       => 'Brazil',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 6,
                'country'       => 'Mexico',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 7,
                'country'       => 'Belgium',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 8,
                'country'       => 'Japan',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 9,
                'country'       => 'Spain',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 10,
                'country'       => 'Russia',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 11,
                'country'       => 'Croatia',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 12,
                'country'       => 'Denmark',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 13,
                'country'       => 'Sweden',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 14,
                'country'       => 'Switzerland',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 15,
                'country'       => 'Colombia',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
            [
                'id'            => 16,
                'country'       => 'England',
                'created_at'    => $date,
                'updated_at'    => $date,
            ],
        ]);
    }
}
