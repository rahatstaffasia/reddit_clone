<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\CanSendResponses;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use CanSendResponses;

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response | \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->toArray());
        }

        if (!auth()->attempt($request->only('email', 'password'))) {
            return $this->sendError('Invalid Credentials');
        }

        $user = auth()->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->sendResponse([
            'user' => $user,
            'token' => $token,
        ], 'User login successfull.');

    }
}