<?php
/**
 * This file contains the Measurement model.
 */

namespace App\Models;

use App\Models\Measurements\Agriculture;
use App\Models\Measurements\AirQuality;
use App\Models\Measurements\Custom;
use App\Models\Measurements\Indoor;
use App\Models\Measurements\Lightning;
use App\Models\Measurements\Outdoor;
use App\Models\Measurements\Precipitation;
use App\Models\Measurements\Telemetry;
use Charm\Vivid\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        return function (Blueprint $table) {
            $table->increments('id');

            $table->dateTime('datetime');

            // This dataset is for an interval of this length in minutes (e.g. 1 = 1 minute = 16:20:00 - 16:20:59)
            $table->smallInteger('interval')->unsigned();

            // Related measurements for this datetime + interval
            $table->integer('agriculture_id')->unsigned()->nullable();
            $table->integer('air_quality_id')->unsigned()->nullable();
            $table->integer('indoor_id')->unsigned()->nullable();
            $table->integer('lightning_id')->unsigned()->nullable();
            $table->integer('outdoor_id')->unsigned()->nullable();
            $table->integer('precipitation_id')->unsigned()->nullable();
            $table->integer('telemetry_id')->unsigned()->nullable();

            $table->decimal('barometer', 6, 2)->nullable();

            // Default indoor / outdoor temp + humidity
            // This is used for typical calculations and default displaying.
            // For up to 8 additional sensors, see Measurements -> Indoor / Outdoor models.
            $table->decimal('out_temp', 5, 2)->nullable();
            $table->decimal('out_humidity', 4, 1)->nullable();
            $table->decimal('in_temp', 5, 2)->nullable();
            $table->decimal('in_humidity', 4, 1)->nullable();

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
            $table->decimal('dewpoint', 5, 2)->nullable();
            $table->decimal('cloudbase', 5, 1)->nullable();

            $table->string('forecast', 10)->nullable();

            $table->timestamps();
        };
    }

    public function agriculture(): HasOne
    {
        return $this->hasOne(Agriculture::class, 'agriculture_id');
    }

    public function airquality(): HasOne
    {
        return $this->hasOne(AirQuality::class, 'air_quality_id');
    }

    public function indoor(): HasOne
    {
        return $this->hasOne(Indoor::class, 'indoor_id');
    }

    public function lightning(): HasOne
    {
        return $this->hasOne(Lightning::class, 'lightning_id');
    }

    public function outdoor(): HasOne
    {
        return $this->hasOne(Outdoor::class, 'outdoor_id');
    }

    public function precipitation(): HasOne
    {
        return $this->hasOne(Precipitation::class, 'precipitation_id');
    }

    public function telemetry(): HasOne
    {
        return $this->hasOne(Telemetry::class, 'telemetry_id');
    }

    public function custom(): HasMany
    {
        return $this->hasMany(Custom::class, 'measurement_id');
    }

}