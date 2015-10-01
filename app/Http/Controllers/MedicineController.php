<?php

namespace ManageMe\Http\Controllers;

use Illuminate\Support\Facades\Input;
use ManageMe\Http\Requests;
use ManageMe\Models\Medicine;
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
        $m = Medicine::find($id);
        if ($m) {
            return view('medicine.detail', ['medicine' => $m]);
        } else {
            return redirect()->action('MedicineController@notFound');
        }
    }

    function findOne($id) {
        $m = Medicine::find($id);
        if ($m) {
            return $m;
        }
        return ['error' => 'true', 'message' => 'Medicine not found!'];
    }

    function notFound() {
        return view('medicine.notFound');
    }

    function edit($id) {
        $m = Medicine::find($id);
        if ($m) {
            return view('medicine.edit', ['medicineId' => $m->id]);
        } else {
            return redirect()->action('PatientController@notFound');
        }
    }

    function add() {
        return view('medicine.edit', ['medicineId' => null]);
    }

    function update(Requests\MedicineRequest $request) {

        $params = $request->all();

        $m = Medicine::find($params['id']);
        if ($m) {
            foreach ($params as $key => $value) {
                $m->$key = $value;
            }
            $result = $m->save();
            if($result) {
                return ['error' => false, 'message' => 'Medicine successfully saved.', 'entityId' => $m->id] ;
            } else {
                return ['error' => true, 'message' => 'Something went wrong.'];
            }
        } else {
            return ['error' => true, 'message' => 'Medicine does not exist.'];
        }
    }

    function create(Requests\MedicineRequest $request) {

        $params = $request->all();

        if ($params) {
            $result = Medicine::create($params);
            if($result) {
                return ['error' => false, 'message' => 'Medicine successfully added.', 'entityId' => $result->id];
            } else {
                return ['error' => true, 'message' => 'Something went wrong.'];
            }
        } else {
            return ['error' => true, 'message' => 'Invalid data'];
        }
    }
}
