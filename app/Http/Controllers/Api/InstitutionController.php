<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstitutionResource;
use App\Repositories\Institution\Contracts\ListInstitutionContract;

class InstitutionController extends Controller
{
    public function index(ListInstitutionContract $list)
    {
        return InstitutionResource::collection($list());
    }
}
