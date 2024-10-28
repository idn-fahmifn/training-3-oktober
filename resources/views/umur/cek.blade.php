<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Umur</h1>

    <!-- jika error datanya, maka bisa mengeluarkan error berikut -->
    @if (session('error'))
        <div style="color: red;">
            {{session('error')}}
        </div>
    @endif

    <form action="{{route('proses-umur')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Masukan Umur Kamu.</label>
            <input type="number" name="umur">
        </div>
        <button type="submit">Cek Umur Saya</button>
    </form>
</body>
</html>