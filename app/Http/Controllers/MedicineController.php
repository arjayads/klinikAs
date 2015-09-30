<?php

namespace ManageMe\Http\Controllers;

use Illuminate\Support\Facades\Input;
use ManageMe\Http\Requests;
use ManageMe\Repositories\MedicineRepo;

class MedicineController extends Controller
{
    function __construct(MedicineRepo $medicineRepo) {
        $this->medicineRepo = $medicineRepo;
    }

    function index() {
        return view('medicine.index');
    }

    function countFind() {
        $query = Input::get('q');
        return $this->medicineRepo->countFind($query ?: '' );
    }

    function find() {
        $sortCol = Input::get('sortCol');
        $direction = Input::get('direction');
        $offset = Input::get('offset');
        $limit = Input::get('limit');
        $query = Input::get('q');

        return $this->medicineRepo->find(
            $sortCol ?: 'genericName',
            in_array(strtoupper($direction), ['ASC', 'DESC']) ? $direction : 'ASC',
            $offset ?: 0,
            $limit ?: 4294967295,
            $query ?: ''
        );
    }

    function detail($id) {
//        $patient = Patient::find($id);
//        if ($patient) {
//            return view('patient.detail', ['patient' => $patient]);
//        } else {
//            return redirect()->action('PatientController@notFound');
//        }
    }

    function findOne($id) {
//        $p = Patient::find($id);
//        if ($p) {
//            return $p;
//        }
//        return ['error' => 'true', 'message' => 'Patient not found!'];
    }

    function notFound() {
        return view('patient.notFound');
    }

    function edit($id) {
//        $patient = Patient::find($id);
//        if ($patient) {
//            return view('patient.edit', ['patientId' => $patient->id]);
//        } else {
//            return redirect()->action('PatientController@notFound');
//        }
    }

    function add() {
        return view('patient.edit', ['patientId' => null]);
    }

    function update(Requests\PatientRequest $request) {

//        $params = $request->all();
//
//        $patient = Patient::find($params['id']);
//        if ($patient) {
//            foreach ($params as $key => $value) {
//                $patient->$key = $value;
//            }
//            $patient->birthDate = Carbon::createFromFormat('m/d/Y', $params['birthDate']);
//            $result = $patient->save();
//            if($result) {
//                return ['error' => false, 'message' => 'Patient successfully saved.', 'entityId' => $patient->id] ;
//            } else {
//                return ['error' => true, 'message' => 'Something went wrong.'];
//            }
//        } else {
//            return ['error' => true, 'message' => 'Patient does not exist.'];
//        }
    }

    function create(Requests\PatientRequest $request) {

//        $params = $request->all();
//
//        if ($params) {
//            $patient = new Patient();
//            foreach ($params as $key => $value) {
//                $patient->$key = $value;
//            }
//            $patient->birthDate = Carbon::createFromFormat('m/d/Y', $params['birthDate']);
//            $result = $patient->save();
//            if($result) {
//                return ['error' => false, 'message' => 'Patient successfully added.', 'entityId' => $patient->id];
//            } else {
//                return ['error' => true, 'message' => 'Something went wrong.'];
//            }
//        } else {
//            return ['error' => true, 'message' => 'Invalid data'];
//        }
    }
}
