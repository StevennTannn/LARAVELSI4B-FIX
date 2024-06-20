<!-- #region --><?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


route::get('about', function () {
    return "Halaman About";
});

route::get('profil', function () {
    return view ('Profil');
});

// Route dengan parameter
Route::get('Welcome/{salam}', function ($salam) {
    // return 'Selamat '. $salam;
    return view('salam')-> with('viewsalam', $salam);
});

// Route dengan parameter listdata
// Terdapat array list
Route::get('listdata', function () {
    $list = ["Sistem Informasi", "Informatika", "Manajemen"];
    $listmhs = [
        ["npm" => "001", "nama" => "Ahmad"],
        ["npm" => "002", "nama" => "Budi"]
    ];
    return view('listprodi')
            ->with('viewlist', $list)
            ->with('viewmhs', $listmhs);
});

Route::resource('fakultas', FakultasController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa',MahasiswaController::class);

Route::get('dashboard' ,[DashboardController::class, 'index']);


// Route::get('salam',function($salam) {
// return 'Malam';
// });