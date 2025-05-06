<?php
/**
 * This file contains the Day model.
 */

namespace App\Models\Aggregations;

use Charm\Vivid\Model;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Day.
 *
 * Day aggregation model - a single day.
 *
 * @package App\Models
 */
class Day extends Model
{
    /** @var string table name */
    protected $table = 'aggregations_days';

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

            $table->date('date');

            // JSON with all available min / avg / max measurements for this day.
            // Each measurement has: id, value, datetime, key is the name of the measurement.
            $table->text('min_measurements')->nullable();
            $table->text('avg_measurements')->nullable();
            $table->text('max_measurements')->nullable();

            // Classifications based on German meterological quantities (Kenntage)

            // desert: Desert day (TX35GE): air temp >= 35°C
            // hot: Hot day: air temp >= 30°C
            // summer: Summer day: air temp >= 25°C
            // frosty: Frost day, min air temp <= 0°C
            // icy: Ice day, max air temp <= 0°C
            $table->string('day_class', 10)->nullable();

            // Same but for night, between 1800 und 0600 UTC
            // tropical: Tropical night (Tn20GT): air temp >= 20°C
            // frosty: min air temp <= 0°C
            // icy: max air temp <= 0°C
            $table->string('night_class', 10)->nullable();

            // Degree days
            // heat: Heating day: a day, where you need heating (find right temperature)
            // cool: Cooling day: a day, where you need cooling (find right temperature)
            $table->string('degree_class', 10)->nullable();

            // Classifications based on climate (witterungsabhängig)
            // JSON array of all keys that are suiting to this day. Available keys by category:
            // - precipitation: rain / hail / snow
            // - sky: clear / overcast / fog
            // - humid+temp: humid (schwül)
            // - severe: storm / thunderstorm
            // - veg (vegetative day, avg temp >= 5°C)
            $table->string('weather_class', 100)->nullable();

            $table->timestamps();
        };
    }

}