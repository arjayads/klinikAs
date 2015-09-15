<?php

namespace ManageMe\Repositories;


class MedicineRepo {

    function find($sortCol = 'name', $direction = 'ASC', $offset = 0, $limit = 4294967295, $query = '') {
        $q = DB::table('Medicine');

        if (strlen($query) > 0) {
            $q->where('name', 'LIKE', ('%'.$query.'%'));
        }
        return $q->orderBy($sortCol, $direction)
            ->skip($offset)
            ->take($limit)
            ->get();
    }

    function countFind($sortCol = 'name', $direction = 'ASC', $offset = 0, $limit = 4294967295, $query = '') {
        $q = DB::table('Medicine');

        if (strlen($query) > 0) {
            $q->where('name', 'LIKE', ('%'.$query.'%'));
        }
        return $q->orderBy($sortCol, $direction)
            ->skip($offset)
            ->take($limit)
            ->count();
    }
}