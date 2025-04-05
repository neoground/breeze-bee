<?php
/**
 * This file contains the Measurement model.
 */

namespace App\Models;

use Charm\Vivid\Model;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Measurement.
 *
 * Measurement model - a single measurement.
 *
 * @package App\Models
 */
class Measurement extends Model
{
    /** @var string table name */
    protected $table = 'measurements';
    
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

            // This dataset is for an interval of this length in minutes (e.g. 1 = 1 minute = 16:20:00 - 16:20:59)
            $table->smallInteger('interval')->unsigned();

            $table->decimal('barometer', 6, 2)->nullable();

            $table->decimal('out_temp_1', 5, 2)->nullable();
            $table->decimal('out_temp_2', 5, 2)->nullable();
            $table->decimal('out_temp_3', 5, 2)->nullable();
            $table->decimal('out_temp_4', 5, 2)->nullable();

            $table->decimal('out_humidity_1', 4, 1)->nullable();
            $table->decimal('out_humidity_2', 4, 1)->nullable();
            $table->decimal('out_humidity_3', 4, 1)->nullable();
            $table->decimal('out_humidity_4', 4, 1)->nullable();

            $table->decimal('in_temp_1', 5, 2)->nullable();
            $table->decimal('in_temp_2', 5, 2)->nullable();
            $table->decimal('in_temp_3', 5, 2)->nullable();
            $table->decimal('in_temp_4', 5, 2)->nullable();
            $table->decimal('in_temp_5', 5, 2)->nullable();
            $table->decimal('in_temp_6', 5, 2)->nullable();
            $table->decimal('in_temp_7', 5, 2)->nullable();
            $table->decimal('in_temp_8', 5, 2)->nullable();

            $table->decimal('in_humidity_1', 4, 1)->nullable();
            $table->decimal('in_humidity_2', 4, 1)->nullable();
            $table->decimal('in_humidity_3', 4, 1)->nullable();
            $table->decimal('in_humidity_4', 4, 1)->nullable();
            $table->decimal('in_humidity_5', 4, 1)->nullable();
            $table->decimal('in_humidity_6', 4, 1)->nullable();
            $table->decimal('in_humidity_7', 4, 1)->nullable();
            $table->decimal('in_humidity_8', 4, 1)->nullable();

            $table->decimal('rain', 5, 1)->nullable();
            $table->decimal('rain_rate', 5, 1)->nullable();
            $table->decimal('hail', 5, 1)->nullable();
            $table->decimal('hail_rate', 5, 1)->nullable();
            $table->decimal('snow', 5, 1)->nullable();
            $table->decimal('snow_rate', 5, 1)->nullable();
            $table->decimal('snow_depth', 4, 1)->nullable();

            $table->decimal('wind_speed', 4, 1)->nullable();
            $table->decimal('wind_dir', 4, 1)->nullable();
            $table->decimal('wind_gust', 4, 1)->nullable();
            $table->decimal('wind_gust_dir', 4, 1)->nullable();

            $table->decimal('uv', 4, 2)->nullable();
            $table->decimal('radiation', 5, 1)->nullable();

            // Calculated values
            $table->decimal('app_temp', 5, 2)->nullable();
            $table->decimal('heat_index', 5, 2)->nullable();
            $table->decimal('humidex', 5, 2)->nullable();
            $table->decimal('windchill', 5, 2)->nullable();

            $table->decimal('out_dewpoint', 5, 2)->nullable();
            $table->decimal('in_dewpoint', 5, 2)->nullable();

            $table->decimal('cloudbase', 5, 1)->nullable();

            $table->string('forecast', 10)->nullable();

            $table->timestamps();
        };
    }
    
}