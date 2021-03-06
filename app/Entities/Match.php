<?php
declare(strict_types=1);
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Match
 *
 * @package App\Entities
 * @property int $id
 * @property int $top_team_id
 * @property int $bottom_team_id
 * @property int $top_team_score
 * @property int $bottom_team_score
 * @property \Carbon\Carbon|string $created_at
 * @property \Carbon\Carbon|string $updated_at
 * @property \Carbon\Carbon|string $deleted_at
 * @property \App\Entities\Team|null $topTeam
 * @property \App\Entities\Team|null $bottomTeam
 * @property \App\Entities\Team|null $winnerTeam
 * @property \App\Entities\Team|null $losingTeam
 */
class Match extends Model
{
    use SoftDeletes, RulesHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'top_team_id', 'bottom_team_id', 'top_team_score', 'bottom_team_score'
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
    public function rules(): array
    {
        return [
            'top_team_id'       => 'required|numeric|different:bottom_team_id',
            'bottom_team_id'    => 'required|numeric|different:top_team_id',
            'top_team_score'    => 'required|numeric',
            'bottom_team_score' => 'required|numeric',
        ];
    }

    /**
     * Get top team model by top_team_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'top_team_id', 'id');
    }

    /**
     * Get bottom team model by bottom_team_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bottomTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'bottom_team_id', 'id');
    }

    /**
     * Get winner team model by high score
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winnerTeam(): BelongsTo
    {
        return $this->top_team_score > $this->bottom_team_score ? $this->topTeam() : $this->bottomTeam();
    }

    /**
     * Get losing team model by low score
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function losingTeam(): BelongsTo
    {
        return $this->top_team_score < $this->bottom_team_score ? $this->topTeam() : $this->bottomTeam();
    }

    /**
     * Get label of match
     *
     * @return string
     */
    public function label(): string
    {
        return "`{$this->topTeam->country}` vs `{$this->bottomTeam->country}`";
    }

    /**
     * Get label of match with scores
     *
     * @return string
     */
    public function labelWithScore(): string
    {
        return "`{$this->topTeam->country}` vs `{$this->bottomTeam->country}`" .
            " ({$this->top_team_score}:{$this->bottom_team_score})";
    }

    /**
     * Get data for form select
     *
     * @return array
     */
    public static function dataForSelect(): array
    {
        $result = [];
        /** @var \Illuminate\Support\Collection $matches */
        $matches = Match::where('id', '!=', 0)->with(['topTeam', 'bottomTeam'])->get();
        foreach ($matches as $match) {
            /** @var \App\Entities\Match $match */
            $result[$match->id] = $match->labelWithScore();
        }

        return $result;
    }
}
