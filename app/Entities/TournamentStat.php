<?php
declare(strict_types=1);
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * Class TournamentStat
 *
 * @package App\Entities
 * @property int $id
 * @property int $tournament_id
 * @property int $team_id
 * @property int $count_matches
 * @property int $place_in_tournament
 * @property int $count_score
 * @property float $average_score
 * @property int $high_score
 * @property \Carbon\Carbon|string $created_at
 * @property \Carbon\Carbon|string $updated_at
 * @property \Carbon\Carbon|string $deleted_at
 */
class TournamentStat extends Model
{
    use SoftDeletes;

    /** @var array $placeInTournament */
    public static $placeInTournament = [
        1 => [
            'win'   => 8,
            'lose'  => 16,
        ],
        2 => [
            'win'   => 8,
            'lose'  => 15,
        ],
        3 => [
            'win'   => 8,
            'lose'  => 14,
        ],
        4 => [
            'win'   => 8,
            'lose'  => 13,
        ],
        5 => [
            'win'   => 8,
            'lose'  => 12,
        ],
        6 => [
            'win'   => 8,
            'lose'  => 11,
        ],
        7 => [
            'win'   => 8,
            'lose'  => 10,
        ],
        8 => [
            'win'   => 8,
            'lose'  => 9,
        ],
        9 => [
            'win'   => 4,
            'lose'  => 8,
        ],
        10 => [
            'win'   => 4,
            'lose'  => 7,
        ],
        11 => [
            'win'   => 4,
            'lose'  => 6,
        ],
        12 => [
            'win'   => 4,
            'lose'  => 5,
        ],
        13 => [
            'win'   => 2,
            'lose'  => 3,
        ],
        14 => [
            'win'   => 2,
            'lose'  => 3,
        ],
        15 => [
            'win'   => 3,
            'lose'  => 4,
        ],
        16 => [
            'win'   => 1,
            'lose'  => 2,
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tournament_id', 'team_id', 'count_matches', 'place_in_tournament', 'count_score', 'average_score', 'high_score'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get rules for model attributes
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tournament_id'         => 'required|numeric',
            'team_id'               => 'required|numeric',
            'count_matches'         => 'numeric',
            'place_in_tournament'   => 'numeric',
            'count_score'           => 'numeric',
            'average_score'         => 'numeric',
            'high_score'            => 'numeric',
        ];
    }

    /**
     * Update tournament statistics by tournament match
     *
     * @param \App\Entities\TournamentMatch $tournamentMatch
     * @return void
     */
    public static function updateTournamentStat(TournamentMatch $tournamentMatch): void
    {
        /** @var \App\Entities\Match $match */
        $match = $tournamentMatch->match;

        self::updateTeamStat(
            (int)$match->winnerTeam->id,
            (int)$tournamentMatch->tournament_id,
            self::getWinnerPlace((int)$tournamentMatch->match_number)
        );

        self::updateTeamStat(
            (int)$match->losingTeam->id,
            (int)$tournamentMatch->tournament_id,
            self::getLosingPlace((int)$tournamentMatch->match_number)
        );
    }

    /**
     * Update tournament statistics for team
     *
     * @param int $teamId
     * @param int $tournamentId
     * @param int $placeInTournament
     * @return \App\Entities\TournamentStat
     */
    public static function updateTeamStat(int $teamId, int $tournamentId, int $placeInTournament): TournamentStat
    {
        /** @var array $matchIds */
        $matchIds = self::getTeamMatchIds($teamId);
        /** @var int $countMatches */
        $countMatches = self::getTeamCountTournamentMatches($tournamentId, $matchIds);
        /** @var array $scoreMatches */
        $scoreMatches = self::getAllScoreTeamMatches(
            $teamId,
            self::getAllTournamentMatches($tournamentId, $matchIds)
        );
        /** @var int $scoreMatchesSum */
        $scoreMatchesSum = array_sum($scoreMatches);

        return TournamentStat::updateOrCreate(
            ['tournament_id' => $tournamentId, 'team_id' => $teamId,],
            [
                'count_matches'         => $countMatches,
                'place_in_tournament'   => $placeInTournament,
                'count_score'           => $scoreMatchesSum,
                'average_score'         => $scoreMatchesSum / $countMatches,
                'high_score'            => max($scoreMatches),
            ]
        );
    }

    /**
     * Get winner place in tournament
     *
     * @param int $matchNumber
     * @return int
     */
    public static function getWinnerPlace(int $matchNumber): int
    {
        return self::$placeInTournament[$matchNumber]['win'];
    }

    /**
     * Get losing place in tournament
     *
     * @param int $matchNumber
     * @return int
     */
    public static function getLosingPlace(int $matchNumber): int
    {
        return self::$placeInTournament[$matchNumber]['lose'];
    }

    /**
     * Get all team matches
     *
     * @param int $teamId
     * @return array
     */
    public static function getTeamMatchIds(int $teamId): array
    {
        return Match::select('id')
            ->where('top_team_id', $teamId)
            ->orWhere('bottom_team_id', $teamId)
            ->pluck('id')->toArray();
    }

    /**
     * Get count team matches in tournament
     *
     * @param int   $tournamentId
     * @param array $matchIds
     * @return int
     */
    public static function getTeamCountTournamentMatches(int $tournamentId, array $matchIds): int
    {
        return TournamentMatch::where('tournament_id', $tournamentId)
            ->whereIn('match_id', $matchIds)
            ->count();
    }

    /**
     * Get all tournament matches by match Ids
     *
     * @param int   $tournamentId
     * @param array $matchIds
     * @return \Illuminate\Support\Collection
     */
    public static function getAllTournamentMatches(int $tournamentId, array $matchIds): Collection
    {
        $teamMatchIds = TournamentMatch::select('match_id')
            ->where('tournament_id', $tournamentId)
            ->whereIn('match_id', $matchIds)
            ->pluck('match_id')->toArray();

        return Match::whereIn('id', $teamMatchIds)->get();
    }

    /**
     * Get all team scores in matches
     *
     * @param int                            $teamId
     * @param \Illuminate\Support\Collection $matches
     * @return array
     */
    public static function getAllScoreTeamMatches(int $teamId, Collection $matches): array
    {
        $result = [];
        foreach ($matches as $match) {
            /** @var \App\Entities\Match $match */
            $result[] = $match->top_team_id === $teamId ? $match->top_team_score : $match->bottom_team_score;
        }

        return $result;
    }
}
