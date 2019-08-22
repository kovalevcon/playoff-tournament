<?php
declare(strict_types=1);
use App\Entities\TournamentMatch;
use Illuminate\Database\Seeder;

/**
 * Class TournamentMatchesTableSeeder
 */
class TournamentMatchesTableSeeder extends Seeder
{
    /** @var array $data */
    private $data = [
        [
            'id'                => 1,
            'tournament_id'     => 1,
            'match_id'          => 1,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 1,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 2,
            'tournament_id'     => 1,
            'match_id'          => 2,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 2,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 3,
            'tournament_id'     => 1,
            'match_id'          => 3,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 3,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 4,
            'tournament_id'     => 1,
            'match_id'          => 4,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 4,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 5,
            'tournament_id'     => 1,
            'match_id'          => 5,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 5,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 6,
            'tournament_id'     => 1,
            'match_id'          => 6,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 6,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 7,
            'tournament_id'     => 1,
            'match_id'          => 7,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 7,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 8,
            'tournament_id'     => 1,
            'match_id'          => 8,
            'top_match_id'      => null,
            'bottom_match_id'   => null,
            'match_number'      => 8,
            'stage'             => TournamentMatch::ONE_EIGHTH_STAGE,
        ],
        [
            'id'                => 9,
            'tournament_id'     => 1,
            'match_id'          => 9,
            'top_match_id'      => 1,
            'bottom_match_id'   => 2,
            'match_number'      => 9,
            'stage'             => TournamentMatch::ONE_FOUR_STAGE,
        ],
        [
            'id'                => 10,
            'tournament_id'     => 1,
            'match_id'          => 10,
            'top_match_id'      => 3,
            'bottom_match_id'   => 4,
            'match_number'      => 10,
            'stage'             => TournamentMatch::ONE_FOUR_STAGE,
        ],
        [
            'id'                => 11,
            'tournament_id'     => 1,
            'match_id'          => 11,
            'top_match_id'      => 5,
            'bottom_match_id'   => 6,
            'match_number'      => 11,
            'stage'             => TournamentMatch::ONE_FOUR_STAGE,
        ],
        [
            'id'                => 12,
            'tournament_id'     => 1,
            'match_id'          => 12,
            'top_match_id'      => 7,
            'bottom_match_id'   => 8,
            'match_number'      => 12,
            'stage'             => TournamentMatch::ONE_FOUR_STAGE,
        ],
        [
            'id'                => 13,
            'tournament_id'     => 1,
            'match_id'          => 13,
            'top_match_id'      => 9,
            'bottom_match_id'   => 10,
            'match_number'      => 13,
            'stage'             => TournamentMatch::ONE_TWO_STAGE,
        ],
        [
            'id'                => 14,
            'tournament_id'     => 1,
            'match_id'          => 14,
            'top_match_id'      => 11,
            'bottom_match_id'   => 12,
            'match_number'      => 14,
            'stage'             => TournamentMatch::ONE_TWO_STAGE,
        ],
        [
            'id'                => 15,
            'tournament_id'     => 1,
            'match_id'          => 15,
            'top_match_id'      => 13,
            'bottom_match_id'   => 14,
            'match_number'      => 15,
            'stage'             => TournamentMatch::THIRD_PLACE_STAGE,
        ],
        [
            'id'                => 16,
            'tournament_id'     => 1,
            'match_id'          => 16,
            'top_match_id'      => 13,
            'bottom_match_id'   => 14,
            'match_number'      => 16,
            'stage'             => TournamentMatch::FINAL_STAGE,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->data as $item) {
            TournamentMatch::create($item);
        }
    }
}
