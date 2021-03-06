<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Category;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
            'city' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:150'],
            'vat' => ['required', 'string', 'size:11', 'unique:users,vat'],
            'adv' => ['nullable', 'string', 'max:65535'],
            'url_picture' => ['nullable', 'image', 'max:1000'],
        ]);
    }

    protected function showRegistrationForm()
    {
        $categories = Category::all();
        // dd($categories);
        return view('auth.register', compact('categories'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data["password"] = Hash::make($data['password']);
        // $data["url_picture"] = $data["url_picture"] ?? NULL;
        $data['categories'] = $data['categories'] ?? [];
        if (isset($data["url_picture"])) {
            $ulr_path = Storage::put('uploads/users', $data["url_picture"]);
            $data["url_picture"] = $ulr_path;
        }
        $user = User::create($data);
        $user->categories()->attach($data['categories']);
        return $user;
    }
}
