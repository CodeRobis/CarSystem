<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth')->group(function (){
//     Route::get('/students/create',[ StudentController::class, 'create'])->name('students.create');
//     Route::post('/students/save',[ StudentController::class, 'save'])->name('students.save');
//     Route::get('/students/{id}/edit',[ StudentController::class, 'edit'])->name('students.edit');
//     Route::post('/students/{id}/update',[StudentController::class,'update'])->name('students.update');
//     Route::get('/students/{id}/delete',[StudentController::class,'delete'])->name('students.delete')->middleware('suaugusiems');
//     Route::resource('courses', CourseController::class);
// });


// Route::get('/students',[StudentController::class, 'index'])->name('students.index');
// Route::post('/students/search',[StudentController::class,'search'])->name('students.search');

// Route::middleware(['auth', 'permission'])->group(function () {
    // Create Owner
    Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');
    Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store');
    // Read Owners
    Route::get('/owners',[OwnerController::class, 'index'])->name('owners.index');
    Route::post('/owners/search',[OwnerController::class,'search'])->name('owners.search');
    Route::get('/owners/{id}', [OwnerController::class, 'show'])->name('owners.show');
    // Update Owner
    Route::get('/owners/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit');
    Route::put('/owners/{owner}', [OwnerController::class, 'update'])->name('owners.update');
    // Delete Owner
    Route::delete('/owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy');

    // Create Car
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
    // Read Cars
    Route::get('/cars',[CarController::class, 'index'])->name('cars.index');
    Route::post('/cars/search',[CarController::class,'search'])->name('cars.search');
    Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
    // Update Car
    Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    // Delete Car
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
// });

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/setLanguage/{language}', [LanguageController::class, 'setLanguage'])->name("setLanguage");
