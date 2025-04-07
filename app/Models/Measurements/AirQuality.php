<?php
/**
 * This file contains the AirQuality model.
 */

namespace App\Models\Measurements;

use Charm\Vivid\Model;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class AirQuality Measurement.
 *
 * AirQuality Measurement model - a single measurement of air quality data.
 *
 * @package App\Models
 */
class AirQuality extends Model
{
    /** @var string table name */
    protected $table = 'measurements_air_quality';
    
    protected $guarded = ['updated_at'];

    /**
     * The database table structure for up-migration
     *
     * @return \Closure
     */
    public static function getTableStructure(): \Closure
    {
        return function(Blueprint $table) {
            $table->increments('id');

            $table->dateTime('datetime');
            $table->integer('measurement_id')->unsigned();

            $table->decimal('aq_pm10', 5, 2)->nullable();
            $table->decimal('aq_pm25', 5, 2)->nullable();
            $table->decimal('aq_pm1', 5, 2)->nullable();
            $table->decimal('aq_o3', 5, 2)->nullable();
            $table->decimal('aq_nh3', 5, 2)->nullable();
            $table->decimal('aq_co', 5, 2)->nullable();
            $table->decimal('aq_co2', 5, 2)->nullable();
            $table->decimal('aq_so2', 5, 2)->nullable();

            $table->timestamps();
        };
    }
    
}