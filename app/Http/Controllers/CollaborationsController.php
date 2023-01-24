<?php

namespace App\Http\Controllers;

use App\Models\Beacon;
use App\Models\Collaboration;
use App\Models\User;
use App\Utilities\Result;
use Illuminate\Http\Request;

class CollaborationsController extends Controller
{
    protected Result $result;
    protected Collaboration $collaboration;

    public function __construct(Result $result, Collaboration $collaboration)
    {
        $this->result = $result;
        $this->collaboration = $collaboration;
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function browse(Request $request)
    {
        # code...

        return $this->result->success($this->collaboration::all());
    }

    /**
     * @param Request $request
     * @param User $user
     * @param Beacon $beacon
     * 
     * @return JsonResponse
     */
    public function attachCollaboration(Request $request, User $user, Beacon $beacon)
    {

        return $this->result->success($this->collaboration);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param Beacon $beacon
     * 
     * @return JsonResponse
     */
    public function detachCollaboration(Request $request, User $user, Beacon $beacon)
    {

        return $this->result->success($this->collaboration);
    }
}
