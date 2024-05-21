<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">3
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program Studi</title>
</head>
<body>
    <h1>UMDP</h1>
    <h2>Program Studi</h2>

    <ul>
        @foreach ($prodi as $item)
            <li>{{ $item['nama'] }} {{ $item['singkatan'] }}
            {{ $item["fakultas"]["nama"] }}</li>
        @endforeach
    </ul>
</body>
</html>