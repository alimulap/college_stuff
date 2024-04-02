<html>
<head>
    <title>Ubah Data User</title>
</head>
<body>
    <h1>Ubah Data User</h1>
    <form action="/user/ubah_simpan/{{ $data->user_id }}" method="post">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label>Username</label><br>
        <input type="text" name="username" value="{{ $data->username }}"><br>
        <br>
        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ $data->nama }}"><br>
        <br>
        <label>Password</label><br>
        <input type="password" name="password" value="{{ $data->password }}"><br>
        <br>
        <label>ID Level Pengguna</label><br>
        <input type="text" name="level_id" value="{{ $data->level_id }}"><br>
        <br>
        <br>
        <input type="submit" value="Simpan" class="btn btn-success">

    </form>
</body>
</html>
