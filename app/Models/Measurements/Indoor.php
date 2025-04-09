<?php
/**
 * This file contains the Indoor model.
 */

namespace App\Models\Measurements;

use Charm\Vivid\Model;
use Illuminate\Database\Schema\Blueprint;

/**
 * Class Indoor Measurement.
 *
 * Indoor Measurement model - a single measurement of indoor data.
 *
 * @package App\Models
 */
class Indoor extends Model
{
    /** @var string table name */
    protected $table = 'measurements_indoor';
    
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

            $table->decimal('temp_1', 5, 2)->nullable();
            $table->decimal('temp_2', 5, 2)->nullable();
            $table->decimal('temp_3', 5, 2)->nullable();
            $table->decimal('temp_4', 5, 2)->nullable();
            $table->decimal('temp_5', 5, 2)->nullable();
            $table->decimal('temp_6', 5, 2)->nullable();
            $table->decimal('temp_7', 5, 2)->nullable();
            $table->decimal('temp_8', 5, 2)->nullable();

            $table->decimal('humidity_1', 4, 1)->nullable();
            $table->decimal('humidity_2', 4, 1)->nullable();
            $table->decimal('humidity_3', 4, 1)->nullable();
            $table->decimal('humidity_4', 4, 1)->nullable();
            $table->decimal('humidity_5', 4, 1)->nullable();
            $table->decimal('humidity_6', 4, 1)->nullable();
            $table->decimal('humidity_7', 4, 1)->nullable();
            $table->decimal('humidity_8', 4, 1)->nullable();

            // Calculated values
            $table->decimal('dewpoint', 5, 2)->nullable();

            $table->timestamps();
        };
    }
    
}