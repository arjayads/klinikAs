<?php

namespace ManageMe\Http\Controllers;

use ManageMe\Http\Requests;

class PatientController extends Controller
{
    function index() {
        return view('patient.index');
    }
}

