<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\TestingHelper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Illuminate\Auth\AuthManager\Auth;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;


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
Route::get('/', function () {
    // $sss = serialize([
    //     'aaa'=> 'bbbb',
    //     'ccc'=> 'dddd',
    // ]);

    // dd(unserialize($sss));
    return view('welcome');
});

// Route::get('/', function () {
//     $testFoo = app(TestingHelper::class);
//     $testFoo->setFoo('Foo 1');
//     $testFoo->setFoo('Foo 2');
//     dd($testFoo->foo());
// });

Route::get('/json', function () {
    // return Response::json([
    //     'aaaa'=> 'aaaa',
    // ]);
    return response()->json([
        'bbbb'=> 'bbbb',
    ]);
});

Route::get('/functions', function () {
    return (auth()->id());
})->middleware('test:khaled,test,aaa');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/test', [TestController::class, 'index']);

// Route::match(['get', 'post'], '/test', [TestController::class, 'index']);

Route::any('/test', [TestController::class, 'index']);

Route::redirect('/here', '/there');
// Route::permanentRedirect('/here', '/there'); // Route::redirect('/here', '/there',301);

Route::view('/welcome', 'welcome')->name('welcome');

Route::view('/welcome-name', 'welcome_name', ['name' => 'Jihad'])->middleware('test');

Route::get('/test/{id?}', [TestController::class, 'test'])->where(['id' => '[0-9]+']);;

Route::resource('user', UserController::class);

Route::get('/token', function () {
    $token = request()->session()->token();
    $token = csrf_token();
    return $token;
});

Route::get('/request/path', function () {
    $uri = request()->path();
    if (request()->is('request/*')) {
        $status = 'true';
    }else{
        $status = 'false';
    }
    if (request()->routeIs('re*')) {
        $name = 'true';
    }else{
        $name = 'false';
    }

    $url = request()->url();
    $full_url = request()->fullUrl();
    $var = request()->fullUrlWithQuery(['type' => 'phone']);

    $method = request()->method();
    if (request()->isMethod('post')) {
        $status = 'true';
    }else{
        $status = 'false';
    }

    dd(request()->collect());
    dd(request()->all());
    dd(request()->expectsJson());
    dd(request()->ip());
    dd(request()->bearerToken());
    dd(request()->header('host'));

    return $url . '-' . $full_url . '-' . $var;
    return $method . '-' . $status . '-' . $name;
})->name('req');

Route::get('/response', function () {
    $res = response('Hello World', 200)->withHeaders([
        'X-Header-One' => 'Header Value',
        'X-Header-Two' => 'Header Value',
    ]);
    // dd( $res->getStatusCode() );
    dd( $res );
});

require __DIR__.'/auth.php';
