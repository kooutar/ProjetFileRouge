<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Certificat de Formation</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f9f9f9;
            padding: 60px;
            text-align: center;
            border: 10px solid #4f6d7a;
        }

        .container {
            border: 5px dashed #c0d6df;
            padding: 40px;
            background: #ffffff;
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            color: #4f6d7a;
            margin-bottom: 20px;
        }

        .subtitle {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .content {
            font-size: 18px;
            color: #333;
            margin-bottom: 30px;
        }

        .footer {
            margin-top: 40px;
            font-size: 16px;
            color: #777;
        }

        .signature {
            margin-top: 60px;
            font-size: 16px;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <div class="container">
        <img src="{{ public_path('images/logo.png') }}" class="logo" alt="Logo"> {{-- Assure-toi que logo.png existe dans public/images --}}
        
        <div class="title">Certificat de Formation</div>

        <div class="subtitle">Décerné à :</div>
        <div class="content"><strong>{{ auth()->user()->name}}</strong></div>

        <div class="content">
            Pour avoir complété avec succès la formation<br>
            <strong>{{ $certificat->titre }}</strong>
        </div>

        <div class="content">Date de délivrance : <strong>{{now()->format('d/m/Y')}}</strong></div>

        <div class="signature">
            ___________________________<br>
            Signature du formateur
        </div>

        <div class="footer">Laravel E-learning Academy</div>
    </div>
</body>
</html>
