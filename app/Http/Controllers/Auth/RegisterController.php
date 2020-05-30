<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Recruteur;
use App\Candidat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:recruteur');
        $this->middleware('guest:candidat');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRecruteurRegisterForm()
    {
        return view('auth.register', ['url' => 'recruteur']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCandidatRegisterForm()
    {
        return view('auth.register', ['url' => 'candidat']);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'Adress' => $data['Adress'],
            'cin' => $data['cin'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createRecruteur(Request $request)
    {
        $this->validator($request->all())->validate();

        Recruteur::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'Adress' => $request->Adress,
            'cin' => $request->cin,
            'password' => Hash::make($request->password),
        ]);
         
        return redirect()->intended('/login/recruteur');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createCandidat(Request $request)
    {
        $this->validator($request->all())->validate();
        Candidat::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'Adress' => $request->Adress,
            'cin' => $request->cin,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/candidat');
    }
}