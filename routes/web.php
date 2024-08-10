<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClacssController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('w', function () {
    return "hellow laravel";
});

Route::get('cad/{id}', function ($id) {
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
Route::get('cv', [ExampleController::class, 'cv']);
//////////////////////          Named Route     //////////////////////////////////
// Route::get('link', function () {
//     $url1 = route('v');
//     $url2 = route('c');
//     return "<a href='$url1'>go to welcome</a>
//             <a href='$url2'>go to hell</a>";
// });
Route::get('link', [ExampleController::class, 'link']);

Route::get('welcome', function () {
    return "welcome  laravel";
})->name('v');
Route::get('hell', function () {
    return "welcome to larvel2";
})->name('c');
//////////////////////////////   LOGIN FORM  ////////////////////////////////////////////////
Route::get('login', [ExampleController::class, 'login']
);
Route::post('data', [ExampleController::class, 'data'])->name('data');
//////////////////////// Contact US          ////////////////////////////////////////////////////////
Route::get('contact', [ExampleController::class, 'contact']);
Route::post('recieved', [ExampleController::class, 'recieved'])->name('recieved');

//////////////////////////  add_car route   //////////////////////////////////////////////////////
Route::prefix('cars')->controller(CarController::class)->group(function () {
    Route::get('createcar', 'create');
    Route::post('store','store')->name('cars.store');
////////////////////////       cars        //////////////////////////////////////////////////
    Route::get('','index')->name('cars.index');
    Route::get('{id}/edit','edit')->name('cars.edit');
    Route::put('{id}/update','update')->name('cars.update');

    Route::get('show/{id}','show')->name('cars.show');
    Route::get('delete/{id}','destroy')->name('cars.destroy');
    Route::get('trashed','ShowDeleted')->name('trashed.cars');
///////////////////////////////restore deleted record/////////////////////////////
    Route::patch('{id}/restore','restore')->name('cars.restore');
////////////////////////////////delete frm database//////////////////////////////////////
    Route::delete('deletePermenant/{id}','forceDelete')->name('cars.permanentDelete');
});
////////////////////////////////////////////////////////////////////////


Route::prefix('classes')->group(function () {
    //////////////////////////  add_class       ///////////////////////////////////////////////////
    Route::get('add_class', [ClacssController::class, 'create']);
    Route::post('save', [ClacssController::class, 'store'])->name('save');
/////////////////////////    classes      /////////////////////////////////////////////////
    Route::get('', [ClacssController::class, 'index'])->name('clas');
///////////////////////       Edit         //////////////////////////////////////////////
    Route::get('edit/{id}', [ClacssController::class, 'edit'])->name('class.edit');
    Route::put('update/{id}', [ClacssController::class, 'update'])->name('classes.update');
///////////////////////       show         //////////////////////////////////////////////
    Route::get('show/{id}', [ClacssController::class, 'show'])->name('classes.show');
///////////////////////       delete         //////////////////////////////////////////////
    Route::delete('delete/{id}', [ClacssController::class, 'destroy'])->name('class.delete');
    Route::get('trashed', [ClacssController::class, 'showDeletedClasses'])->name('classes.trashed');
//////////////////////////    restore          ////////////////////////////////////////////
    Route::patch('restore/{id}', [ClacssController::class, 'restore'])->name('classes.restore');
    Route::delete('deletePermenant/{id}', [ClacssController::class, 'forceDelete'])->name('class.permenantdelete');

});
/////////////////////////////////////////////////////////////////////////////////
Route::get('upload',[ExampleController::class,'fileUpload']);
Route::post('upload',[ExampleController::class,'upload'])->name('file.upload');
///////////////////////////////////////////////////////////////
////////////////////////////////////PRODUCT///////////////////////////////////
Route::prefix('fashion')->controller(ProductController::class)->group(function(){
Route::get('','index')->name('fashion.index');
Route::get('add','create');
Route::post('product','store')->name('store.product');
Route::get('all','showAllproduct');
Route::get('edit/{id}','edit')->name('edit.product');
Route::put('update/{id}','update')->name('update.product');

});
//////////////////////////////////////////////////////////////////////////////////////
Route::get('about',[ExampleController::class,'about']);
