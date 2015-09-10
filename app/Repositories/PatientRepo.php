<?php

namespace ManageMe\Repositories;

use ManageMe\Models\Patient;

class PatientRepo
{
    function findAll($orderBy = 'lastName', $direction = 'ASC') {
        return Patient::orderBy($orderBy, $direction)->get();
    }
}