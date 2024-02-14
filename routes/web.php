<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth:admin', 'verified'])->group(function () {
    // Your existing admin dashboard route
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route for rendering the chart within the admin dashboard
    Route::get('/admin/dashboard', [ChartController::class, 'residentPieChart',])
        ->name('admin.dashboard');

    Route::get('/admin/showData/{resident}/editResidentInfo', [App\Livewire\EditResident::class, 'editResidentInfo'])
        ->name('admin.showData');
});

Route::get('/admin/incidentReport', function () {
    return view('admin.incidentReport');
})->middleware(['auth:admin', 'verified'])->name('admin.incidentReport');

Route::get('/admin/userManagement', function () {
    return view('admin.userManagement');
})->middleware(['auth:admin', 'verified'])->name('admin.userManagement');

Route::get('/admin/recordCar', function () {
    return view('admin.recordCar');
})->middleware(['auth:admin', 'verified'])->name('admin.recordCar');

Route::get('/admin/recordPet', function () {
    return view('admin.recordPet');
})->middleware(['auth:admin', 'verified'])->name('admin.recordPet');

Route::get('/admin/recordTenant', function () {
    return view('admin.recordTenant');
})->middleware(['auth:admin', 'verified'])->name('admin.recordTenant');

Route::get('/admin/residentForms/createResident', function () {
    return view('admin.residentForms.createResident');
})->middleware(['auth:admin', 'verified'])->name('admin.residentForms.createResident');



Route::get('/admin/showData', [App\Http\Controllers\ResidentController::class, 'index'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.showData');

require __DIR__.'/adminauth.php';

//<----------------------------------------------IMPORT ROUTES---------------------------------------------->

//<----Residents
Route::get('resident/import', [App\Http\Controllers\ResidentController::class, 'index']);

Route::post('resident/import', [App\Http\Controllers\ResidentController::class, 'importExcelData']);

//<----Pets
Route::get('resident/petImport', [App\Http\Controllers\ResidentController::class, 'getPet']);

Route::post('resident/petImport', [App\Http\Controllers\ResidentController::class, 'importPetExcelData']);

//<----Vehicles
Route::get('resident/vehicleImport', [App\Http\Controllers\ResidentController::class, 'getVehicle']);

Route::post('resident/vehicleImport', [App\Http\Controllers\ResidentController::class, 'importVehicleExcelData']);

//<----------------------------------------------ADDITIONAL INFO ROUTES---------------------------------------------->

Route::get('/admin/resident/{residentId}/additionalInfo', [App\Http\Controllers\VehicleController::class, 'index'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.additionalInfo');

//<----VEHICLES

Route::get('/admin/resident/{homeownerId}/createVehicle', [App\Http\Controllers\VehicleController::class, 'createVehicle'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.createVehicle');

Route::post('/admin/resident/storeVehicle', [App\Http\Controllers\VehicleController::class, 'storeVehicle'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.storeVehicle');

Route::get('/admin/resident/{homeownerId}/{vehicleId}/editVehicle', [App\Http\Controllers\VehicleController::class, 'editVehicle'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.editVehicle');

Route::put('/admin/resident/updateVehicle', [App\Http\Controllers\VehicleController::class, 'updateVehicle'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.updateVehicle');

//<----PETS

Route::get('/admin/resident/{homeownerId}/createPet', [App\Http\Controllers\VehicleController::class, 'createPet'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.createPet');

Route::post('/admin/resident/storePet', [App\Http\Controllers\VehicleController::class, 'storePet'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.storePet');

Route::get('/admin/resident/{homeownerId}/{petId}/editPet', [App\Http\Controllers\VehicleController::class, 'editPet'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.editPet');

Route::put('/admin/resident/updatePet', [App\Http\Controllers\VehicleController::class, 'updatePet'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.resident.updatePet'); 

//<----TENANTS

Route::get('/admin/{residentId}/residentForms/createTenant', [App\Http\Controllers\ResidentController::class, 'createTenant'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.residentForms.createTenant');

Route::post('/admin/residentForms/storeTenant', [App\Http\Controllers\ResidentController::class, 'storeTenant'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.residentForms.storeTenant');