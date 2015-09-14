<?php

namespace ManageMe\Http\Controllers;

use Carbon\Carbon;
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

    function detail($id) {
        $patient = Patient::find($id);
        if ($patient) {
            return view('patient.detail', ['patient' => $patient]);
        } else {
            return redirect()->action('PatientController@notFound');
        }
    }

    function findOne($id) {
        $p = Patient::find($id);
        if ($p) {
            return $p;
        }
        return ['error' => 'true', 'message' => 'Patient not found!'];
    }

    function notFound() {
        return view('patient.notFound');
    }

    function edit($id) {
        $patient = Patient::find($id);
        if ($patient) {
            return view('patient.edit', ['patientId' => $patient->id]);
        } else {
            return redirect()->action('PatientController@notFound');
        }
    }

    function add() {
            return view('patient.edit', ['patientId' => null]);
    }

    function update() {

        $params = Input::all();

        $patient = Patient::find($params['id']);
        if ($patient) {
            foreach ($params as $key => $value) {
                $patient->$key = $value;
            }
            $patient->birthDate = Carbon::createFromFormat('m/d/Y', $params['birthDate']);
            $result = $patient->save();
            if($result) {
                return ['error' => false, 'message' => 'Patient successfully saved.', 'entityId' => $patient->id] ;
            } else {
                return ['error' => true, 'message' => 'Something went wrong.'];
            }
        } else {
            return ['error' => true, 'message' => 'Patient does not exist.'];
        }
    }

    function create() {

        $params = Input::all();

        if ($params) {
            $patient = new Patient();
            foreach ($params as $key => $value) {
                $patient->$key = $value;
            }
            $patient->birthDate = Carbon::createFromFormat('m/d/Y', $params['birthDate']);
            $result = $patient->save();
            if($result) {
                return ['error' => false, 'message' => 'Patient successfully added.', 'entityId' => $patient->id];
            } else {
                return ['error' => true, 'message' => 'Something went wrong.'];
            }
        } else {
            return ['error' => true, 'message' => 'Invalid data'];
        }
    }
}

