<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>

</head>
<body>
<h1>Reporte de usuarios</h1>
<div class="flex flex-col h-screen">
    <div class="flex-grow overflow-auto">
        <table class="relative w-full border">
            <thead>
            <tr>
                <th class="sticky top-0 px-6 py-3 text-red-900 bg-red-300">Nombre</th>
                <th class="sticky top-0 px-6 py-3 text-red-900 bg-red-300">Correo</th>
            </tr>
            </thead>
            @foreach($users as $user)
            <tbody class="divide-y bg-blue-100">

                <tr>

                    <td class="px-6 py-4 text-center">{{ $user->name }}</td>
                    <td class="px-6 py-4 text-center">{{ $user->email }}</td>

                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
</div>
<p>reporte total</p>
</body>
</html>
