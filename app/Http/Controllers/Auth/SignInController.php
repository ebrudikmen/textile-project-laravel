<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignIn\SignInRequest;
use App\Http\Resources\Auth\TokenResource;
use Illuminate\Validation\ValidationException;
use Gate;
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
     * @throws ValidationException
     */
    public function signIn(SignInRequest $request)
    {

        $token = $this->attempt($request);
        return new TokenResource($token);
    }

//    /**
//     * Sign In as Admin.
//     *
//     * @param SignInRequest $request
//     * @return TokenResource
//     * @throws ValidationException
//     */
//    public function signInAsAdmin(SignInRequest $request)
//    {
//        $token = $this->attempt($request);
//        if (Gate::denies('admin')) {
//            throw ValidationException::withMessages([
//                'email' => trans('auth.unauthorized'),
//            ]);
//        }
//
//        return new TokenResource($token);
//    }
    /**
     * @return TokenResource
     */
    public function refresh()
    {

        $token = auth()->refresh();
        return new TokenResource($token);
    }


    /**
     * @param SignInRequest $request
     * @return bool|string
     * @throws ValidationException
     */
    protected function attempt(SignInRequest $request)
    {
        $attributes = $request->validated();
        if (!$token = auth()->guard('api')->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        return $token;
    }

}
