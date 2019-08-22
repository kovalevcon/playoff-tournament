<?php
declare(strict_types=1);
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class MatchesTableSeeder
 */
class MatchesTableSeeder extends Seeder
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
        DB::table('matches')->insert([
            [
                'id'                => 1,
                'top_team_id'       => 1,
                'bottom_team_id'    => 2,
                'top_team_score'    => 2,
                'bottom_team_score' => 1,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 2,
                'top_team_id'       => 3,
                'bottom_team_id'    => 4,
                'top_team_score'    => 4,
                'bottom_team_score' => 3,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 3,
                'top_team_id'       => 5,
                'bottom_team_id'    => 6,
                'top_team_score'    => 2,
                'bottom_team_score' => 0,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 4,
                'top_team_id'       => 7,
                'bottom_team_id'    => 8,
                'top_team_score'    => 3,
                'bottom_team_score' => 2,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 5,
                'top_team_id'       => 9,
                'bottom_team_id'    => 10,
                'top_team_score'    => 2,
                'bottom_team_score' => 1,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 6,
                'top_team_id'       => 11,
                'bottom_team_id'    => 12,
                'top_team_score'    => 3,
                'bottom_team_score' => 1,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 7,
                'top_team_id'       => 13,
                'bottom_team_id'    => 14,
                'top_team_score'    => 1,
                'bottom_team_score' => 0,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 8,
                'top_team_id'       => 15,
                'bottom_team_id'    => 16,
                'top_team_score'    => 1,
                'bottom_team_score' => 2,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 9,
                'top_team_id'       => 1,
                'bottom_team_id'    => 3,
                'top_team_score'    => 0,
                'bottom_team_score' => 2,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 10,
                'top_team_id'       => 5,
                'bottom_team_id'    => 7,
                'top_team_score'    => 1,
                'bottom_team_score' => 2,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 11,
                'top_team_id'       => 10,
                'bottom_team_id'    => 11,
                'top_team_score'    => 2,
                'bottom_team_score' => 3,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 12,
                'top_team_id'       => 13,
                'bottom_team_id'    => 16,
                'top_team_score'    => 0,
                'bottom_team_score' => 2,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 13,
                'top_team_id'       => 3,
                'bottom_team_id'    => 7,
                'top_team_score'    => 1,
                'bottom_team_score' => 0,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 14,
                'top_team_id'       => 11,
                'bottom_team_id'    => 16,
                'top_team_score'    => 2,
                'bottom_team_score' => 1,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 15,
                'top_team_id'       => 7,
                'bottom_team_id'    => 16,
                'top_team_score'    => 2,
                'bottom_team_score' => 1,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
            [
                'id'                => 16,
                'top_team_id'       => 3,
                'bottom_team_id'    => 11,
                'top_team_score'    => 3,
                'bottom_team_score' => 2,
                'created_at'        => $date,
                'updated_at'        => $date,
            ],
        ]);
    }
}
