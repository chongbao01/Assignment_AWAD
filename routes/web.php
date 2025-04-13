<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\MilestoneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
// Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
// Route::get('/projects/{project}/bids/create', [BidController::class, 'create'])->name('bids.create');
// Route::post('/projects/(project}/bids', [BidController::class, 'store'])->name('bids.store');
//JR bid CRUD without authentication:
Route::get('/boss/{user}/projects', [ProjectController::class, 'bossProjects']); //for boss to check own projects
Route::get('/projects', [ProjectController::class, 'index']); //to show available projects
Route::get('/projects/{project}/bids', [BidController::class, 'showBids']); //for boss to view bids on the project id
Route::get('/freelancer/{user}/bids', [BidController::class, 'freelancerBids'])->name('freelancer.bids'); //for freelancer to create new bid
Route::post('/projects/{project}/bids', [BidController::class, 'store']); //submit the free lancer bid to the project
Route::get('/bids/{bid}/edit', [BidController::class, 'edit']); //for freelancer to edit the submited bid
Route::put('/bids/{bid}', [BidController::class, 'update']); //freelancer update the bid
Route::post('/bids/{bid}/assign', [BidController::class, 'assign']); //for boss to direct assign bid to a freelancer id

Route::get('/register', [UserController::class,'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');

Route::get('/projects/{project}/milestones/create', [MilestoneController::class, 'create'])->name('milestones.create');
Route::post('projects/{project}/milestones', [MilestoneController::class,'store'])->name('milestones.store');

Route::get('/projects/{project}/milestones/index', [MilestoneController::class,'index'])->name('milestones.index');
Route::get('/projects/{project}/milestones/{milestone}/edit', [MilestoneController::class,'edit'])->name('milestones.edit');
Route::put('/projects/{project}/milestones/{milestone}', [MilestoneController::class,'update'])->name('milestones.update');
