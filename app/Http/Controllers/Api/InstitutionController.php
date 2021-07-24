<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstitutionResource;
use App\Repositories\Institution\Actions\ListInstitutionRepository;

class InstitutionController extends Controller
{
    public function index(ListInstitutionRepository $list)
    {
        return InstitutionResource::collection($list());
    }
}
