<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;
use MyDate;
class voirFraisComptableController extends Controller
{

    function voirFichesSelonMois(){
        if(isset($_POST)){
            $mois = $_POST["lstMois"];



            session(['visiteur' => PdoGsb::getComptable("ib","ib")]); 
            $comptable = session('visiteur');
            $visiteur = $comptable; 
            $idVisiteur = $visiteur['id'];
            $idComptable = $idVisiteur;
            $tabFicheFrais = PdoGsb::getAllFicheFrais();
            $lesFraisForfait = PdoGsb::getLesFraisForfait($idComptable,$mois); // A changer
            $lesMois = PdoGsb::getLesMoisDisponibles2($idVisiteur);

            $lesInfosFicheFrais = PdoGsb::getALlInfosFichesFrais_by_month($mois);

            $vue = view('V_fichefrais')        
            ->with('lesMois',$lesMois)
            ->with('comptable',$visiteur)
            ->with('visiteur',$visiteur)
            ->with('lesInfosFicheFrais', $lesInfosFicheFrais)
            ->with('tabFicheFrais',$tabFicheFrais)
            ->with('lesFraisForfait',$lesFraisForfait);

            return $vue;


        }
    }

    function voirFraisComptable(){
        
        if( session('visiteur')!= null){

            
            session(['visiteur' => PdoGsb::getComptable("ib","ib")]); 


            $comptable = session('visiteur');
            
            $visiteur = $comptable; 
            $idVisiteur = $visiteur['id'];
            $idComptable = $idVisiteur;
            $leMois = request('lstMois'); 
		    $tabFicheFrais = PdoGsb::getAllFicheFrais();
            $lesFraisForfait = PdoGsb::getLesFraisForfait($idComptable,$leMois);
		    $lesInfosFicheFrais = PdoGsb::getALlInfosFichesFrais();
		    $numAnnee = MyDate::extraireAnnee( $leMois);
		    $numMois = MyDate::extraireMois( $leMois);


            $lesMois = PdoGsb::getLesMoisDisponibles2($idVisiteur); // Les fichefrais sont assignées aux id visiteur, et la on a que l'id comptable

		    // $libEtat = $lesInfosFicheFrais['libEtat'];
		    // $montantValide = $lesInfosFicheFrais['montantValide'];
            // $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            // $dateModif =  $lesInfosFicheFrais['dateModif'];
            // $dateModifFr = MyDate::getFormatFrançais($dateModif);

            $vue = view('V_fichefrais')        
            ->with('lesMois',$lesMois)
            ->with('comptable',$visiteur)
                    ->with('visiteur',$visiteur)
                    ->with('lesInfosFicheFrais', $lesInfosFicheFrais)
                    ->with('tabFicheFrais',$tabFicheFrais)
                    ->with('lesFraisForfait',$lesFraisForfait);
            
            return $vue;
        }
        else{
            return view('connexion')->with('erreurs',null);
        }
    }

    function edit_fiche_frais(){
        if(isset($_POST["edit"])){


            session(['visiteur' => PdoGsb::getComptable("ib","ib")]); // VISITEUR EXISTAIT MEME PAS
            $comptable = session('visiteur');
            $visiteur = $comptable; // CA NON PLUS 
            $idVisiteur = $visiteur['id'];
            $idComptable = $idVisiteur;
		    $tabFicheFrais = PdoGsb::getAllFicheFrais();
            $lesFraisForfait = PdoGsb::getLesFraisForfait($idComptable,"201606"); // A changer
		    $lesInfosFicheFrais = PdoGsb::getALlInfosFichesFrais();
            $lesMois = PdoGsb::getLesMoisDisponibles2($idVisiteur);


            $montantvalide = $_POST["montantvalide"];
            $nb = $_POST["nb"];
            $etat = "RB";
        

            PdoGsb::majEtatFicheFrais_no_id_required($montantvalide,$etat,$nb);
            $vue = view('V_fichefrais')        
            ->with('lesMois',$lesMois)
            ->with('comptable',$visiteur)
            ->with('visiteur',$visiteur)
            ->with('lesInfosFicheFrais', $lesInfosFicheFrais)
            ->with('tabFicheFrais',$tabFicheFrais)
            ->with('lesFraisForfait',$lesFraisForfait);

            return $vue;
        }
        else{
            return redirect()->$vue;

        }
        
    }

}