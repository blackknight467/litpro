<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Band
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property bool $still_active
 * @property string $website
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Album[] $albums
 * @method static \Illuminate\Database\Query\Builder|\App\Band whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Band whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Band whereStartDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Band whereStillActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Band whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Band whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Band whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Band extends Model
{
    public static function getBandValidationRules ($id = null)  {
        $rules = [
            'name' => 'required|unique:bands,name',
            'start_date' => 'date',
            'still_active' => 'boolean'
        ];
        if (!is_null($id) && is_numeric($id)) {
            $rules['name'] = $rules['name'] . ',' . $id;
        }

        return $rules;
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bands';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start_date', 'still_active', 'website'
    ];

    public function albums() {
        return $this->hasMany(Album::class);
    }
}
