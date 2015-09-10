<?php

namespace ManageMe\Repositories;

use ManageMe\Models\Patient;

class PatientRepo
{
    function findAll() {
        return Patient::all();
    }
}