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

Route::get('/', 'IndexController@index');
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/toplivedata', 'HomeController@getTopLiveData')->name('toplivedata');
Route::get('/termsofview', 'HomeController@termsOfView')->name('termsofview');

Route::get('/profile', 'MyProfileController@index')->name('profile');
Route::get('/getliveprofilecurrencydata', 'MyProfileController@getLiveProfileCurrencyData');

Route::get('/editpricealert', 'MyProfileController@editPriceAlertEditForm')->name('edit.price.alert');
Route::post('/savepricealert', 'MyProfileController@savePriceAlertData')->name('save.price.alert');
Route::get('/deletepricealert/{id}', 'MyProfileController@deletePriceAlertData')->name('delete.price.alert');
Route::get('/pricealert', 'MyProfileController@getCoinAlertData')->name('price.alert');

Route::get('/editprofile', 'MyProfileController@editProfileForm')->name('editprofile');
Route::post('/savedetails', 'MyProfileController@saveProfileData')->name('save.details');
Route::get('/addcryptocurrency', 'MyProfileController@addCryptoCurrencyForm')->name('add.crypto.currency');
Route::get('/addcryptocurrencyex/{currency_name}', 'MyProfileController@addCryptoCurrencyFormEx')->name('add.crypto.currencyex');
Route::post('/addcryptocurrency', 'MyProfileController@addCryptoCurrencyData')->name('store.crypto.currency');
Route::get('/editcryptocurrency/{id}', 'MyProfileController@editCryptoCurrencyForm')->name('edit.crypto.currency');
Route::get('/deletecryptocurrency/{id}', 'MyProfileController@deleteCryptoCurrencyForm')->name('delete.crypto.currency');
Route::get('/selectdefaultavatar', 'MyProfileController@selectDefaultAvatarImageForm')->name('select.default.avatar');
Route::get('/selectcustomavatar', 'MyProfileController@selectCustomAvatarImageForm')->name('select.custom.avatar');
Route::get('/changewithdefaultavatar', 'MyProfileController@changeUserAvatarWithDefaultAvatar')->name('change.with.default.avatar');
Route::post('/changewithcustomavatar', 'MyProfileController@changeUserAvatarWithCustomAvatar')->name('change.with.custom.avatar');
Route::get('/changeprofilestatus/{status_type}', 'MyProfileController@changeProfileStatus')->name('change.profile.status');
Route::get('/closethisaccount', 'MyProfileController@closeThisAccount')->name('close.this.account');

Route::get('/coinmatchview', 'CoinMatchController@index')->name('coin.match.view');
Route::post('/storecoinmatch', 'CoinMatchController@storeCoinMatch')->name('store.coin.match');
Route::get('/deletecoinmatch/{match_id}', 'CoinMatchController@deleteCoinMatch')->name('delete.coin.match');
Route::get('/getinvestedcoinamount/{coin_name}', 'CoinMatchController@getInvestedCoinAmount')->name('invested.coin.amount');
Route::get('/coinmatchbiz', 'CoinMatchController@viewCoinMatchBiz')->name('coinmatch.biz');
Route::post('/coinmatchreview', 'CoinMatchController@storeReviewInfo')->name('coinmatch.review');
Route::get('/sendinterestmsg/{send_user_id}', 'CoinMatchController@sendInterestMsgToSpecificUser')->name('send.interest.msg');
Route::get('/sendmsg/{send_user_id}', 'CoinMatchController@sendMsgToSpecificUser')->name('send.msg');

Route::get('/globalcoinmatchbiz', 'IndexController@viewCoinMatchBiz')->name('global.coinmatch.biz');
Route::get('/getorderdata/{userid}', 'IndexController@getOrderLiveData')->name('global.coinmatch.data');

Route::get('/portfolios', 'PortfolioController@index')->name('portfolios');
Route::get('/getliveportfolios', 'PortfolioController@getLivePortfolioData')->name('getliveportfolios');
Route::get('/detailportfolio/{userId}', 'PortfolioController@detailPortfolio')->name('detailportfolio');
Route::get('/coins', 'CoinsController@index')->name('coins');
Route::get('/coinchart/{coin_id}', 'CoinsController@coinChart')->name('coinchart');
Route::get('/getcoinlivechartdata/{coin_id}', 'CoinsController@coinLiveData')->name('coinchart');
Route::get('/coinpage', 'CoinsController@getCoinDataByPagePos')->name('coin.page');
Route::get('/filter/{filter}', 'CoinsController@getSearchDataForFilter')->name('coin.filter');

Route::get('/verification/{code}', 'Auth\RegisterController@verificationForm')->name('verification');
Route::post('/sendverification', 'Auth\RegisterController@verificationEmail')->name('sendverification');
Route::get('/resetpass', 'Auth\LoginController@forgotPassForm')->name('reset.pass');
Route::get('/sendresetpass', 'Auth\LoginController@sendResetPassLink')->name('send.resetpasslink');
Route::get('/resetpassform', 'Auth\LoginController@resetResetPassInfo')->name('reset.passinfo');
Route::post('/resetpassword', 'Auth\LoginController@resetResetPassword')->name('reset.password');

Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

Route::get('/news', 'NewsController@index')->name('news');

Route::get('/walletverification', 'WalletVerificationController@index')->name('wallet_verification');
Route::post('/addverifiedcoin', 'WalletVerificationController@addVerifiedCoin')->name('add_verified_coin');
Route::post('/saveverifiedcoin', 'WalletVerificationController@saveVerifiedInfo')->name('save_verified_coin');

//Cron job
Route::get('/dumprealdata', 'CronController@dumpCMCData')->name('dumprealdata');
