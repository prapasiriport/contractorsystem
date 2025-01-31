<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;

//Admin
use App\Livewire\Admin\AdminHome;
use App\Livewire\Admin\AdminRegisterEmployee;
use App\Livewire\Admin\AdminRegisterContractor;
use App\Livewire\Admin\AdminListEmployee;
use App\Livewire\Admin\AdminListContractor;
use App\Livewire\Admin\AdminViewEmployee;
use App\Livewire\Admin\AdminViewContractor;
use App\Livewire\Admin\AdminEditEmployee;
use App\Livewire\Admin\AdminEditContractor;
use App\Livewire\Admin\AdminAssignWork;
use App\Livewire\Admin\AdminCheckWork;
use App\Livewire\Admin\AdminAllProject;
use App\Livewire\Admin\AdminWorkSchedule;

//Sale
use App\Livewire\Sale\SaleHome;
use App\Livewire\Sale\SaleCreateProject;
use App\Livewire\Sale\SaleListProject;
use App\Livewire\Sale\SaleViewProject;

//Pm
use App\Livewire\Pm\PmHome;
use App\Livewire\Pm\PmAllProject;
use App\Livewire\Pm\PmAssignWork;
use App\Livewire\Pm\PmCheckWork;
use App\Livewire\Pm\PmWorkSchedule;

//Contractor
use App\Livewire\Contractor\ContractorHome;
use App\Livewire\Contractor\ContractorAllProject;
use App\Livewire\Contractor\ContractorWorkSchedule;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

//Admin
Route::get('admin-home', AdminHome::class);
Route::get('admin-register-contractor', AdminRegisterContractor::class);
Route::get('admin-list-contractor', AdminListContractor::class);
Route::get('admin-view-employee/{id}', AdminViewEmployee::class);
Route::get('admin-view-contractor/{id}', AdminViewContractor::class);
Route::get('admin-edit-employee/{id}', AdminEditEmployee::class);
Route::get('admin-edit-contractor/{id}', AdminEditContractor::class);
Route::get('admin-assign-work', AdminAssignWork::class);
Route::get('admin-check-work', AdminCheckWork::class);
Route::get('admin-all-project', AdminAllProject::class);
Route::get('admin-work-schedule', AdminWorkSchedule::class);


//Sale
Route::get('sale-list-project', SaleListProject::class)->name('sale-list-project');
Route::get('sale-list-view/{id}', SaleViewProject::class);
Route::get('sale-create-project', SaleCreateProject::class);
Route::get('sale-home', SaleHome::class);

//Pm
Route::get('pm-home', PmHome::class);
Route::get('pm-all-project', PmAllProject::class);
Route::get('pm-assign-work', PmAssignWork::class);
Route::get('pm-check-work', PmCheckWork::class);
Route::get('pm-work-schedule', PmWorkSchedule::class);

//Contractor
Route::get('contractor-home', ContractorHome::class);
Route::get('contractor-all-project', ContractorAllProject::class);
Route::get('contractor-work-schedule', ContractorWorkSchedule::class);


});

Route::get('login', Login::class);
Route::get('admin-register-employee', AdminRegisterEmployee::class);
Route::get('admin-list-employee', AdminListEmployee::class);


