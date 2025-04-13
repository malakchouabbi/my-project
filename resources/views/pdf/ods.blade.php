<!--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ordre de Service</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; }
        .header { text-align: center; margin-bottom: 30px; }
        .section { margin-bottom: 15px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>ORDRE DE SERVICE</h2>
        <p>Projet: {{ $ods->projet->titre_projet ?? 'N/A' }}</p>
    </div>

    <div class="section"><span class="label">N° ODS:</span> {{ $ods->num_ods }}</div>
    <div class="section"><span class="label">N° Bon de commande:</span> {{ $ods->num_bon_commande }}</div>
    <div class="section"><span class="label">Date Bon de commande:</span> {{ $ods->date_bon_commande }}</div>
    <div class="section"><span class="label">Date ODS:</span> {{ $ods->date_ods }}</div>
    <div class="section"><span class="label">Date de commencement de l'exécution:</span> {{ $ods->date_commence_execution }}</div>
    <div class="section"><span class="label">Site du projet:</span> {{ $ods->site_projet }}</div>
    <div class="section"><span class="label">Objet:</span><br> {!! nl2br(e($ods->objet)) !!}</div>

    <div style="margin-top: 40px;">
        <p>Signature du Responsable:</p>
    </div>
</body>
</html>
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        body {
            font-family: 'DejaVu Serif', serif;
            font-size: 13px;
            line-height: 1;
        }
        .text-center { text-align: center; }
        .bold { font-weight: bold; }
        .mt-1 { margin-top: 10px; }
        .mt-2 { margin-top: 20px; 
        font-family: 'DejaVu Serif', serif;}
        .signature { margin-top: 50px; }
        .underline { text-decoration: underline; }
        .DRA{margin-top:5px;
            font-size: large;
        }
        .titre-ods {
    margin-bottom: 0px;
    font-size: large;
    line-height: 0.5;
}

.date-right {
    text-align: right;
    right: 10px;
    margin-top: 20px;
    font-weight: bold;
    padding-right: 100px;
}
      
.signatures {
    display: flex;
    justify-content: space-between;
    margin-top: 50px;
}
.signature-left,
.signature-right {
    width: 45%;
    font-weight: normal;
}  
         .image-1 {
        position: absolute;
        top: 5px;
        left: 18px;
        width: 100px; /* تقدر تعدل الحجم حسب الحاجة */
    }
    .line {
        margin-bottom: 0px;
        margin-top: 50px;
    }
    </style>
    
</head>
<body>

    <div class="text-center bold">
        <img src="{{ $base64 }}" class="image-1">

        
<!--$safeFileName -->

        <p class="underline">DIRECTION OPERATIONNELLE  <br> <span class="underline">GUELMA</span></p>
        <p class="mt-2 titre-ods underline">Ordre de Service de Démarrage des Travaux</p>
        <p class="underline DRA" >DRA N°{{ $ods->num_ods ?? '' }}/{{ \Carbon\Carbon::parse($ods->date_ods)->format('Y') }}</p>
    </div>

    <p class="mt-2">
        <strong>Bon de commande N°</strong> {{ $ods->num_bon_commande ?? '' }} du {{ \Carbon\Carbon::parse($ods->date_bon_commande)->format('d-m-Y') }}
    </p>

    <p>L'ordre est donner à l'entreprise : <strong>{{ $ods->projet->entreprise->nom_entreprise }}</strong> de procéder au démarrage des travaux de réalisation du projet décrit ci-dessous ,
    conformément aux dispositions contractulles notamment les prescriptions techniques
    </p>
    <p><strong>Description détaillée du projet :</strong> <span style="display:inline;">{{ $ods->objet }}</span></p>


    <p><strong>Site du projet :</strong> {{ $ods->site_projet }}</p>

    <p><strong>Délai d'exécution :</strong> {{ $ods->delai_execution }} Jours calendaires.</p>
    <p><strong>Le délai d'exécution commence :</strong>{{ \Carbon\Carbon::parse($ods->date_commence_execution)->format('d-m-Y')}}</p>

    <p class="mt-2"><strong>Structures chargées du suivi de l'exécution du projet :</strong></p>
    <ul>
        <li>Sous-direction : Technique</li>
        <li>Département : Réseau d'Accès</li>
        <li>Service : Réseau Urbain</li>
    </ul>

    <p class="mt-1">
        <strong>Important :</strong> Une durée de cinq (05) jours sera tolérée, hors délai de l'ODS, pour la préparation des documents administratifs.
    </p>

    <p class="mt-2 date-right">Le : {{ \Carbon\Carbon::parse($ods->date_signature_directeur)->format('d-m-Y') }}</p>

    <div class="signature">
        <table width="100%">
            <tr>
                <td class="text-center signature-left">
                    (Signature et cachet du Sous-directeur Technique)<br><br><br>
                    
                </td>
                <td class="text-center signature-right">
                    (Signature et cachet du Directeur)<br><br><br>
                    
                </td>
            </tr>
        </table>
        </div>
    <p class="underline line">..........................................................................................................................................................................</p>
    <div class="mt-2 ">
        <ul>
            <li>Accusé de réception</li>
            <li>Certifie avoir reçu le présent ordre de service...</li>
        </ul>
    </div>

    <p class="date-right">Le :{{ \Carbon\Carbon::parse($ods->date_signature_entreprise)->format('d-m-Y') }}</p>

   <!-- <p class="signature-rigth">(Signature et cachet de l'entreprise) </p>-->
   <div class="signature">
    <table width="100%">
        <tr>
            <td class="text-center signature-left">
                (Signature et cachet du Sous-directeur Technique)<br><br><br>
                
            </td>
        </tr>
</table>
</div>
</body>
</html>
