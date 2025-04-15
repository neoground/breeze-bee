<?php
/**
 * This file contains the Telemetry model.
 */

namespace App\Models\Measurements;

use App\Models\Measurement;
use Charm\Vivid\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Telemetry Measurement.
 *
 * Telemetry Measurement model - a single measurement of telemetry data.
 *
 * @package App\Models
 */
class Telemetry extends Model
{
    /** @var string table name */
    protected $table = 'measurements_telemetry';

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

            // Main outdoor unit
            $table->decimal('battery_level', 4, 1)->nullable();
            $table->decimal('rx_quality', 4, 1)->nullable();

            $table->decimal('wind_battery_level', 4, 1)->nullable();
            $table->decimal('rain_battery_level', 4, 1)->nullable();
            $table->decimal('temp_battery_level', 4, 1)->nullable();

            // TODO Add telemetry support for all kind of sensors

            $table->timestamps();
        };
    }

    public function measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id');
    }

}