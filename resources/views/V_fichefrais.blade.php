@extends('V_listemois')
@section("contenu2")

<?php

?>
<?php // dd($lesInfosFicheFrais); ?>
@foreach($lesInfosFicheFrais as $fichefrais)
    
    <div style="background-color : rgba(61, 161, 255, 0.623);padding : 10px;margin : 10px;color : white">
        <ul>
            <form action="{{ route('chemin_edit_frais') }}" method="POST">
                {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->

            <li>Id Visiteur :"{{ $fichefrais['idVisiteur'] }}"</li>
            <li>Mois : "{{ $fichefrais['mois'] }}"</li>
            <li>Montant valide :"{{ $fichefrais['montantValide'] }}"</li>
            <li>Last Modif : "{{ $fichefrais['dateModif'] }}"</li>
            <li>Etat ID : "{{ $fichefrais['idEtat'] }}"</li>
            <li>Libelle : "{{ $fichefrais['libelle'] }}"</li>
            <li> <input type="hidden" name="montantvalide" value={{ $fichefrais['montantValide'] }}> 
                <input type="hidden" name="nb" value={{ $fichefrais['nbJustificatifs'] }}> 
                <button  name="edit" type="submit">Edit VA to RB</button></li>
            </form>
        </ul>
    </div>
    
@endforeach
@endsection 
