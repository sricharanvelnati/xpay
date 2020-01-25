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


/********************************** FRONT ROUTES *************************************/
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes(['verify' => true]);

// Password change Route
Route::get('/changePassword', 'HomeController@showChangePasswordForm');
Route::post('/changePassword', 'HomeController@changePassword')->name('changePassword');


// Route::get('/', 'HomeController@index');
Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/', 'FrontendController@home');
    Route::get('about', 'FrontendController@about');
    Route::get('terms', 'FrontendController@terms');
    Route::get('privacy-policy', 'FrontendController@privacy');
    Route::get('contact', 'FrontendController@contactUsCreate');
    Route::post('contact/store', 'FrontendController@contactUsStore');
	Route::get('api', 'FrontendController@apiDoc');

});

Route::group(['middleware' => 'auth', 'role:user'], function () {

    /*profile*/
    Route::get('profile', 'Frontend\FrontendController@profile');
    Route::post('front/storeProfile', 'Frontend\FrontendController@storeProfile');

    /*card sign up process */
    Route::group(['prefix' => 'card', 'namespace' => 'Frontend'], function () {

        Route::get('verify', 'CardController@verify');
        Route::post('verifing', 'CardController@verifing');
        Route::get('payment', 'CardController@payment');
        Route::get('dashboard', 'CardController@dashboard');
        Route::get('kyc', 'CardController@hacker_kyc_verification');
        Route::post('paymentType', 'CardController@paymentType');
        Route::get('card-policy', 'CardController@cardPolicy');
        Route::post('updateByUser', 'CardController@updateByUser');
        Route::post('loadCard', 'CardController@loadCard');
        Route::post('check2fa', 'CardController@check2fa');
        Route::get('finexus', 'CardController@fineXus');
        Route::POST('finexus-store', 'CardController@fineXusStore');

    });

    /*2fa*/
    Route::get('2fa', 'HomeController@show2faForm');
    Route::post('2fa', 'HomeController@enable2fa')->name('enable2fa');
    Route::post('disable2fa', 'HomeController@disable2fa')->name('disable2fa');

});

Route::post('card/kyc_callback', 'Frontend\FrontendController@kyc_callback');
Route::get('logout', 'HomeController@logout');
Route::get('front-logout', 'Frontend\FrontendController@frontlogout');


/********************************** FRONT END ****************************************/

/********************************** ADMIN ROUTES *************************************/

Route::get('admin', function () {
    if (!Auth::check()) {
        return Redirect::to("admin/login");
    } else {
        return Redirect::to("admin/dashboard");
    }
});
 
Route::get('admin/login', 'Admin\LoginController@login');
Route::post('admin/login-auth', 'Admin\LoginController@login_auth');

Route::get('merchant/login', 'Admin\LoginController@mlogin');
Route::post('merchant/mlogin-auth', 'Admin\LoginController@mlogin_auth');

Route::group(['middleware' => 'role:admin|vendor'], function () {
    Route::get('admin/logout', function () {
        Auth::logout();
        return redirect('admin/login');
    })->middleware('role:admin');
	Route::get('merchant/logout', function () {
        Auth::logout();
        return redirect('merchant/login');
    })->middleware('role:vendor');
	

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('dashboard', 'DashboardController@index');
    });

    /*Admin Profile*/
    Route::group(['prefix' => 'admin/profile', 'namespace' => 'Admin'], function () {

        Route::get('/', 'AdminProfileController@create');
        Route::post('store', 'AdminProfileController@store');

    });

    /*Admin Users*/
    Route::group(['prefix' => 'admin/root', 'namespace' => 'Admin', 'middleware' => 'role:admin'], function () {

        Route::get('/', 'AdminProfileController@indexAdmin');
        Route::get('create', 'AdminProfileController@createAdmin');
        Route::post('store', 'AdminProfileController@storeAdmin');
        Route::get('{id}/edit', 'AdminProfileController@editAdmin');
        Route::post('{id}/update', 'AdminProfileController@updateAdmin');
        Route::post('delete', 'AdminProfileController@deleteAdmin');
        Route::post('status', 'AdminProfileController@updateAdminStatus');

    });
    /*Categories*/
    Route::group(['prefix' => 'admin/user', 'namespace' => 'Admin', 'middleware' => 'role:admin|vendor'], function () {

        Route::get('/', 'UserController@index')->middleware('role:admin');
        Route::get('/vendorwise/{vendor_id}', 'UserController@index');
        Route::get('{id}/delete', 'UserController@delete');
        Route::post('updateUserStatus', 'UserController@updateUserStatus')->name('admin.user.user-status-update');
		Route::post('updateUserInfo', 'UserController@updateUserInfo')->name('admin.user.user-info-update');
        Route::post('assignCard', 'UserController@assignCard')->middleware('role:admin');
        Route::get('userList', 'UserController@userList')->middleware('role:admin');
        Route::post('deleteUser', 'UserController@delete')->name('admin.user.user-delete');
        Route::get('kyc/{id}/passport','UserController@getImageForPDF');
        Route::get('kyc-pdf/{id}','UserController@getImageForKycPDF');

    });

    /*Plans*/
    Route::group(['prefix' => 'admin/plan', 'namespace' => 'Admin', 'middleware' => 'role:admin'], function () {

        Route::get('/', 'PlanController@index');
        Route::get('create', 'PlanController@create');
        Route::post('store', 'PlanController@store');
        Route::get('{id}/edit', 'PlanController@edit');
        Route::post('{id}/update', 'PlanController@update');
        Route::post('updatePlanStatus', 'PlanController@updatePlanStatus');

    });

    /*CMS*/
    Route::group(['prefix' => 'admin/cms', 'namespace' => 'Admin', 'middleware' => 'role:admin'], function () {
        Route::get('create', 'CmsController@create');
        Route::post('update', 'CmsController@update');
    });

    /*Card*/
    Route::group(['prefix' => 'admin/card', 'namespace' => 'Admin', 'middleware' => 'role:admin|vendor'], function () {
        Route::get('cardLoad', 'CardController@cardLoad')->middleware('role:admin');
        Route::get('cardLoad/vendorwise/{vendor_id}', 'CardController@cardLoad');
        Route::get('cardPurchase', 'CardController@cardPurchase')->middleware('role:admin');
        Route::post('updateByAdmin', 'CardController@updateByAdmin')->middleware('role:admin');
        Route::post('loadStatusUpdate', 'CardController@loadStatusUpdate')->name('admin.card.load-status-update');
        Route::post('updateCardNumber', 'CardController@updateCardNumber')->middleware('role:admin');
    });

    /*ContactUs*/
    Route::group(['prefix' => 'admin/contact', 'namespace' => 'Admin', 'middleware' => 'role:admin'], function () {
        Route::get('/', 'DashboardController@contactus');
        Route::post('response', 'DashboardController@response');
    });

    /*Admin Vendors*/
    Route::group(['prefix' => 'admin/vendors', 'namespace' => 'Admin', 'middleware' => 'role:admin'], function () {

        Route::get('/', 'VendorController@index');
        Route::get('create', 'VendorController@create');
        Route::post('store', 'VendorController@store');
        Route::get('{id}/edit', 'VendorController@edit');
        Route::post('{id}/update', 'VendorController@update');
        Route::post('delete', 'VendorController@delete');
        Route::post('status', 'VendorController@updateStatus');
		

    });
});

/********************************** ADMIN ROUTES ****************************************/
