<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignIn\SignInRequest;
use App\Http\Resources\Auth\TokenResource;
use Dotenv\Exception\ValidationException;

class SignInController extends Controller
{
    /**
     * SignInController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:api');
    }

    /**
     * @param SignInRequest $request
     * @return TokenResource
     */
    public function signIn(SignInRequest $request)
    {

        $token = $this->attempt($request);
        return new TokenResource($token);
    }

    /**
     * @return TokenResource
     */
    public function refresh()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        $token = auth()->refresh();
        return new TokenResource($token);
    }


    /**
     * @param SignInRequest $request
     * @return bool
     * @throws ValidationException
     */
    protected function attempt(SignInRequest $request){
        $attributes = $request ->validated();
        if (! $token = auth()->attempt($attributes)){
            /** @noinspection PhpUndefinedMethodInspection */
            /** @noinspection PhpUndefinedClassInspection */
            throw ValidationException::withMessages([
                'email'=> trans('auth.failed'),
            ]);
        }
        return $token;
    }

}
