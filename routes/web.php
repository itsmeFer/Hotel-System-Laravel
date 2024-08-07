<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::resource('rooms', RoomController::class)->middleware('admin');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


require __DIR__.'/auth.php';
use App\Http\Controllers\Auth\CustomAuthController;

Route::get('/login', [CustomAuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [CustomAuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [CustomAuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/register', [CustomAuthController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [CustomAuthController::class, 'register'])->middleware('guest');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [AuthenticatedSessionController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->middleware('guest');

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [AuthenticatedSessionController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [AuthenticatedSessionController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [AuthenticatedSessionController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');
    Route::get('/rooms/sort/{type?}', [RoomController::class, 'sort'])->name('rooms.sort');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [AuthenticatedSessionController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');
    Route::get('/rooms/sort', [RoomController::class, 'sort'])->name('rooms.sort');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [AuthenticatedSessionController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthenticatedSessionController::class, 'register'])->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');
    Route::get('/rooms/sort', [RoomController::class, 'sort'])->name('rooms.sort');
});
use App\Http\Controllers\BookingController;

Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book');
    Route::get('/rooms/{room}/book', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/rooms/{room}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
});
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.rooms.index');
        } else {
            return redirect()->route('rooms.index');
        }
    })->name('home');

    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index')->middleware('admin');

    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

    Route::resource('rooms', RoomController::class)->except(['index']);

    Route::post('/rooms/{room}/book', [RoomController::class, 'book'])->name('rooms.book')->middleware('user');
    Route::get('/rooms/{room}/book', [BookingController::class, 'create'])->name('bookings.create')->middleware('user');
    Route::post('/rooms/{room}/book', [BookingController::class, 'store'])->name('bookings.store')->middleware('user');

    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('user');
    Route::post('/cart/add/{booking}', [CartController::class, 'add'])->name('cart.add')->middleware('user');
    Route::delete('/cart/cancel/{booking}', [CartController::class, 'cancel'])->name('cart.cancel')->middleware('user');

    // Rute logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Rute login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rute registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
use App\Http\Controllers\AdminController;

// Route untuk admin dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
});

// Route untuk admin dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
});



// Route untuk admin dashboard dan penambahan ruangan
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/rooms/create', [AdminController::class, 'createRoom'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [AdminController::class, 'storeRoom'])->name('admin.rooms.store');
});

// Route untuk QR Code
Route::get('/bookings/{booking}/qrcode', [BookingController::class, 'qrCode'])->name('bookings.qrcode');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/rooms/create', [AdminController::class, 'createRoom'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [AdminController::class, 'storeRoom'])->name('admin.rooms.store');
    Route::get('/admin/rooms', [AdminController::class, 'indexRooms'])->name('admin.rooms.index');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/rooms/create', [AdminController::class, 'createRoom'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [AdminController::class, 'storeRoom'])->name('admin.rooms.store');
    Route::get('/admin/rooms', [AdminController::class, 'indexRooms'])->name('admin.rooms.index');

    // Tambahkan rute edit dan destroy untuk rooms
    Route::get('/admin/rooms/{room}/edit', [AdminController::class, 'editRoom'])->name('admin.rooms.edit');
    Route::delete('/admin/rooms/{room}', [AdminController::class, 'destroyRoom'])->name('admin.rooms.destroy');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/rooms/create', [AdminController::class, 'createRoom'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [AdminController::class, 'storeRoom'])->name('admin.rooms.store');
    Route::get('/admin/rooms', [AdminController::class, 'indexRooms'])->name('admin.rooms.index');
    Route::get('/admin/rooms/{room}', [AdminController::class, 'showRoom'])->name('admin.rooms.show');
    Route::get('/admin/rooms/{room}/edit', [AdminController::class, 'editRoom'])->name('admin.rooms.edit');
    Route::delete('/admin/rooms/{room}', [AdminController::class, 'destroyRoom'])->name('admin.rooms.destroy');
});

// Rute untuk Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/rooms/create', [AdminController::class, 'createRoom'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [AdminController::class, 'storeRoom'])->name('admin.rooms.store');
    Route::get('/admin/rooms', [AdminController::class, 'indexRooms'])->name('admin.rooms.index');
    Route::get('/admin/rooms/{room}', [AdminController::class, 'showRoom'])->name('admin.rooms.show');
    Route::get('/admin/rooms/{room}/edit', [AdminController::class, 'editRoom'])->name('admin.rooms.edit');
    Route::delete('/admin/rooms/{room}', [AdminController::class, 'destroyRoom'])->name('admin.rooms.destroy');
});

// Rute untuk User
Route::middleware(['auth'])->group(function () {
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
    Route::post('/rooms/{room}/book', [BookingController::class, 'book'])->name('rooms.book');
});

