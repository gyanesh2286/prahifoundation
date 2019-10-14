<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Kjjdion\LaravelAdminPanel\Models\Districts;

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
    protected $redirectTo = '/admin';

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
            'last_name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
             'district' => ['required', 'string', 'max:255'],
            'full_address' => ['required', 'string', 'max:500'],
            'aadhaar_no' => ['required', 'numeric', 'min:11'],
            'mobile_no' => ['required', 'numeric', 'min:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'father_name'=>$data['father_name'],
            'mother_name'=>$data['mother_name'],
            'dob'=>$data['dob'],
            'education'=>$data['education'],
            'full_address'=>$data['full_address'],
            'country'=>$data['country'],
            'state'=>$data['state'],
            'district'=>$data['district'],
            'aadhaar_no'=>$data['aadhaar_no'],
            'mobile_no'=>$data['mobile_no'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    public function fetchDistricts(Request $request){
        if($request->has('stateId')){
            $objDistricts= Districts::where('state_id',$request->input('stateId'))->get();
            return response()->json(['status'=>true,'response'=>$objDistricts], 200);
        }else{
            return response()->json(['status'=>false,'response'=>[]], 200);
        }
        
    }
}
