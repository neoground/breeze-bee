<?php
/**
 * This file contains the Custom model.
 */

namespace App\Models\Measurements;

use App\Models\Measurement;
use Charm\Vivid\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Custom Measurement.
 *
 * Custom Measurement model - a single custom measurement (pivot table).
 *
 * @package App\Models
 */
class Custom extends Model
{
    /** @var string table name */
    protected $table = 'measurements_custom';

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

            // Name + value of custom measurement. Configurable via config,
            // to support basically any custom sensor. See sensors.yaml.
            $table->string('name', 50)->nullable();
            $table->decimal('value', 12, 4)->nullable();

            $table->timestamps();
        };
    }

    public function measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id');
    }

}