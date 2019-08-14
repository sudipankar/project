<?php

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

Route::get('/', 'DashboardController@index')->name('welcome');
Route::get('/bb', 'DashboardController@index')->name('bb');

Auth::routes();

Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Users
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@getUsers')->name('users');
Route::get('/users/{uid}/edit', 'UserController@editUser')->name('edit');
Route::get('/users/{uid}/delete', 'UserController@deleteUser')->name('delete');
// Route::get('/users/{uid}/update', 'UserController@updateUser')->name('update');
Route::post('/users/{uid}/update', 'UserController@updateUser')->name('update');

//Professions
Route::get('/professions', 'ProfessionController@getProfessions')->name('professions');
Route::get('/professions/add', 'ProfessionController@addProfessions')->name('add_prof');
Route::post('/professions/add', 'ProfessionController@addProfessions')->name('add_prof');
Route::get('/professions/{pid}/edit', 'ProfessionController@editProfessions')->name('edit');
// Route::get('/professions/{pid}/delete', 'ProfessionController@deleteProfessions')->name('delete_prof');
Route::get('/professions/{pid}/delete', 'ProfessionController@deleteProfessions')->name('delete_prof');
Route::get('/professions/{pid}/changestatus', 'ProfessionController@changeStatus')->name('prof_change_status');

//Questionnaires
Route::get('/questionnaires', 'QuestionnaireController@getQuestionnaires')->name('questionnaires');
Route::get('/questionnaires/add_question_form/{oid?}', 'QuestionnaireController@addQuestionForm')->name('add_question_form');
Route::get('/questionnaires/{cid}/get_ques', 'QuestionnaireController@getQuestions')->name('get_questions');
Route::get('/questionnaires/{qid}/delete', 'QuestionnaireController@deleteQuestion')->name('delete_questions');
// Route::get('/questionnaires/add_question', 'QuestionnaireController@addQuestion')->name('add_question');
Route::post('/questionnaires/add_question', 'QuestionnaireController@addQuestion')->name('add_question');

//Ebooks
Route::get('/ebooks', 'EbookController@getEbooks')->name('ebooks');
Route::get('/ebooks/ebook_form/{eid?}', 'EbookController@ebookForm')->name('ebook_form');
Route::post('/ebooks/ebook_form_edit_submit/{eid?}', 'EbookController@ebookFormeditSubmit')->name('ebook_form_edit_submit');
Route::post('/ebooks/ebook_form_submit', 'EbookController@ebookFormSubmit')->name('ebook_form_submit');
Route::get('/ebooks/{eid}/changestatus', 'EbookController@changeStatus')->name('ebook_change_status');
Route::get('/ebooks/{eid}/delete', 'EbookController@deleteEbook')->name('delete_ebook');

/*
* Front-end Routes
*/
// Route::get('/create_temp_user', 'HomeController@createTempUser')->name('create_temp_user');
Route::get('/pay_for_ebook', 'HomeController@payForEbook')->name('pay_for_ebook');

// Route::get('/is_loggedin', 'HomeController@isLoggedIn')->name('is_loggedin');
Route::get('/is_loggedin', function() {
    if(\Auth::check()) {
        $user = Auth::user();
        return ['userid' => $user->id];
    } else {
        return ['userid' => 0];
    }
})->name('is_loggedin');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/user_login', 'DashboardController@login')->name('userlogin');
Route::post('/user_login', 'DashboardController@login')->name('userlogin');
Route::get('/get_questionnaire/{pid}', 'DashboardController@getQuestionnaire')->name('get_questionnaire');
// Route::get('/register_user', 'DashboardController@register')->name('register_user');
Route::post('/register_user', 'DashboardController@register')->name('register_user');
Route::get('/payment_history', 'DashboardController@getPaymentHistory')->name('payment_history');
Route::get('/saved_ebooks', 'DashboardController@getSavedEbooks')->name('saved_ebooks');
Route::get('/myprofile', 'DashboardController@userProfile')->name('user_profile');
Route::get('/update_profile', 'DashboardController@updateProfile')->name('update_profile');
Route::post('/update_profile', 'DashboardController@updateProfile')->name('update_profile');
// Route::get('/upload_user_image', 'DashboardController@uploadUserImage')->name('upload_user_image');
Route::post('/upload_user_image', 'DashboardController@uploadUserImage')->name('upload_user_image');

//Questionnaire Responses routes
// Route::get('/ques_responses/add_ques_response', 'DashboardController@addQuestionnaireResponse')->name('add_ques_response');
Route::post('/ques_responses/add_ques_response', 'DashboardController@addQuestionnaireResponse')->name('add_ques_response');
