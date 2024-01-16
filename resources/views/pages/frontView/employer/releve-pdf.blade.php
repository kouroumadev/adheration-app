<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
          border:1px solid black;
          border-collapse: collapse;
        }
        </style>
</head>
<body>

    <div style="width: 60%; margin:auto; position: relative;left:170px; top:5px">
        <img src="{{ public_path('images/cnsslogo2.png') }}" width="100" height="100" alt="" srcset="">
    </div>
    <h3 style="align-items: center; position: relative; top:0px; left: 150px">CAISSE NATIONALE DE SECURITE SOCIALE</h3>

    <div style="width: 80%; border: 1px solid black; padding:15px; border-radius:5px; position: relative;left:50px; top:50px">
        <span style="text-align: center; font-size: 1.7rem; display:block; position:relative left:100px">RELEVE COMPTE EMPLOYER</span> <br>

    </div>
    <table style="position:relative top:200px; margin-top:100px; width:100%">
        <thead>
            <tr style="background-color: rgb(152, 234, 152)">

              <th scope="col">Date Effet</th>
              <th scope="col">Periode</th>
              <th scope="col">Annee</th>
              <th scope="col">Salaire Brut</th>
              <th scope="col">Sailaire Soumis</th>
              <th scope="col">Montant Cotise</th>
              <th scope="col">Part Salariale</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($cotisation as $cot)

            @php
            $categorie =  $cot['entreprises']['categorie'];

            $period = \Carbon\CarbonPeriod::create(date('F', strtotime($cot["periode_debut"])), '1 month', date('F', strtotime($cot["periode_fin"])));
            $part_salariale = ((int)$cot["salaire_soumis"] * 0.05);

            @endphp
            <tr>
                <td>{{date('d-M-Y',strtotime($cot["created_at"]))  }}</td>
                @if ($categorie == "E-20")
                <td>
                 @foreach ($period as $pd )
                     {{ date('M', strtotime($pd)) }}-
                 @endforeach
               </td>
                @else
                <td>

                  {{ date('F', strtotime($cot["periode_fin"])) }}
               </td>
                @endif

                    <td>{{ date('Y', strtotime($cot["periode_fin"])) }}</td>

                <td>{{ number_format($cot["salaire_brut"] )}}</td>
                <td>{{ number_format($cot["salaire_soumis"]) }}</td>
                <td>{{ number_format($cot["montant_cotise"]) }}</td>
                <td>{{ number_format($part_salariale) }}</td>
            </tr>
            @endforeach

        </tbody>
        <tfoot>
            <th scope="col" colspan="3">Total</th>
            <th scope="col">{{ number_format($total_brut) }}</th>
            <th scope="col">{{ number_format($total_soumis )}}</th>
            <th scope="col">{{ number_format($total_cotise) }}</th>
            <th scope="col">{{ number_format($total_part) }}</th>
        </tfoot>
    </table>
</body>
</html>
