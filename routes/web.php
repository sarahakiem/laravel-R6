<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('w', function () {
    return "hellow laravel";
});

Route::get('cars/{id}', function ($id) {
    return "car is " . $id;
}

);
Route::get('user/{name}/{age?}', function ($name, $age = 0) {
    if ($age == 0) {
        return "username is " . $name;
    } else {
        return "username is " . $name . " and age is " . $age;
    }

})->where([
    'name' => '[a-zA-Z]+',
    'age' => '[0-9]+',
]);
//)->whereALpha('name')->whereNumber('age');

Route::get('f/{name}', function ($name) {
    return "name is " . $name;
})->whereIn('name', ['nour', 'sara', 'maha']);

Route::prefix('company')->group(function () {
    Route::get('', function () {
        return 'company index';
    });
    Route::get('it', function () {
        return 'company it';
    });
    Route::get('users', function () {
        return 'company users';
    });

});
Route::prefix('accounts')->group(function () {
    Route::get('', function () {
        return 'accounts index';
    });
    Route::get('admin', function () {
        return 'accounts idmin';
    });
    Route::get('user', function () {
        return 'accounts user';
    });

});
// Route::get('cars/{country?}/{brand?}', function ($country = null, $brand = null) {
//     if ($country === 'usa') {
//         if ($brand === 'ford') {
//             return 'ford car in USA';
//         } elseif ($brand === 'tesla') {
//             return 'TESLA car in USA';
//         }
//     } elseif ($country === 'ger') {
//         if ($brand === 'mercides') {
//             return 'Mercides car in GERMAN';
//         } elseif ($brand === 'audi') {
//             return 'AUDI car in GERMAN';
//         } elseif ($brand === 'volkswagen') {
//             return 'volkswagen car in GERMAN';
//         }
//     } elseif($country === null){
//       return 'cars index';
//     }
// });
Route::prefix('car')->group(function () {
    Route::get('', function () {
        return "car index";
    });
    Route::prefix('usa')->group(function () {
        Route::get('ford', function () {
            return "car is ford";
        });
        Route::get('tesla', function () {
            return "car is tesla";
        });
    });
});

// Route::fallback(function(){
// return redirect('/');
// });
/////////////////////////         VIEW              //////////////////////////////////////////////
// Route::get('cv',function(){
// return view('cv');
// });
////    ANOTHER WAY   //////Route::view('cv', 'cv');
///////////////////////////////   USING Controller      ///////////////////////
Route::get('cv',[ExampleController::class,'cv']);
//////////////////////          Named Route     //////////////////////////////////
// Route::get('link', function () {
//     $url1 = route('v');
//     $url2 = route('c');
//     return "<a href='$url1'>go to welcome</a>
//             <a href='$url2'>go to hell</a>";
// });
Route::get('link',[ExampleController::class, 'link']);

Route::get('welcome', function () {
    return "welcome to laravel";
})->name('v');
Route::get('hell', function () {
    return "welcome to hell";
})->name('c');
//////////////////////////////   LOGIN FORM  ////////////////////////////////////////////////
Route::get('login',[ExampleController::class, 'login']
);
Route::post('data',function(){
    return "data saVED SUSSESFULY";
    })->name('data');
 //////////////////////// Contact US  ///////////////////////////////////////////////////////////
Route::get('contact',[ExampleController::class, 'contact']);
Route::post('recieved',[ExampleController::class,'recieved'])->name('recieved');