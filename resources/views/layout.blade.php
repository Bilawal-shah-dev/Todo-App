<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    @yield('content')

    {{-- Auto Popup Messages --}}
    @if(session('success'))
    <script>
        Swal.fire({icon:'success', text: `{{ session('success') }}`, timer: 2500, showConfirmButton: false})
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({icon:'error', text: `{{ session('error') }}`, timer: 3500, showConfirmButton: false})
    </script>
    @endif

    @if($errors->any())
    <script>
        Swal.fire({icon:'warning', text: `{{ $errors->first() }}`, timer: 3500, showConfirmButton: false})
    </script>
    @endif

</body>
</html>