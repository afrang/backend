<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::prefix('')->namespace('View')->group(function (){
        Route::resource('/slider','Tools\GalleryViewController');
        Route::resource('/setting','Tools\SettingpageController');
        Route::resource('/firstpage','Pages\FirstpageController');
        Route::resource('/contactus','Tools\ContactInfoController');

        /* Group */
        Route::resource('/pgroup','Product\ProductGroupControllerViewController');
        Route::resource('/psearch','Product\ProductGroupControllerViewController');
        /* Blog */
        Route::resource('/article','Blog\BlogArticle');
        Route::resource('/blog','Blog\BlogGroup');

        /* Product */
       Route::resource('/searchproduct','Product\ProductSearchControllerView');


});
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
    Route::resource('FirstPageSetting', 'Setting\SpecialPageController');
    /* Gallery */
    Route::resource('GalleryGroup', 'Gallery\gallerygroupcontroller');
    Route::resource('GalleryDetail', 'Gallery\gallerydetilcontroller');
    Route::get('GalleryDetailup/{id}', 'Gallery\gallerydetilcontroller@up');
    Route::get('GalleryDetaildown/{id}', 'Gallery\gallerydetilcontroller@down');
    /* Attribute */
    Route::resource('Feature', 'Attr\FeatureController');
    Route::resource('Featureitem', 'Attr\FeatureItemController');
    Route::resource('ModelAttrController', 'Attr\ModelAttrController');
    Route::resource('Attrprodcut', 'Attr\AttrController');
    Route::resource('AttrProductitem', 'Attr\AttrItemController');
    Route::resource('color', 'Attr\ColorController');
    /* Product */
    Route::resource('pgroup', 'Product\ProductGroupController');
    Route::get('pgroupDetailup/{id}', 'Product\ProductGroupController@up');
    Route::get('pgroupDetaildown/{id}', 'Product\ProductGroupController@down');
    /* Product Detail */
    Route::resource('pdetail', 'Product\ProductDetailController');
    Route::resource('pimage', 'Product\ProductImageController');
    Route::resource('pattr', 'Product\ProductAttrController');
    Route::resource('popt', 'Product\ProdcutOptionController');
    Route::resource('pprice', 'Product\ProductPriceController');





});



Route::post('loginuser','Auth\loginPassport@AuthPassport');
Route::resource('syssetting', 'Sys\sys_setting_controller');
