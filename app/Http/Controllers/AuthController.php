<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
use Validator;
use Hash;
use Session;
use App\User;
 
 
class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view("auth.log");
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        //$data = [
          //  'email'     => $request->input('email'),
          //  'password'  => $request->input('password'),
        //];
 
        //Auth::attempt($data);

        
 
        if($request->email == 'admin@gmail.com'){
            return view('addash');
        }elseif($request->email == 'pem@gmail.com'){
            return view("pemdash");
        }elseif($request->email == 'petani@gmail.com') {
            return view("dashboard");
        }else {
            $pu_id = trim(DB::table('pelaku_usaha')->where('email',$request->email)->pluck('id'), '[]');

            if(empty($pu_id)){
                return view("auth.log");
                exit;
            }
            
            $pu_username = trim(trim(DB::table('pelaku_usaha')->where('email',$request->email)->pluck('username'), '[]'), '"');
            $pu_password = trim(trim(DB::table('pelaku_usaha')->where('email',$request->email)->pluck('password'), '[]'), '"');
            $pu_email = $request->email;

            session(['pu_id' =>  $pu_id]);
            session(['pu_username' =>  $pu_username]);
            session(['pu_password' =>  $pu_password]);
            session(['pu_email' =>  $email]);

            if ($request->password ==  $pu_password) {
                return view("admindash",['pu_username'=>$pu_username,'pu_email'=>$pu_email,'pu_id'=>$pu_id]);
            }
            else{ 
                return view("auth.log");
            }
            
        }

 
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
 
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            //return redirect()->route('/general/log');
            return view("auth.log");
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            //return redirect()->route('/general/regis');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        //return redirect()->route('log');
        return view("auth.log");
    }
 
 
}