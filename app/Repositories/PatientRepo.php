<?php

namespace ManageMe\Repositories;

use Illuminate\Support\Facades\DB;

class PatientRepo
{
    function findAll($sortCol = 'lastName', $direction = 'ASC', $offset = 0, $limit = 4294967295) {
        return DB::table('Patient')->orderBy($sortCol, $direction)->skip($offset)->take($limit)->get();
    }
}