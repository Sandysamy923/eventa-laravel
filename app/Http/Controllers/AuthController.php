<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
     public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function saveuser(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        $message=[
            'acceptterm' => 'you should agree all statements',
        ];
        $validate=request()->validate([
            "name" => ['required','string','max:200'],
            "email" => ['required','string','email','unique:users,email'],
            "password" => ['required','string','min:6','confirmed'],
            "acceptterm" => ['accepted']
        ],$message);

        User::create([
            "name" => $validate['name'],
            "email" => $validate['email'],
            "password" => Hash::make($validate['password'])
        ]);
        

        return to_route('dashboard');
    }

    public function dashboard(){
        return view('admin.profile');
    }

    public function logout(){
        auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function adminlogout(){
        auth()->guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('loginadmin');
    }

    public function loginuser(){
        $validate=request()->validate([
            "email"=> ['required','email'],
            "password"=>['required']
        ]);
        
        $email=$validate['email'];
        $password=$validate['password'];

        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return to_route('dashboard');
        }else{
            return back()->withErrors('invalid credentials ');
        }

    }

    public function loginadmin(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->is_admin) {
            return redirect('/admin/events'); 
        } else {
            return redirect('/'); 
        }
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

    public function registerPayUser(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'acceptterm' => 'accepted',
         'event_id' => 'required|exists:events,id',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    Auth::login($user); 

    return redirect()->route('checkout',['event_id' => $validated['event_id']]); 
}


public function loginPayUser(Request $request)
{
    $validated=request()->validate([
            "email"=> ['required','email'],
            "password"=>['required'],
            'event_id' => 'required|exists:events,id',
        ]);
        
        $email=$validated['email'];
        $password=$validated['password'];

        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->route('checkout',['event_id' => $validated['event_id']]); 
            
        }else{
            return back()->withErrors('invalid email or password');
        }

    }

    public function showLoginPay(Request $request)
{
    return view('auth.loginpay', ['event_id' => $request->event_id]);
}




   

}




    
