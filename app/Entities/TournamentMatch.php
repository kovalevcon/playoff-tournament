<?php
declare(strict_types=1);
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TournamentMatch
 *
 * @package App\Entities
 * @property int $id
 * @property int $tournament_id
 * @property int $match_id
 * @property int $top_match_id
 * @property int $bottom_match_id
 * @property int $match_number
 * @property string $stage
 * @property \Carbon\Carbon|string $created_at
 * @property \Carbon\Carbon|string $updated_at
 * @property \Carbon\Carbon|string $deleted_at
 * @property \App\Entities\Tournament|null $tournament
 * @property \App\Entities\Match|null $match
 * @property \App\Entities\Match|null $topMatch
 * @property \App\Entities\Match|null $bottomMatch
 */
class TournamentMatch extends Model
{
    use SoftDeletes;

    const
        ONE_EIGHTH_STAGE    = '1/8',
        ONE_FOUR_STAGE      = '1/4',
        ONE_TWO_STAGE       = '1/2',
        THIRD_PLACE_STAGE   = '3rd',
        FINAL_STAGE         = 'final'
    ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tournament_id', 'match_id', 'top_match_id', 'bottom_match_id', 'match_number', 'stage'
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
            'tournament_id'     => 'required|numeric',
            'match_id'          => 'required|numeric',
            'top_match_id'      => 'required|numeric',
            'bottom_match_id'   => 'required|numeric',
            'match_number'      => 'required|numeric',
            'stage'             => 'required|string',
        ];
    }

    /**
     * Get tournament model by tournament_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'id');
    }

    /**
 * Get match model by match_id
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
    public function match(): BelongsTo
    {
        return $this->belongsTo(Match::class, 'match_id', 'id');
    }

    /**
     * Get top match model by top_match_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topMatch(): BelongsTo
    {
        return $this->belongsTo(Match::class, 'top_match_id', 'id');
    }

    /**
     * Get bottom match model by bottom_match_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bottomMatch(): BelongsTo
    {
        return $this->belongsTo(Match::class, 'bottom_match_id', 'id');
    }

    /**
     * Get data array of matches for view
     *
     * @param int $tournamentId
     * @return array
     */
    public static function getDataForView(int $tournamentId = 1): array
    {
        /** @var \Illuminate\Database\Eloquent\Collection $matches */
        $matches = TournamentMatch::where('tournament_id', $tournamentId)
            ->with(['match', 'match.topTeam', 'match.bottomTeam'])
            ->orderBy('match_number', 'DESC')
            ->get();

        $result = [];
        foreach ($matches as $match) {
            /** @var \App\Entities\TournamentMatch $match */
            $result[$match->match_number] = [
                'top_team_name'     => $match->match->topTeam->country,
                'top_team_score'    => $match->match->top_team_score,
                'bottom_team_name'  => $match->match->bottomTeam->country,
                'bottom_team_score' => $match->match->bottom_team_score,
            ];
        }

        return $result;
    }
}
