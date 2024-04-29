<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/confirm';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'c_name1' => ['required', 'string', 'max:255'],
            'c_name2' => ['required', 'string', 'max:255'],
            'c_grade' => ['required', 'integer'],
            'p_name1' => ['required', 'string', 'max:255'],
            'p_name2' => ['required', 'string', 'max:255'],
            'p_phone' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'prefecture' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable','string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $max_grade_level = 6;
        $current_year = date('Y');
        $graduation_year = $current_year + ($max_grade_level - $data['c_grade']);
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'c_name1' => $data['c_name1'],
            'c_name2' => $data['c_name2'],
            'c_grade' => $data['c_grade'],
            'grade_year' => $graduation_year,
            'p_name1' => $data['p_name1'],
            'p_name2' => $data['p_name2'],
            'p_phone' => $data['p_phone'],
            'postcode' => $data['postcode'],
            'prefecture' => $data['prefecture'],
            'address' => $data['address'],
            'building' => $data['building'],
            'role' => 2,
            'permission' => 1
        ]);
    }
}
