<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Factory as ValidatorFactory;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Application hasher.
     *
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    private $hash;

    /**
     * Application validator factory;.
     *
     * @var \Illuminate\Validation\Factory
     */
    private $validator;

    /**
     * User eloquent model.
     *
     * @var \App\User
     */
    private $user;

    /**
     * Create a new controller instance.
     *
     * @param \Illuminate\Contracts\Hashing\Hasher $hash
     * @param \Illuminate\Validation\Factory       $validator
     * @param \App\User                            $user
     *
     * @return void
     */
    public function __construct(Hasher $hash, ValidatorFactory $validator, User $user)
    {
        $this->hash = $hash;
        $this->validator = $validator;
        $this->user = $user;

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return $this->validator->make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        return $this->user->create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $this->hash->make($data['password']),
        ]);
    }
}
