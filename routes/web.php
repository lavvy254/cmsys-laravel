<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrayerController;
use App\Http\Controllers\Prayer_requestController;
use App\Http\Controllers\GivingController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\GmembersController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\Sermon_notesController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EventController;


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

Auth::routes();


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notificatioons']);
});

Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('/users', [UserController::class, 'index'])->name('user.index');
	Route::get('/add', [UserController::class, 'create'])->name('user.add');
	Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
	Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
	Route::post('/store', [UserController::class, 'store'])->name('user.store');
	Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.delete');
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');

	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});
Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('/create', [PrayerController::class, 'create'])->name('prayer.add');
	Route::get('/prayer/{prayer}/edit', [PrayerController::class, 'edit'])->name('prayer.edit');
	Route::put('/prayer/{prayer}', [PrayerController::class, 'update'])->name('prayer.update');
	Route::post('/save', [PrayerController::class, 'store'])->name('prayer.store');
	Route::delete('/prayer/{prayer}', [PrayerController::class, 'destroy'])->name('prayer.delete');
	Route::get('/prayerrequest/{prayer_request}/edit', [Prayer_requestController::class, 'edit'])->name('prayerrequest.edit');
	Route::put('/prayerrequest/{prayer_request}', [Prayer_requestController::class, 'update'])->name('prayerrequest.update');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('/event/add', [GivingController::class, 'create'])->name('giving.create');
	Route::post('/giving/store', [GivingController::class, 'store'])->name('giving.store');
	Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
	Route::get('/event/add', [EventController::class, 'create'])->name('event.add');
	Route::get('/event/{event}/edit', [EventController::class, 'edit'])->name('event.edit');
	Route::put('/event/{event}', [EventController::class, 'update'])->name('event.update');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
	Route::get('/groups', [GroupsController::class, 'create'])->name('groups.create');
	Route::post('/groups/store', [GroupsController::class, 'store'])->name('groups.store');
	Route::get('/groups/{groups}/edit', [GroupsController::class, 'edit'])->name('groups.edit');
	Route::put('/groups/{groups}', [GroupsController::class, 'update'])->name('groups.update');

	Route::get('/gmembers/add', [GmembersController::class, 'create'])->name('gmemebers.create');
	Route::post('/gmembers/store', [GmembersController::class, 'store'])->name('gmembers.store');
	Route::get('/gmembers/{gmembers}/edit', [GmembersController::class, 'edit'])->name('gmembers.edit');
	Route::put('/gmembers/{gmembers}', [GmembersController::class, 'update'])->name('gmembers.update');
	Route::get('/admin/event', [EventController::class, 'adminindex'])->name('events.view');
});


Route::group(['middleware' => ['auth', 'admin']], function () {

	Route::get('/sermon/create', [SermonController::class, 'create'])->name('sermon.create');
	Route::post('/sermon/store', [SermonController::class, 'store'])->name('sermon.store');
	Route::get('/sermon/{sermon}/edit', [SermonController::class, 'edit'])->name('sermon.edit');
	Route::put('/sermon/{sermon}', [SermonController::class, 'update'])->name('sermon.update');
	Route::delete('/sermon/{sermon}', [SermonController::class, 'destroy'])->name('sermon.delete');
	Route::get('/snotes/add', [Sermon_notesController::class, 'create'])->name('snote.create');
	Route::post('/snotes/store', [Sermon_notesController::class, 'store'])->name('snote.store');
	Route::get('/snotes/{snotes}/edit', [Sermon_notesController::class, 'edit'])->name('snote.edit');
	Route::put('/snotes/{snotes}', [Sermon_notesController::class, 'update'])->name('snote.update');
	Route::delete('/snotes/{snotes}', [Sermon_notesController::class, 'destroy'])->name('snote.delete');
});

Route::group(['middleware' => ['auth', 'admin']], function () {

	Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
	Route::post('/announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
	Route::get('/announcement/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
	Route::put('/announcement/{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update');
	Route::delete('/announcemets/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.delete');
});
Route::group(['middleware' => ['auth', 'admin']], function () {

	Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
	Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
	Route::get('/attendance/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendance.edit');
	Route::put('/attendance/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
	Route::delete('/attendance/{attendance}', [AttendanceController::class, 'destroy'])->name('attendance.delete');
});

//user routes
//user prayer and prayer requests
Route::group(['middleware' => 'auth'], function () {
	Route::get('/sermon', [SermonController::class, 'index'])->name('sermon.view');
	Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.view');
	Route::get('/groupview', [GroupsController::class, 'index'])->name('groups.view');
	Route::delete('/groups/{groups}', [GroupsController::class, 'destroy'])->name('groups.delete');
	Route::get('/snotes', [Sermon_notesController::class, 'index'])->name('snote.view');
	Route::get('/gmembers', [GmembersController::class, 'index'])->name('gmembers.view');
	Route::delete('/gmembers/{gmember}', [GmembersController::class, 'destroy'])->name('gmembers.delete');
	Route::get('/prayers', [PrayerController::class, 'index'])->name('prayers.index');
	Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcement.view');
	Route::get('/view', [GivingController::class, 'index'])->name('giving.index');
	Route::post('/prayerrequest/store', [Prayer_requestController::class, 'store'])->name('prayerrequest.store');
	Route::get('/prayerrequest/add', [Prayer_requestController::class, 'create'])->name('prayerrequest.add');
	Route::get('/prayerrequest/{prayer_request}/edit', [Prayer_requestController::class, 'edit'])->name('prayerrequest.edit');
	Route::put('/prayerrequest/{prayer_request}', [Prayer_requestController::class, 'update'])->name('prayerrequest.update');
	Route::get('Events/edit', [EventController::class, 'edit'])->name('events.edit');
	Route::get('Events', [EventController::class, 'index'])->name('events.index');

	Route::post('/events/{event}/attend', [EventController::class, 'attend'])->name('events.attend');
	Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.delete');
	Route::post('/joingroup', [GroupsController::class, 'joingroup'])->name('group.join');
	Route::get('member/profile', [ProfileController::class, 'edit'])->name('memberprofile');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/mpesa', [PaymentController::class, 'index'])->name('mpesa.index');
Route::post('/mpesa/pay', [PaymentController::class, 'initiatePayment'])->name('mpesa.pay');
Route::get('/mpesa/callback', [PaymentController::class, 'mpesacallback'])->name('mpesa.callback');
Route::get('/getGenderAndAgesData', [UserController::class, 'getGenderAndAgesData']);
Route::get('/getYearlyAttendanceData', [AttendanceController::class, 'getYearlyAttendanceData']);
Route::get('/getYearlyGivingData', [GivingController::class, 'getYearlyGivingData']);
Route::get('/getTypeWiseGivingData', [GivingController::class, 'getTypeWiseGivingData']);
Route::get('/givingview', [GivingController::class, 'index'])->name('giving.view');
Route::delete('/giving/{giving}', [GivingController::class, 'destroy'])->name('givings.delete');
Route::post('/giving/store', [GivingController::class, 'store'])->name('giving.store');
Route::get('/giving/print', [GivingController::class, 'printPDF'])->name('giving.print');
