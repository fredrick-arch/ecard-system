<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karibu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">
    <div class="text-center">
        <div class="text-8xl mb-6">🎉</div>
        <h1 class="text-4xl font-bold text-green-700 mb-4">
            Karibu {{ $ecard->recipient_name }}!
        </h1>
        <p class="text-2xl text-gray-700">
            Katika {{ $ecard->title }}
        </p>
        <p class="mt-8 text-gray-600">
            Asante kwa kuja. Furahia sherehe!
        </p>
    </div>
</body>
</html>