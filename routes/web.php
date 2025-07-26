<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

    Route::get('/', function () {
    $events = Event::all(); 
    return view('home', compact('events')); 
})->name('home');


    Route::get('/events', [EventController::class, 'showEvents'])->name('events');
     Route::get('/contactus', [EventController::class, 'contactus'])->name('contact');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::get('/register', [AuthController::class,'register'])->name('register');
    Route::post('/saveuser', [AuthController::class,'saveuser'])->name('saveuser');
    Route::post('/loginuser', [AuthController::class,'loginuser'])->name('loginuser');

});


Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');



Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google');


Route::get('/auth/google/call-back', function () {

     $googelUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'email' => $googelUser->email,
    ], [
        'name' => $googelUser->name,
        'email' => $googelUser->email,
        'password' => Hash::make('123456')
    ]);

    Auth::login($user);

    return to_route('dashboard');
});
Route::get('/checkout/{event_id}', [StripeController::class, 'checkout'])->name('checkout');



Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/events', EventController::class);
});

Route::get('/', [EventController::class, 'index']);
Route::get('/', [EventController::class, 'indexx'])->name('home');




Route::get('/loginadmin', function () {
    return view('admin.loginadmin'); 
})->name('admin.login');

Route::post('/loginadmin', [AuthController::class, 'loginadmin'])->name('loginadmin');


Route::get('/registerpay', function (\Illuminate\Http\Request $request) {
    return view('auth.registerpay', ['event_id' => $request->event_id]);
})->name('registerpay');


Route::post('/registerpayuser', [AuthController::class, 'registerPayUser'])->name('registerpayuser');


Route::get('/loginpay', [AuthController::class, 'showLoginPay'])->name('loginpay');



Route::post('/loginpayuser', [AuthController::class, 'loginpayuser'])->name('loginpayuser');

Route::post('/adminlogout', [AuthController::class,'adminlogout'])->name('adminlogout');
