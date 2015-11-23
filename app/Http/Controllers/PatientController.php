<?php

namespace ManageMe\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use ManageMe\Http\Requests;
use ManageMe\Models\Patient;
use ManageMe\Models\PatientQueue;
use ManageMe\Repositories\PatientRepo;

class PatientController extends Controller
{
    function __construct(PatientRepo $patientRepo) {
        $this->patientRepo = $patientRepo;
    }

    function index() {
        return view('patient.index');
    }

    function find() {
        $sortCol = Input::get('sortCol');
        $direction = Input::get('direction');
        $offset = Input::get('offset');
        $limit = Input::get('limit');
        $query = Input::get('q');

        return $this->patientRepo->find(
                $sortCol ?: 'lastName',
                in_array(strtoupper($direction), ['ASC', 'DESC']) ? $direction : 'ASC',
                $offset ?: 0,
                $limit ?: 15,
                $query ?: ''
            );
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

    function update(Requests\PatientRequest $request) {

        $params = $request->all();

        $patient = Patient::find($params['id']);
        if ($patient) {
            $patient = \Helper::arrayToObject($params, $patient);
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

    function create(Requests\PatientRequest $request) {

        $params = $request->all();

        if ($params) {
            $params['birthDate'] = Carbon::createFromFormat('m/d/Y', $params['birthDate']);
            $result = Patient::create($params);
            if($result) {
                return ['error' => false, 'message' => 'Patient successfully added.', 'entityId' => $result->id];
            } else {
                return ['error' => true, 'message' => 'Something went wrong.'];
            }
        } else {
            return ['error' => true, 'message' => 'Invalid data'];
        }
    }

    function countFind() {
        $query = Input::get('q');
        return $this->patientRepo->countFind($query ?: '' );
    }

    function queue($id) {

        $p = Patient::find($id);

        if ($p) {
            $result = PatientQueue::create(['FK_patientId' => $p->id]);
            if($result) {
                return ['error' => false, 'message' => 'Patient successfully queued.', 'entityId' => $result->id];
            } else {
                return ['error' => true, 'message' => 'Something went wrong.'];
            }
        } else {
            return ['error' => true, 'message' => 'Invalid data'];
        }
    }

    function onQueue() {
        return $this->patientRepo->onQueue();
    }

    function resetQueue() {
        return $this->patientRepo->resetQueue();
    }

    function removeFromQueue($qid) {
        return $this->patientRepo->removeFromQueue($qid);
    }

}

