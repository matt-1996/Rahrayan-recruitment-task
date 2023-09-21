<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\createUser;
class signup extends Controller
{
    public function __invoke(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|max:40|unique:users,email',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
        ]);

        createUser::dispatch($request->name , $request->email, $request->password);

        return response()->json(['message' => 'success']);

    }
}
