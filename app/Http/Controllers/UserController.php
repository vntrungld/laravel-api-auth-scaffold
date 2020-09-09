<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return UserResource
     */
    public function show()
    {
        return new UserResource(auth()->user());
    }
}
