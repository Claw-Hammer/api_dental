<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowUserInfoController extends Controller
{
    public function show()
    {
        $userData = auth()->user();
        return response([
            'id' => $userData->id,
            'name' => $userData->name,
            'email' => $userData->email
        ], 200);
    }
}
