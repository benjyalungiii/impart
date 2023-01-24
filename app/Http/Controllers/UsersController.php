<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\AddUserRequest;
use App\Http\Requests\Users\EditUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Utilities\Result;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UsersController extends Controller
{
    protected Result $result;
    protected User $user;

    public function __construct(Result $result, User $user)
    {
        $this->result = $result;
        $this->user = $user;
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function browse(Request $request)
    {
        # code...

        return $this->result->success($this->user::all());
    }

    /**
     * @param Request $request
     * @param User $user
     * 
     * @return void
     */
    public function read(Request $request, User $user)
    {
        # code...

        return $this->result->success($user);
    }

    /**
     * @param EditUserRequest $request
     * @param User $user
     * 
     * @return void
     */
    public function edit(EditUserRequest $request, User $user)
    {
        $validated = $request->validated();

        return $this->result->success($user);
    }

    /**
     * @param AddUserRequest $request
     * 
     * @return void
     */
    public function add(AddUserRequest $request)
    {
        $validated = $request->validated();

        return $this->result->success($this->insertUser($validated));
    }

    /**
     * @param Request $request
     * @param User $user
     * 
     * @return void
     */
    public function delete(Request $request, User $user)
    {

        return $this->result->success(null, "User was successfully deleted.");
    }


    public function attachRole(Request $request, User $user)
    {

        return $this->result->success($user);
    }

    public function detachRole(Request $request, User $user)
    {

        return $this->result->success($user);
    }

    /**
     * @param array $data
     * 
     * @return User
     */
    public function insertUser($data)
    {
        $data['password'] = Hash::make($data['password']);

        $this->user->fill($data);


        if ($this->user->save()) {
            $this->user = $this->syncRelations($data, $this->user);

            return $this->user;
        }

        throw new Exception("Unable to save the user", 1);
    }

    /**
     * @param array $data
     * @param User $user
     * 
     * @return User
     */
    public function syncRelations($data, User $user)
    {
        if ($roles_ids = Arr::get($data, 'roles_ids')) {
            foreach ($roles_ids as $role_id) {
                $role = Role::FindOrFail($role_id);

                $user->roles()->attach($role);
            }
        }

        return $user;
    }
}
