<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Form Data</h1>

    <form action="{{route('kirim-data-formulir')}}" method="post">
        @csrf
        
        <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="">
        </div>
        <div class="form-group">
            <label for="">Umur</label>
            <input type="number" name="umur" id="">
        </div>
        <div class="form-group">
            <label for="">Nama Panggilan</label>
            <input type="text" name="nama_panggilan" id="">
        </div>
        <button type="submit">Kirim data</button>

    </form>
    
</body>
</html>