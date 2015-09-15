<?php

namespace ManageMe\Repositories;


use Illuminate\Support\Facades\DB;

class MedicineRepo {

    function find($sortCol = 'name', $direction = 'ASC', $offset = 0, $limit = 15, $query = '') {
        $q = DB::table('Medicine');

        if (strlen($query) > 0) {
            $q->where('name', 'LIKE', ('%'.$query.'%'));
        }
        return $q->orderBy($sortCol, $direction)
            ->take($limit)
            ->skip($offset)
            ->get();
    }

    function countFind($query = '') {
        $q = DB::table('Medicine');

        if (strlen($query) > 0) {
            $q->where('name', 'LIKE', ('%'.$query.'%'));
        }
        return $q->count();
    }
}