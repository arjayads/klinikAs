<?php

namespace ManageMe\Http\Controllers;

use ManageMe\Http\Requests;

class MedicineController extends Controller
{
    function __construct() {
    }

    function index() {
        return view('medicine.index');
    }
}
