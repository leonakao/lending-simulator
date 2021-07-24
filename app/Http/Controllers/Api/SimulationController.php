<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SimulationRequest;
use App\Repositories\Simulation\Contracts\MakeSimulationContract;
use Illuminate\Support\Facades\Request;

class SimulationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(SimulationRequest $request, MakeSimulationContract $simulation)
    {
        return $simulation($request->getData());
    }
}
