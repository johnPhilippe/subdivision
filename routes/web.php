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
    Route::get('/admin/dashboard', [ChartController::class, 'showCharts'])
        ->name('admin.dashboard');

    Route::get('/admin/residentForms/{residentId}/editResident', [App\Livewire\EditResident::class, 'editResidentInfo'])
        ->name('admin.residentForms.editResident');
});

//<----------------------------------------------NAVBAR ROUTES---------------------------------------------->

Route::get('/admin/incidentReport', function () {
    return view('admin.incidentReport');
})->middleware(['auth:admin', 'verified'])->name('admin.incidentReport');

Route::get('/admin/userManagement', function () {
    return view('admin.userManagement');
})->middleware(['auth:admin', 'verified'])->name('admin.userManagement');

Route::get('/admin/residentForms/createResident', function () {
    return view('admin.residentForms.createResident');
})->middleware(['auth:admin', 'verified'])->name('admin.residentForms.createResident');

Route::get('/admin/archivedPets', function () {
    return view('admin.archivedPets');
})->middleware(['auth:admin', 'verified'])->name('admin.archivedPets');

Route::get('/admin/archivedVehicles', function () {
    return view('admin.archivedVehicles');
})->middleware(['auth:admin', 'verified'])->name('admin.archivedVehicles');

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

//<----RESIDENT ARCHIVE ROUTES

Route::delete('resident/{residentId}/archive', [App\Http\Controllers\ArchiveController::class, 'archiveResident'])
    ->middleware(['auth:admin', 'verified'])
    ->name('archive.resident');

Route::get('/admin/archivedData', [App\Http\Controllers\ArchiveController::class, 'index'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.archivedData');

Route::get('/admin/{archivedResidentId}/unarchiveData', [App\Http\Controllers\ArchiveController::class, 'unarchiveResident'])
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.unarchiveData');

//<----VEHICLE ARCHIVE ROUTES

Route::delete('vehicle/{vehicleId}/archive', [App\Http\Controllers\ArchiveController::class, 'archiveVehicle'])
    ->middleware(['auth:admin', 'verified'])
    ->name('archive.vehicle');

Route::get('/vehicle/{archivedVehicleId}/unarchiveData', [App\Http\Controllers\ArchiveController::class, 'unarchiveVehicle'])
    ->middleware(['auth:admin', 'verified'])
    ->name('vehicle.unarchiveData');

//<----PET ARCHIVE ROUTES
Route::delete('pet/{petId}/archive', [App\Http\Controllers\ArchiveController::class, 'archivePet'])
    ->middleware(['auth:admin', 'verified'])
    ->name('archive.pet');

Route::get('/pet/{archivedPetId}/unarchiveData', [App\Http\Controllers\ArchiveController::class, 'unarchivePet'])
    ->middleware(['auth:admin', 'verified'])
    ->name('pet.unarchiveData');