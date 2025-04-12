<?php
/**
 * This file contains the Precipitation model.
 */

namespace App\Models\Measurements;

use App\Models\Measurement;
use Charm\Vivid\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Precipitation Measurement.
 *
 * Precipitation Measurement model - a single measurement of precipitation data.
 *
 * @package App\Models
 */
class Precipitation extends Model
{
    /** @var string table name */
    protected $table = 'measurements_precipitation';

    protected $guarded = ['updated_at'];

    /**
     * The database table structure for up-migration
     *
     * @return \Closure
     */
    public static function getTableStructure(): \Closure
    {
        return function (Blueprint $table) {
            $table->increments('id');

            $table->dateTime('datetime');
            $table->integer('measurement_id')->unsigned();

            $table->decimal('rain', 5, 1)->nullable();
            $table->decimal('rain_rate', 5, 1)->nullable();

            $table->decimal('hail', 5, 1)->nullable();
            $table->decimal('hail_rate', 5, 1)->nullable();

            $table->decimal('snow', 5, 1)->nullable();
            $table->decimal('snow_rate', 5, 1)->nullable();
            $table->decimal('snow_depth', 4, 1)->nullable();

            $table->timestamps();
        };
    }

    public function measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id');
    }

}