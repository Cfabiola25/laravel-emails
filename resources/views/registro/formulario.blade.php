<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Registro de Usuario para Correos</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('registro.registrar') }}" method="POST" class="bg-white p-6 rounded shadow mb-10">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold">Nombre</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold">Correo Electrónico</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>
            <button type="submit" class="bg-red-700 text-white px-6 py-2 rounded hover:bg-red-800">
                Registrarme
            </button>
        </form>

        @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


        <h2 class="text-xl font-bold mb-4 text-gray-800">Usuarios Registrados</h2>
        <table class="w-full bg-white shadow rounded">
            <thead class="bg-red-700 text-white">
                <tr>
                    <th class="p-2 text-left">Nombre</th>
                    <th class="p-2 text-left">Correo</th>
                    <th class="p-2 text-left">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $user)
                    <tr class="border-t">
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
