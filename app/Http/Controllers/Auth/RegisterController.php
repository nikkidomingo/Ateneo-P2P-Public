<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\loyolaschool;
use App\Highschool;
use App\Staffs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'first_name' => $data['first_name'],
    //         'last_name' => $data['last_name'],
    //         'middle_initial' => $data['middle_initial'],
    //         'mobile_number' => $data['mobile_number'],
    //         'user_type' => $data['user_type'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    protected function register(Request $request)
    {
        
        $data = $request -> all();


        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_initial' => $data['middle_initial'],
            'mobile_number' => $data['mobile_number'],
            'user_type' => $data['user_type'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect()->action('HomeController@index');
    }

    public function chooseFaculty(){
        $user_type = request()->user_type;

        return view('auth.validate', compact('user_type'));
    }

    public function validateUser(Request $request, $user_type){

        if ($user_type == 0){

            $this->validate($request, [
                'hs_id_number' => 'exists:highschools,hs_id_number',
                'grade_level' => 'exists:highschools,grade_level',
                'section' => 'exists:highschools,section',
            ]);

            $hs_student = Highschool::where('hs_id_number', $request->hs_id_number)->first();
            $hs_student->guardian_name = $request->guardian_name;
            $hs_student->guardian_email = $request->guardian_email;
            $hs_student->guardian_mobile_number = $request->guardian_mobile_number;
            $hs_student->save();

        } elseif ($user_type == 1) {

            $this->validate($request, [
                'ls_id_number' => 'exists:loyolaschools,ls_id_number',
                'obf_email' => 'exists:loyolaschools,obf_email',
            ]);

        } elseif ($user_type == 2) {
            
            $this->validate($request, [
                'staff_id_number' => 'exists:staffs,staff_id_number',
                'ateneo_email' => 'exists:staffs,ateneo_email',
            ]);

            $staffs = Staffs::where('staff_id_number',$request->staff_id_number)->first();
            $staffs->department = $request->department;
            $staffs->unit = $request->unit;
            $staffs->save();

        }

        return view('auth.register', compact('user_type'));
    }
}
