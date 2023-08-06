<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CropImageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditSectionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentScoreCradExport;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Auth::routes(['verify' => true]);

// Common Routes for all the users

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {

        if (auth()->user()->hasRole('teacher')) {
            return redirect('/teacher-home');
        }

        return redirect('/dashboard');
    });
    // Dashboard Routes
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    // Edit Details
    Route::post('/update_basic_details', [Accountcontroller::class, 'updateBasicInfo'])->name('updateBasicInfo');
    Route::post('/change_my_password', [Accountcontroller::class, 'changeMyPassword'])->name('changePassword');
    Route::post('/change-my-email', [AccountController::class, 'changeMyEmail'])->name('changeMyEmail');
    Route::post('crop-image/{guard}', [CropImageController::class, 'cropImage'])->name('crop_image');
    Route::post('upload-image/{guard}', [CropImageController::class, 'uploadImage'])->name('upload_image');
});

// Admin Routes
// Modules Routes
// Route::middleware(['auth'])->group(function () {
//     Route::resource('module', ModuleController::class);
// });

// Routes for the students
Route::group(['middleware' => ['role:student']], function () {

    // Route::get('/my-courses', [StudentController::class, "index"])->name("my-courses");
    // Route::get('/module-section/{id}', [StudentController::class,'moduleSections'])->name('module-section');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/my-courses/{id?}', [StudentController::class, 'moduleSections'])->name('my-courses');

    // Route::get('/module-section/{id}', [StudentController::class,'moduleSections'])->name('module-section');

    Route::get('/open-section/{id}', [StudentController::class, 'openSection'])->name('this-section');

    Route::post('section_add_to_completed/{sectionId}', [studentcontroller::class, 'markSectionReaded'])->name('markSectionReaded');

    Route::post('section_add_to_completed_last/{sectionId}', [studentcontroller::class, 'markSectionLastReaded'])->name('markSectionLastReaded');

    Route::get('quiz/{sectionId}', [StudentController::class, 'startQuiz'])->name('startQuiz');

    Route::post('/submit-quiz', [StudentController::class, 'submitQuiz'])->name('submitQuiz');

    Route::get('/my-certificate', [StudentController::class, 'generateCertificate'])->name('my-certificate');

    Route::post('/module-quizzes-score', [DashboardController::class, 'quizzesScoreForModule'])->name('quizzesScoreForModule');

    Route::post('/add-referral-code', [AccountController::class, 'addReferralCode'])->name('addReferralCode');

});

// ROUTE ONLY FOR TEACHERS

Route::group(['middleware' => ['role:teacher']], function () {
    //
    Route::get('/teacher-home', [TeacherController::class, 'homepage'])->name('teacher-home');

    Route::get('/manage-scorecards', [TeacherController::class, 'manageScoreCard'])->name('teacher.manage_score_card');

    Route::post('/get_user_score_card', [TeacherController::class, 'StudentScoreAndInfo'])->name('teacher.student_score');

    Route::post('/export_student_record', [StudentScoreCradExport::class, 'exportFile'])->name('export_student_record_pdf');

    Route::get('/export-pdf', [StudentScoreCradExport::class, 'studentpdf'])->name('export-pdf');

    Route::get('/download-pdf', [StudentScoreCradExport::class, 'downloadPdf'])->name('download-pdf');

    Route::get('/teacher-module/{id?}', [TeacherController::class, 'openModule'])->name('teacher-single-module');

});

Route::group(['middleware' => ['role:teacher|student']], function () {
    Route::get('donation', [PaymentController::class, 'index'])->name('donation');
    // paypal route
    Route::post('process-transaction', [PaymentController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
    Route::get('success', [PaymentController::class, 'success'])->name('success');
    Route::get('cancel', [PaymentController::class, 'cancel'])->name('cancel');
});

Route::get('editSection/{id}', [EditSectionController::class, 'index']);
Route::post('saveSection', [EditSectionController::class, 'store'])->name('saveSection');

Route::get('editModule/{id}', [EditSectionController::class, 'module']);
Route::post('saveModule', [EditSectionController::class, 'storeModule'])->name('saveModule');

Route::get('editQuiz/{id}', [EditSectionController::class, 'quiz']);
Route::post('storeQuiz', [EditSectionController::class, 'storeQuiz'])->name('storeQuiz');

Route::get('testpage', [EditSectionController::class, 'testpage']);
