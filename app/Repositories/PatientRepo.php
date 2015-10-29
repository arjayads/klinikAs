<?php

namespace ManageMe\Repositories;

use Illuminate\Support\Facades\DB;

class PatientRepo
{
    function find($sortCol = 'lastName', $direction = 'ASC', $offset = 0, $limit = 15, $query = '') {
        $q = DB::table('Patient');

        if (strlen($query) > 0) {
            $q->where('firstName', 'LIKE', ('%'.$query.'%'))
                ->orWhere('lastName', 'LIKE', ('%'.$query.'%'));
        }
        return $q->orderBy($sortCol, $direction)
                ->take($limit)
                ->skip($offset)
                ->get();
    }

    function countFind($query = '') {
        $q = DB::table('Patient');

        if (strlen($query) > 0) {
            $q->where('firstName', 'LIKE', ('%'.$query.'%'))
                ->orWhere('lastName', 'LIKE', ('%'.$query.'%'));
        }
        return $q->count();
    }

    function onQueue() {
        $q = DB::table('Patient')
            ->join('PatientQueue', 'Patient.id', '=', 'PatientQueue.FK_patientId')
            ->select(['Patient.id', 'firstName', 'lastName', 'PatientQueue.createdAt as date']);
        return $q->get();
    }
}