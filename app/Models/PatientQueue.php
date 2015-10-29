<?php
/**
 * Created by PhpStorm.
 * User: gwdev1
 * Date: 10/30/15
 * Time: 5:33 AM
 */

namespace ManageMe\Models;


use Illuminate\Database\Eloquent\Model;

class PatientQueue extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'PatientQueue';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['FK_patientId'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}