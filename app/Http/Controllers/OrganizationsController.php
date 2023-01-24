<?php

namespace App\Http\Controllers;

use App\Http\Requests\Organizations\AddOrganizationRequest;
use App\Http\Requests\Organizations\EditOrganizationRequest;
use App\Models\Organization;
use App\Utilities\Result;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    protected Result $result;
    protected Organization $organization;

    public function __construct(Result $result, Organization $organization)
    {
        $this->result = $result;
        $this->organization = $organization;
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function browse(Request $request)
    {
        # code...

        return $this->result->success($this->organization::all());
    }

    /**
     * @param Request $request
     * @param Organization $organization
     * 
     * @return void
     */
    public function read(Request $request, Organization $organization)
    {
        # code...

        return $this->result->success($organization);
    }

    /**
     * @param Request $request
     * @param Organization $organization
     * 
     * @return void
     */
    public function edit(EditOrganizationRequest $request, Organization $organization)
    {
        $validated = $request->validated();
        # code...

        return $this->result->success($organization);
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function add(AddOrganizationRequest $request)
    {
        $validated = $request->validated();

        # code...
        return $this->result->success($this->organization);
    }

    /**
     * @param Request $request
     * @param Organization $organization
     * 
     * @return void
     */
    public function delete(Request $request, Organization $organization)
    {
        # code...
    }
}
