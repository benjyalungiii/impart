<?php

namespace App\Http\Controllers;

use App\Http\Requests\Roles\AddRoleRequest;
use App\Http\Requests\Roles\EditRoleRequest;
use App\Models\Role;
use App\Models\User;
use App\Utilities\Result;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected Result $result;
    protected Role $role;

    public function __construct(Result $result, Role $role)
    {
        $this->result = $result;
        $this->role = $role;
    }
    /**
     * @param Request $request
     * 
     * @return void
     */
    public function browse(Request $request)
    {
        # code...

        return $this->result->success($this->role::all());
    }

    /**
     * @param Request $request
     * @param Role $role
     * 
     * @return void
     */
    public function read(Request $request, Role $role)
    {
        # code...

        return $this->result->success($role);
    }

    /**
     * @param Request $request
     * @param Role $role
     * 
     * @return void
     */
    public function edit(EditRoleRequest $request, Role $role)
    {
        $validated = $request->validated();
        # code...

        return $this->result->success($role);
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function add(AddRoleRequest $request)
    {
        $validated = $request->validated();
        # code...

        return $this->result->success($this->role);
    }

    /**
     * @param Request $request
     * @param Role $role
     * 
     * @return void
     */
    public function delete(Request $request, Role $role)
    {
        # code...
    }
}
