<?php
/**
 * This file contains the Month model.
 */

namespace App\Models\Aggregations;

use Charm\Vivid\Model;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Month.
 *
 * Month aggregation model - a single month.
 *
 * @package App\Models
 */
class Month extends Model
{
    /** @var string table name */
    protected $table = 'aggregations_months';

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

            // The date of the aggregation (only year + month, day is always 1).
            $table->date('date');

            // JSON with all available min / avg / max measurements for this aggregatgion.
            // Each measurement has: id, value, datetime, key is the name of the measurement.
            $table->text('min_measurements')->nullable();
            $table->text('avg_measurements')->nullable();
            $table->text('max_measurements')->nullable();

            $table->timestamps();
        };
    }

}