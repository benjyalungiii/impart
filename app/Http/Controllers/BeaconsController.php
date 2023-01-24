<?php

namespace App\Http\Controllers;

use App\Http\Requests\Beacons\AddBeaconRequest;
use App\Http\Requests\Beacons\EditBeaconRequest;
use App\Models\Beacon;
use App\Utilities\Result;
use Illuminate\Http\Request;

class BeaconsController extends Controller
{
    protected Result $result;
    protected Beacon $beacon;

    public function __construct(Result $result, Beacon $beacon)
    {
        $this->result = $result;
        $this->beacon = $beacon;
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function browse(Request $request)
    {
        # code...

        return $this->result->success($this->beacon::all());
    }

    /**
     * @param Request $request
     * @param Beacon $beacon
     * 
     * @return void
     */
    public function read(Request $request, Beacon $beacon)
    {
        # code...

        return $this->result->success($beacon);
    }

    /**
     * @param Request $request
     * @param Beacon $beacon
     * 
     * @return void
     */
    public function edit(EditBeaconRequest $request, Beacon $beacon)
    {
        # code...

        return $this->result->success($beacon);
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function add(AddBeaconRequest $request)
    {
        # code...

        return $this->result->success($this->beacon);
    }

    /**
     * @param Request $request
     * @param Beacon $beacon
     * 
     * @return void
     */
    public function delete(Request $request, Beacon $beacon)
    {
        # code...
    }
}
