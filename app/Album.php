<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Album
 *
 * @property int $id
 * @property string $name
 * @property int $band_id
 * @property string $recorded_date
 * @property string $release_date
 * @property int $number_of_tracks
 * @property string $label
 * @property string $producer
 * @property string $genre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Band $band
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereBandId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereRecordedDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereReleaseDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereNumberOfTracks($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereProducer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereGenre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Album whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Album extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'albums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'band_id', 'recorded_date', 'release_date', 'number_of_tracks', 'label', 'producer', 'genre'
    ];

    public function band() {
        return $this->belongsTo(Band::class);
    }
}
