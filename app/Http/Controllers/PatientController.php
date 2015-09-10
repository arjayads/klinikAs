<?php

namespace ManageMe\Http\Controllers;

use Illuminate\Support\Facades\Input;
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

    function all() {
        $sortCol = Input::get('sortCol');
        $direction = Input::get('direction');
        $offset = Input::get('offset');
        $limit = Input::get('limit');

        if ($sortCol && $direction && $offset && $limit) {
            return $this->patientRepo->findAll($sortCol, $direction, $offset, $limit);
        }
        if ($sortCol && $direction && $offset) {
            return $this->patientRepo->findAll($sortCol, $direction, $offset);
        }
        if ($sortCol && $direction) {
            return $this->patientRepo->findAll($sortCol, $direction);
        }
        if ($sortCol) {
            return $this->patientRepo->findAll($sortCol);
        }
        return $this->patientRepo->findAll();
    }
}

