<?php

namespace ManageMe\Repositories;

use Illuminate\Support\Facades\DB;

class PatientRepo
{
    function find($sortCol = 'lastName', $direction = 'ASC', $offset = 0, $limit = 4294967295, $query = '') {
        $q = DB::table('Patient');

        if (strlen($query) > 0) {
            $q->where('firstName', 'LIKE', ('%'.$query.'%'))
                ->orWhere('lastName', 'LIKE', ('%'.$query.'%'));
        }
        return $q->orderBy($sortCol, $direction)
                ->skip($offset)
                ->take($limit)
                ->get();
    }

    function countFind($sortCol = 'lastName', $direction = 'ASC', $offset = 0, $limit = 4294967295, $query = '') {
        $q = DB::table('Patient');

        if (strlen($query) > 0) {
            $q->where('firstName', 'LIKE', ('%'.$query.'%'))
                ->orWhere('lastName', 'LIKE', ('%'.$query.'%'));
        }
        return $q->orderBy($sortCol, $direction)
            ->skip($offset)
            ->take($limit)
            ->count();
    }
}