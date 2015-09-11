<?php

namespace ManageMe\Http\Controllers;

use Illuminate\Support\Facades\Input;
use ManageMe\Http\Requests;
use ManageMe\Models\Patient;
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

        $data['count'] = Patient::count();
        if ($data['count'] > 0) {
            if ($sortCol && $direction && intval($offset) >= 0 && intval($limit) > 0) {
                $data['rows'] = $this->patientRepo->findAll($sortCol, $direction, $offset, $limit);
            } else
            if ($sortCol && $direction && intval($offset) >= 0) {
                $data['rows'] = $this->patientRepo->findAll($sortCol, $direction, $offset);
            } else
            if ($sortCol && $direction) {
                $data['rows'] = $this->patientRepo->findAll($sortCol, $direction);
            } else
            if ($sortCol) {
                $data['rows'] = $this->patientRepo->findAll($sortCol);
            } else
                $data['rows'] = $this->patientRepo->findAll();
        }
        return $data;
    }
}

