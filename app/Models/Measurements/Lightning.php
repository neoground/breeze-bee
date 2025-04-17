<?php
/**
 * This file contains the Lightning model.
 */

namespace App\Models\Measurements;

use App\Models\Measurement;
use Charm\Vivid\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Lightning Measurement.
 *
 * Lightning Measurement model - a single measurement of thunderstorm data.
 *
 * @package App\Models
 */
class Lightning extends Model
{
    /** @var string table name */
    protected $table = 'measurements_lightnings';

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

            $table->integer('amount')->nullable();
            $table->integer('distance')->nullable();
            $table->decimal('direction', 4, 1)->nullable();

            $table->timestamps();
        };
    }

    public function measurement(): BelongsTo
    {
        return $this->belongsTo(Measurement::class, 'measurement_id');
    }

}