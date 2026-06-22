<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Master</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Plus Jakarta Sans',sans-serif;
        }
    </style>
</head>
<body class="bg-slate-100">

<div class="flex min-h-screen">

    @include('admin.sidebar')

    <main class="flex-1 ml-64 p-10 overflow-x-auto">
        @yield('content')
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session("success") }}',
    confirmButtonColor: '#2563eb',
    timer: 2500,
    showConfirmButton: false
});
</script>
@endif

<script>
document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        Swal.fire({
            title: 'Yakin?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});
</script>
</body>
</html>