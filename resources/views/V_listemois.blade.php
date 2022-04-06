
@extends ('V_sommaire')
    @section('contenu1')
      <div id="contenu">
        <h2>Mes fiches de frais <?php echo date('Ym'); ?> </h2>
        <h3>Mois à sélectionner : </h3>
      <form action="{{ route('chemin_afficher_fiches_en_fonction_mois') }}" method="post">
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm"><p>
          <label for="lstMois" >Mois : </label>

          <select id="lstMois" name="lstMois">
              @foreach($lesMois as $mois)
              <?php var_dump($lesMois) ?>
                    <option value="{{ $mois['mois'] }}">
                      {{ $mois['numMois']}}/{{$mois['numAnnee'] }} 
                    </option>
              @endforeach
          </select>
        </p>
        </div>
        <div class="piedForm">
        <p>
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </p> 
        </div>
          
        </form>
  @endsection 
 