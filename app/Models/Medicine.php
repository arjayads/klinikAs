<?php
/**
 * Created by PhpStorm.
 * User: gwdev1
 * Date: 10/1/15
 * Time: 1:51 AM
 */

namespace ManageMe\Models;


use Illuminate\Database\Eloquent\Model;

class Medicine extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Medicine';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genericName', 'commercialName', 'brand', 'unitMeasure', 'defaultInstructions'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}