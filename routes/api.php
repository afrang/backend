<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Auth::routes();
Route::prefix('user')->namespace('User')->middleware('auth:api')->group(function () {
        Route::resource('profile', 'Profile\UserController');
        Route::resource('Joblist', 'Profile\JoblistController');
        Route::resource('Roles', 'Profile\RolesController');
        Route::resource('Users', 'Profile\UsersController');
        Route::resource('Filemanager', 'Filemanager\UploadController');
        Route::resource('fileupload', 'Filemanager\fileupload');
        /* Tags */
        Route::resource('Tag','Tag\TagController');
        /* Blog */
        Route::resource('Bloggroup', 'Blog\GroupController');
        Route::post('Blobggroupupdate/{id}', 'Blog\GroupController@update');
        Route::resource('BlogArticle', 'Blog\ArticleController');
        Route::post('BlogArticleupdate/{id}', 'Blog\ArticleController@update');
        /* Setting */
        Route::resource('SettingController', 'Setting\settingcontroller');
        Route::resource('ContactusController', 'Setting\ContactusController');
        /* Gallery */
        Route::resource('GalleryGroup', 'Gallery\gallerygroupcontroller');
        Route::resource('GalleryDetail', 'Gallery\gallerydetilcontroller');
        Route::get('GalleryDetailup/{id}', 'Gallery\gallerydetilcontroller@up');
        /* Attribute */
        Route::resource('Feature', 'Attr\FeatureController');
        Route::resource('Featureitem', 'Attr\FeatureItemController');
        Route::resource('ModelAttrController', 'Attr\ModelAttrController');




});



Route::post('loginuser','Auth\loginPassport@AuthPassport');
Route::resource('syssetting', 'Sys\sys_setting_controller');
