<?php
declare(strict_types=1);
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tournament
 *
 * @package App\Entities
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|string $created_at
 * @property \Carbon\Carbon|string $updated_at
 * @property \Carbon\Carbon|string $deleted_at
 */
class Tournament extends Model
{
    use SoftDeletes, RulesHelper;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
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
            'name' => 'required|string|between:1,64',
        ];
    }

    /**
     * Get data for form select
     *
     * @return array
     */
    public static function dataForSelect(): array
    {
        return Tournament::all(['id', 'name'])
            ->pluck('name', 'id')
            ->all();
    }
}
