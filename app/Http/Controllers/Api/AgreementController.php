<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgreementResource;
use App\Repositories\Agreement\Contracts\ListAgreementContract;

class AgreementController extends Controller
{
    public function index(ListAgreementContract $list)
    {
        return AgreementResource::collection($list());
    }
}
