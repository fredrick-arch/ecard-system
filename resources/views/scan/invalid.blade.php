<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kadi Haipo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-red-50 min-h-screen flex items-center justify-center font-sans">
    <div class="text-center max-w-md mx-auto px-6">
        <div class="text-8xl mb-8">❌</div>
        <h1 class="text-4xl font-bold text-red-700 mb-4">
            Kadi Haipo au Imeharibika
        </h1>
        <p class="text-lg text-gray-700 mb-8">
            QR Code hii haifanani na kadi yoyote iliyotengenezwa.
        </p>
        <p class="text-gray-600 mb-10">
            Tafadhali wasiliana na mwenye sherehe au tengeneza kadi mpya.
        </p>
        <a href="{{ route('home') }}" 
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-medium">
            Rudi Nyumbani
        </a>
    </div>
</body>
</html>