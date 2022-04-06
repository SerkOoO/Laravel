@extends ('modeles/visiteur')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
                   <li >
                    <strong>Bonjour comptable {{ $comptable['nom'] . ' ' . $comptable['prenom'] }}</strong>
                      
                   </li>
            
               <li class="smenu">
               <a href="{{ route('chemin_selectionMois2') }}" title="fiche frais">acceder aux fiches frais</a>
               <a href="{{ route('chemin_ficheMois') }}" title="fiche mois precedent">acceder au fiches du mois precedent </a>
                <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>

                  </li>
                </ul>
               
        </div>
    @endsection          