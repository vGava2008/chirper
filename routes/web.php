<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FabricMethodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Services\Localization\LocalizationService;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', ['welcome' => __('messages.welcome')]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', ChirpController::class)
->only(['index', 'store', 'update', 'destroy'])
->middleware(['auth', 'verified']);

Route::resource('brands', BrandController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::get('/brand/{id}/show', [BrandController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('brand');

Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])
    ->middleware(['auth', 'verified']);
Route::post('brand/{id}/update', [BrandController::class, 'update'])
    ->middleware(['auth', 'verified']);

Route::resource('services', ServiceController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('search', SearchController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::post('/searching', [ServiceController::class, 'searching']);




Route::resource('service', ServiceController::class)
    ->only(['create', 'show', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('employees', EmployeeController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('employee', EmployeeController::class)
    ->only(['create', 'show', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('categories', CategoryController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('category', CategoryController::class)
    ->only(['store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/sendMessage', function (\App\Helpers\Telegram $telegram) {
    $http = $telegram->sendMessage(env('TELEGRAM_CHAT_ID'), ['test message']);
    dd(json_decode($http));
});

Route::get('/sendDoc', function (\App\Helpers\Telegram $telegram) {
   $telegram->sendDocument(env('TELEGRAM_CHAT_ID'), 'bicycle-icon.png', 69);
});

Route::get('/sendMessageAndReplyAsDocument', function(\App\Helpers\Telegram $telegram) {
    $message = $telegram->sendMessage(env('TELEGRAM_CHAT_ID'), 'hello');
    $messageId = json_decode($message)->result->message_id;
        $telegram->sendDocument(env('TELEGRAM_CHAT_ID'), 'icon.png', $messageId);
});

Route::get('/editButtons', function (\App\Helpers\Telegram $telegram) {
    $buttons = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'button 1',
                    'callback_data' => '1'
                ],
            ],
            [
                [
                    'text' => 'button 2',
                    'callback_data' => '2'
                ],
            ]
        ]
    ];
    $sendButtons = $telegram->editButton(env('TELEGRAM_CHAT_ID'), 'test EDITED message', json_encode($buttons), '76');
    $response = json_decode($sendButtons);
    dd($response);
});

Route::get('/getMe', function () {
    $r = \Illuminate\Support\Facades\Http::get('https://api.telegram.org/bot5804465392:AAHgCRQZlJSW6zYW5UVorlrV-8Q4ud5vtRI/getMe');
//    dd($r->object());
});

Route::get('/air', [FabricMethodController::class, 'air']);
Route::get('/road', [FabricMethodController::class, 'road']);

//Route::get('/dns', [TestController::class, 'index']);

Route::get('/qwe', [\App\Http\Controllers\Controller::class, 'index']);
Route::get('/bot', [\App\Http\Controllers\BotController::class, 'index']);
//Route::post('/bot', [\App\Http\Controllers\BotController::class, 'index']);

require __DIR__.'/auth.php';
