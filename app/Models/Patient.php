<?php
/**
 * Created by PhpStorm.
 * User: gwdev1
 * Date: 9/11/15
 * Time: 4:36 AM
 */

namespace ManageMe\Models;


use Illuminate\Database\Eloquent\Model;

class Patient extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'middleName', 'lastName', 'birthDate', 'occupation',
        'sex', 'fatherName', 'address', 'fatherOccupation', 'motherName',
        'motherOccupation', 'contactNumber'
    ];

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