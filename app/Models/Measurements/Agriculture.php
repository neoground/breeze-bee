<?php
/**
 * This file contains the AirQuality model.
 */

namespace App\Models\Measurements;

use App\Models\Measurement;
use Charm\Vivid\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class AirQuality Measurement.
 *
 * AirQuality Measurement model - a single measurement of air quality data.
 *
 * @package App\Models
 */
class Agriculture extends Model
{
    /** @var string table name */
    protected $table = 'measurements_agriculture';

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

            $table->decimal('leaf_temp_1', 5, 2)->nullable();
            $table->decimal('leaf_temp_2', 5, 2)->nullable();
            $table->decimal('leaf_wet_1', 5, 2)->nullable();
            $table->decimal('leaf_wet_2', 5, 2)->nullable();

            $table->decimal('soil_moist_1', 4, 1)->nullable();
            $table->decimal('soil_moist_2', 4, 1)->nullable();
            $table->decimal('soil_moist_3', 4, 1)->nullable();
            $table->decimal('soil_moist_4', 4, 1)->nullable();
            $table->decimal('soil_temp_1', 4, 1)->nullable();
            $table->decimal('soil_temp_2', 4, 1)->nullable();
            $table->decimal('soil_temp_3', 4, 1)->nullable();
            $table->decimal('soil_temp_4', 4, 1)->nullable();

            $table->timestamps();
        };
    }

    public function measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id');
    }

}