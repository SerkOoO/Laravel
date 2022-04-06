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
        /*-------------------- Use case connexion---------------------------*/


Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnecter'
]);

Route::post('fiche_frais',[
        'as'=>'chemin_fiche',
        'uses'=>'voirFraisComptableController@voirFraisComptable'
]);

Route::post('fiche_frais',[
        'as'=>'chemin_afficher_fiches_en_fonction_mois',
        'uses'=>'voirFraisComptableController@voirFichesSelonMois'
]);

Route::get('fiche_mois',[
        'as'=>'chemin_ficheMois',
        'uses'=>'connexionController@deconnecter'
]);
         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::get('selectionMois2',[
        'as'=>'chemin_selectionMois2',
        'uses'=>'etatFraisController@selectionnerMois2'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        
/*-------------------- Use case gérer les frais---------------------------*/

Route::post('ficheFrais',[ // Sa c nous quon la fait
        'as'=>'chemin_edit_frais',
        'uses'=>'voirFraisComptableController@edit_fiche_frais'
]);

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);



