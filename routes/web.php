<?php

//Setting a GET for logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Routes for Authentication & Verification
Auth::routes(['verify' => true]);

// Routes for Pages
Route::get('/pages/privacy', 'PagesController@privacy')->name('privacy');
Route::get('/pages/terms', 'PagesController@terms')->name('terms');

// Home and Dashboard Routes
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// All Routes for User Profile
Route::get('/profile', 'UserProfileController@index')->name('profile');
Route::post('/profile', 'UserProfileController@update')->name('updateProfile');
Route::post('/profile/delete', 'UserProfileController@delete')->name('deleteProfile');
Route::post('/profile/delete/cancel', 'UserProfileController@cancelDeletion')->name('cancelDeletion');
Route::post('/profile/password', 'UserProfileController@updatePassword')->name('updatePassword');
Route::get('/profile/logs', 'UserProfileController@ipLogs')->name('ipLogs');
Route::post('/profile/avatar', 'UserProfileController@updateAvatar')->name('updateAvatar');

// All Routes for Security Settings 
Route::get('/security', 'SecurityController@index')->name('security');
Route::post('/security/questions', 'SecurityController@questions')->name('securityQuestions');
Route::post('/security/2fa/activate', 'SecurityController@activate2FA')->name('activate2FA');
Route::post('/security/2fa/deactivate', 'SecurityController@deactivate2FA')->name('deactivate2FA');
Route::get('/security/2fa/disable', 'SecurityController@disable2FAView')->name('disable2FAView');
Route::post('/security/2fa/disable', 'SecurityController@disable2FA')->name('disable2FA');
Route::post('/authenticate', 'SecurityController@authenticate')->name('authenticate');

// All Routes for Accounts 
Route::get('/accounts', 'AccountsController@index')->name('accounts');
Route::post('/accounts', 'AccountsController@store')->name('storeAccount');
Route::post('/accounts/view', 'AccountsController@view')->name('viewAccount');
Route::patch('/accounts/{account}', 'AccountsController@update')->name('updateAccount');
Route::delete('/accounts', 'AccountsController@destroy')->name('deleteAccount');
Route::post('/accounts/export', 'AccountsController@export')->name('exportAccounts');
//Routes for Account Notes
Route::post('/accounts/view/{account}/notes', 'AccountNoteController@store')->name('accounts.notes.add');
Route::delete('/account-notes/{accountNote}', 'AccountNoteController@destroy')->name('accounts.notes.delete');

//Route for searching %LIKE% account.
Route::get('/accounts/search', 'AccountsController@search')->name('searchAccount');
Route::get('/accounts/folder/{folder}', 'AccountsController@searchByFolder')->name('searchByFolder');
//Routes for Folder
Route::post('/accounts/folder', 'FoldersController@create')->name('createFolder');
Route::post('/accounts/{account}/folder/add', 'FoldersController@addAccount')->name('addToFolder');
Route::delete('/accounts/{account}/folder/{folder}', 'FoldersController@removeAccount')->name('removeFromFolder');
Route::delete('/accounts/folder/{folder}/delete', 'FoldersController@destroy')->name('deleteFolder');
Route::post('/accounts/folder/{folder}/password', 'FoldersController@addPassword')->name('folder.add.password');
Route::delete('/accounts/folder/{folder}/password', 'FoldersController@removePassword')->name('folder.remove.password');
Route::post('/accounts/folder/view', 'FoldersController@folderView')->name('folder.view.accounts');
Route::post('/accounts/folder/view/add', 'FoldersController@folderAddAccount')->name('folder.view.accounts.add');

//Route for Random String/Password Generator
Route::post('/rng', 'AccountsController@rng')->name('rng');

//Routes for creating and deleting Quick Notes
Route::post('/notes', 'QuickNoteController@store')->name('notes');
Route::delete('/notes/{note}', 'QuickNoteController@destroy')->name('deleteNotes');

// Support Routes
Route::get('/contact', 'Admin\SupportController@contact')->name('contact');
Route::post('/contact', 'Admin\SupportController@sendEmail')->name('sendEmail');

// All Routes for Admin
// Overview
Route::get('/admin/overview', 'Admin\AdminController@index')->name('overview');
// Users
Route::get('/admin/user/{user}', 'Admin\AdminController@user')->name('userOverview');
Route::get('/admin/user/{user}/logs', 'Admin\AdminController@userLogs')->name('userLogs');
Route::post('/admin/user/{user}/email', 'Admin\AdminController@changeEmail')->name('changeEmail');
Route::post('/admin/user/{user}/pin', 'Admin\AdminController@verifyPIN')->name('verifyPIN');
Route::post('/admin/user/{user}/action', 'Admin\AdminController@takeAction')->name('takeAction');
Route::post('/admin/user/{user}/removeBan', 'Admin\AdminController@removeBan')->name('removeBan');
Route::post('/admin/user/{user}/delete', 'Admin\AdminController@deleteUser')->name('deleteUser');
Route::post('/admin/user/{user}/promote', 'Admin\AdminController@promoteToAdmin')->name('promoteToAdmin');
Route::post('/admin/user/{user}/demote', 'Admin\AdminController@demoteToUser')->name('demoteToUser');
Route::post('/admin/user/register', 'Admin\AdminController@registerUser')->name('registerUser');
// Admin Settings
Route::get('/admin/settings', 'Admin\AdminController@settings')->name('adminSettings');
Route::post('/admin/settings', 'Admin\AdminController@updateSettings')->name('updateSettings');
Route::post('/admin/settings/mailer', 'Admin\AdminController@updateMailer')->name('updateMailer');
Route::post('/admin/settings/database', 'Admin\AdminController@updateDatabase')->name('updateDatabase');
Route::post('/admin/settings/access', 'Admin\AdminController@accessMode')->name('accessMode');
Route::post('/admin/settings/annoucement', 'Admin\AdminController@makeAnnouncement')->name('makeAnnouncement');
Route::post('/admin/settings/maintenance/down', 'Admin\AdminController@goDown')->name('goDown');
Route::post('/admin/settings/maintenance/up', 'Admin\AdminController@goLive')->name('goLive');
Route::post('/admin/settings/background/changeScheme', 'Admin\AdminController@changeScheme')->name('changeScheme');
Route::get('/admin/settings/environment/local', 'Admin\AdminController@goLocal')->name('goLocal');
Route::get('/admin/settings/environment/production', 'Admin\AdminController@goProduction')->name('goProduction');

// Laravel Shorts
Route::get('/admin/settings/cache/clearCache', 'Admin\LaravelShortcuts@clearCache')->name('clearCache');
Route::get('/admin/settings/cache/clearView', 'Admin\LaravelShortcuts@clearView')->name('clearView');
Route::get('/admin/settings/cache/clearRoute', 'Admin\LaravelShortcuts@clearRoute')->name('clearRoute');
Route::get('/admin/settings/cache/clearConfig', 'Admin\LaravelShortcuts@clearConfig')->name('clearConfig');
Route::get('/admin/settings/cache/clearCompiled', 'Admin\LaravelShortcuts@clearCompiled')->name('clearCompiled');
// Categories Controller
Route::get('/admin/settings/categories', 'Admin\CategoryController@showCategories')->name('showCategories');
Route::post('/admin/settings/categories/create', 'Admin\CategoryController@addCategory')->name('addCategory');
Route::get('/admin/settings/categories/{category}/deactivate', 'Admin\CategoryController@deactivateCategory')->name('deactivateCategory');
Route::get('/admin/settings/categories/{category}/activate', 'Admin\CategoryController@activateCategory')->name('activateCategory');
Route::get('/admin/settings/categories/{category}/delete', 'Admin\CategoryController@deleteCategory')->name('deleteCategory');
// Backup Manager
Route::get('/admin/manager', 'Admin\BackupController@index')->name('manager');
Route::get('/admin/manager/backups', 'Admin\BackupController@index')->name('backups');
Route::post('/admin/manager/backups/addPath', 'Admin\BackupController@addPath')->name('addPath');
Route::get('/admin/manager/backups/create', 'Admin\BackupController@create')->name('createBackups');
Route::get('/admin/manager/backups/download/{file_name?}', 'Admin\BackupController@download')->name('downloadBackups');
Route::get('/admin/manager/backups/delete/{file_name?}', 'Admin\BackupController@delete')->where('file_name', '(.*)');

// <- Installation Routes (You can delete this section after installation is complete)
Route::get('/admin/install', 'Install\InstallationController@index');
Route::get('/admin/install/step1', 'Install\InstallationController@step1');
Route::post('/admin/install/step1confirm', 'Install\InstallationController@step1confirm');
Route::post('/admin/install/step2confirm', 'Install\InstallationController@step2confirm');
Route::post('/admin/install/step3', 'Install\InstallationController@step3');
// Delete this after Installation ->