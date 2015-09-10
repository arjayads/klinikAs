<?php

namespace ManageMe\Http\Controllers;

use ManageMe\Http\Requests;
use ManageMe\Repositories\PatientRepo;

class PatientController extends Controller
{
    function __construct(PatientRepo $patientRepo) {
        $this->patientRepo = $patientRepo;
    }

    function index() {
        return view('patient.index');
    }

    function all($sortCol = 'lastName', $direction = 'ASC') {
        return $this->patientRepo->findAll($sortCol, $direction);
    }
}

