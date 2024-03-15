<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Data Guru</h1>
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Jumlah Siswa Perwalian</th>
    </tr>
    @foreach ($teachers as $teacher)
    <tr>
        <td>{{$teacher->name}}</td>
        <td>{{$teacher->email}}</td>
        <td>{{$teacher->dob}}</td>
        <td>{{$teacher->students->count()}}orang</td>
    </tr>
    @endforeach
</table>
</body>
</html>
