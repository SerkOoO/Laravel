  <h1 style="color : grey;margin : 10px;">Liste des fiches frais allant du mois dernier jusqu'a présent</h1>
    <table class="table table-bordered mb-5" style="padding : 5px;border : 1px solid grey;margin : 10px;box-shadow:  0 0 5px rgba(128, 128, 128, 0.123)">
        <thead style="border-bottom : 1px solid grey">
            <tr class="table-danger" style="border-bottom : 1px solid grey">
                <th style="text-align: center;margin : 10px !important;" scope="col"># Visiteur</th>
                <th style="text-align: center;margin : 10px !important;" scope="col">Mois</th>
                <th style="text-align: center;margin : 10px !important;" scope="col">nbJustificatifs</th>
                <th style="text-align: center;margin : 10px !important;" scope="col">Montant Valide</th>
                <th style="text-align: center;margin : 10px !important;" scope="col">Date Modif</th>
                <th style="text-align: center;margin : 10px !important;" scope="col">idEtat</th>
                <th style="text-align: center;margin : 10px !important;" scope="col">libelle</th>

            </tr>
        </thead>
        <tbody>
            @foreach($fichefraisderniermois as $data)
            <tr style="margin-top : 10px;">
                <th scope="row">{{ $data["idVisiteur"] }}</th>
                <td>{{ $data["mois"] }}</td>
                <td>{{ $data["nbJustificatifs"] }}</td>
                <td>{{ $data["montantValide"] }}</td>
                <td>{{ $data["dateModif"] }}</td> 
                <td>{{ $data["idEtat"] }}</td>
                <td>{{ $data["libelle"] }}</td> 
            </tr>
            @endforeach
        </tbody>
        <a href="{{ route('chemin_download') }}" class="btn btn-primary" title="fiche mois precedent" style="margin-left : 10px;">Télécharger les fiches</a>

    </table>
