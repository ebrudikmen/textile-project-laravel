<?php



namespace App\Http\Controllers\Auth;

use App\Events\Auth\SignedUp;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUp\SignUpRequest;
use App\Http\Resources\Auth\TokenResource;
use App\Models\User;
use Hash;


class SignUpController extends Controller
{
    /**
     * SignUpController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:api');
    }


    /**
     * @param SignUpRequest $request
     * @return TokenResource
     */
    public function signUp(SignUpRequest $request):TokenResource
    {
        $attributes = $request->validated();

        $attributes['password']=Hash::make($attributes['password']);


        $user = User::create($attributes);

        event(new SignedUp($user));
        $token =auth()->guard('api')->login($user);
        return new TokenResource($token);


   }
}
