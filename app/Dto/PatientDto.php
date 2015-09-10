<?php

namespace ManageMe\Dto;

use ManageMe\Repositories\PatientRepo;

class PatientDto
{

    private $patientRepo;

    public function __construct(PatientRepo $patientRepo) {
        $this->patientRepo = $patientRepo;
    }
}