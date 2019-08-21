<?php
declare(strict_types=1);
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
