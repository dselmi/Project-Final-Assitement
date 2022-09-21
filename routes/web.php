<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FicheController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\generationController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\MessagesController;

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

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/blank', 'pages.blank');

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
    Route::get('/index', [UserController::class, 'render'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', [UserController::class, 'create_user'])->name('index');
        Route::post('/', [UserController::class, 'store_User'])->name('store');
    });

    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{user}', [UserController::class, 'edit_user'])->name('index');
        Route::post('/{user}', [UserController::class, 'update_user'])->name('update');
    });

    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete');
});






//profile
Route::get('/mon-profile/{user}', [UserController::class, 'profile'])->name('profile');
Route::post('/updateProfile/{user}', [UserController::class, 'update_Profile'])->name('update.profile');
Route::get('/editProfile', [UserController::class, 'editProfile'])->name('edit.profile');

Route::post('/crop/{user}', [UserController::class, 'crop'])->name('PictureUpdate');

//ficheAccueil

Route::group(['prefix' => 'sheet', 'as' => 'sheet.'], function () {

    Route::get('/index', [FicheController::class, 'view_fiche'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', [FicheController::class, 'create_accueil'])->name('index');
        Route::post('/', [FicheController::class, 'StoreFicheAccueil'])->name('store');
    });

    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{fiche}', [FicheController::class, 'edit_accueil'])->name('index');
        Route::post('/{fiche}', [FicheController::class, 'UpdateFicheAccueil'])->name('update');
    });

    Route::get('/', [FicheController::class, 'pdf'])->name('pdf');
    Route::delete('/delete/{fiche}', [FicheController::class, 'delete'])->name('delete');
    Route::get('/', [FicheController::class, 'rdv'])->name('rdv');

});

Route::group(['prefix' => 'ecoute', 'as' => 'ecoute.'], function () {
    Route::get('/index', [FicheController::class, 'view_fiche_ecoute'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{fiche}', [FicheController::class, 'create_ecoute'])->name('index');
        Route::post('/{fiche}', [FicheController::class, 'StoreFicheEcoute'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{fiche}', [FicheController::class, 'edit_ecoute'])->name('index');
        Route::post('/{fiche}', [FicheController::class, 'UpdateFicheEcoute'])->name('update');
    });
    Route::get('/stat', [FicheController::class, 'stat'])->name('stat');

    Route::delete('/delete/{fiche}', [FicheController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'garde', 'as' => 'garde.'], function () {
    Route::get('/index', [FicheController::class, 'view_fiche_garde'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{fiche}', [FicheController::class, 'create_garde'])->name('index');
        Route::post('/{fiche}', [FicheController::class, 'StoreFicheGarde'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{fiche}', [FicheController::class, 'edit_garde'])->name('index');
        Route::post('/{fiche}', [FicheController::class, 'UpdateFicheGarde'])->name('update');
    });

    Route::delete('/delete/{fiche}', [FicheController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'consultation', 'as' => 'consultation.'], function () {
    Route::get('/index', [FicheController::class, 'view_fiche_consultation'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{fiche}', [FicheController::class, 'create_consultation'])->name('index');
        Route::post('/{fiche}', [FicheController::class, 'StoreFicheConsultation'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{fiche}', [FicheController::class, 'edit_Consultation'])->name('index');
        Route::post('/{fiche}', [FicheController::class, 'UpdateFicheConsultation'])->name('update');
    });

    Route::delete('/delete/{fiche}', [FicheController::class, 'delete'])->name('delete');
});

Route::group(['prefix' => 'rapport_ecoutante', 'as' => 'rapport_ecoutante.'], function () {
    Route::get('/index', [RapportController::class, 'list_rapports_ecoutantes'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{fiche}', [RapportController::class, 'create_rapport_ecoutante'])->name('index');
        Route::post('/{fiche}', [RapportController::class, 'StoreRapportEcoutante'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{rapport}', [RapportController::class, 'edit_rapport_ecoutante'])->name('index');
        Route::post('/{rapport}', [RapportController::class, 'UpdateRapportEcoutante'])->name('update');
    });

    Route::delete('/delete/{rapport}', [RapportController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'rapport_assistante', 'as' => 'rapport_assistante.'], function () {
    Route::get('/index', [RapportController::class, 'list_rapports_assistantes'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{fiche}', [RapportController::class, 'create_rapport_assistante'])->name('index');
        Route::post('/{fiche}', [RapportController::class, 'StoreRapportAssistante'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{rapport}', [RapportController::class, 'edit_rapport_assistante'])->name('index');
        Route::post('/{rapport}', [RapportController::class, 'UpdateRapportAssistante'])->name('update');
    });

    Route::delete('/delete/{rapport}', [RapportController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'rapport_psychologue', 'as' => 'rapport_psychologue.'], function () {
    Route::get('/index', [RapportController::class, 'list_rapports_psychologues'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{fiche}', [RapportController::class, 'create_rapport_psychologue'])->name('index');
        Route::post('/{fiche}', [RapportController::class, 'StoreRapportPsychologue'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{rapport}', [RapportController::class, 'edit_rapport_psychologue'])->name('index');
        Route::post('/{rapport}', [RapportController::class, 'UpdateRapportPsychologue'])->name('update');
    });

    Route::delete('/delete/{rapport}', [RapportController::class, 'delete'])->name('delete');
});
Route::group(['prefix' => 'rapport_avocat', 'as' => 'rapport_avocat.'], function () {
    Route::get('/index', [RapportController::class, 'list_rapports_avocat'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{fiche}', [RapportController::class, 'create_rapport_avocat'])->name('index');
        Route::post('/{fiche}', [RapportController::class, 'StoreRapportAvocat'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{rapport}', [RapportController::class, 'edit_rapport_avocat'])->name('index');
        Route::post('/{rapport}', [RapportController::class, 'UpdateRapportAvocat'])->name('update');
    });

    Route::delete('/delete/{rapport}', [RapportController::class, 'delete'])->name('delete');
});

Route::get('/home', [DashboardController::class, 'home'])->name('home.dashboard');

//generation
Route::group(['prefix' => 'generation', 'as' => 'generation.'], function () {
    Route::get('/index', [generationController::class, 'generation_home'])->name('home');


    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/edit/{generation}', [generationController::class, 'get_edit_generation'])->name('index');
        Route::post('/update/{generation}', [generationController::class, 'edit_generation'])->name('update');
    });

    Route::delete('/delete/{generation}', [generationController::class, 'destroy_generation'])->name('delete');
});

//entrees
Route::group(['prefix' => 'entres', 'as' => 'entres.'], function () {
    Route::get('/index', [generationController::class, 'show_entres'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', [generationController::class, 'get_add_entres'])->name('index');
        Route::post('/', [generationController::class, 'post_add_entres'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{generation}', [generationController::class, 'get_edit_entres'])->name('index');
        Route::post('/{generation}', [generationController::class, 'edit_entres'])->name('update');
    });

    Route::delete('/delete/{generation}', [generationController::class, 'destroy_entres'])->name('delete');
});

//sorties

Route::group(['prefix' => 'sorties', 'as' => 'sorties.'], function () {
    Route::get('/index', [generationController::class, 'show_sorties'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/', [generationController::class, 'get_add_sorties'])->name('index');
        Route::post('/', [generationController::class, 'post_add_sorties'])->name('store');
    });
    Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
        Route::get('/{generation}', [generationController::class, 'get_edit_sorties'])->name('index');
        Route::post('/{generation}', [generationController::class, 'get_sorties'])->name('update');
    });

    Route::delete('/delete/{generation}', [generationController::class, 'destroy_sorties'])->name('delete');
});

//types
Route::group(['prefix' => 'type', 'as' => 'type.'], function () {
    Route::get('/index', [generationController::class, 'index_types'])->name('index');

    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::get('/{id}', [generationController::class, 'single_type'])->name('index');
        Route::post('/', [generationController::class, 'post_types'])->name('store');
    });


    Route::delete('/delete/{type}', [generationController::class, 'destroy_type'])->name('delete');
});

//Medicaments
Route::get('/list-medicaments', [MedicamentController::class, 'index'])->name('medicaments.list');
Route::get('/medicament-create', [MedicamentController::class, 'create'])->name('medicament.create');
Route::get('/medicament-details-{id}', [MedicamentController::class, 'details'])->name('medicament.details');
Route::get('/medicament-{id}', [MedicamentController::class, 'edit'])->name('medicament.edit');
Route::post('/medicament-registration', [MedicamentController::class, 'MedicamentRegistration'])->name('medicament.register');
Route::put('/medicament-modification', [MedicamentController::class, 'MedicamentModification'])->name('medicament.update');
Route::delete('/medicament/{id}', [MedicamentController::class, 'destroy']);
Route::get('/commandes', [MedicamentController::class, 'orders'])->name('medicaments.orders');
Route::post('/commande-registration', [MedicamentController::class, 'CommandeRegistration'])->name('commande.register');
Route::delete('/commande/{id}', [MedicamentController::class, 'destroyCommande']);
Route::post('/accept-commande/{id}', [MedicamentController::class, 'AcceptCommande']);
Route::post('/reject-commande/{id}', [MedicamentController::class, 'RejectCommande']);


//messenger
Route::group(['middleware' => 'auth', 'prefix' => 'messages', 'as' => 'messages'], function () {
    Route::get('/index', [MessagesController::class, 'index']);
    Route::get('create', [MessagesController::class, 'create'])->name('.create');
    Route::post('/', [MessagesController::class, 'store'])->name('.store');
    Route::get('{thread}', [MessagesController::class, 'show'])->name('.show');
    Route::put('{thread}', [MessagesController::class, 'update'])->name('.update');
    Route::delete('{thread}', [MessagesController::class, 'destroy'])->name('.destroy');
});

Route::get('/dashboard', [AuthController::class, 'dashboard']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
