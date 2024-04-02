<html>
<head>
    <title>Tambah User</title>
</head>
<body>
    <h1>Tambah User</h1>
    <form action="/user/tambah_simpan" method="post">

        {{ csrf_field() }}

        <label>Username</label><br>
        <input type="text" name="username" placeholder="Masukkan Username"><br>
        <br>
        <label>Nama</label><br>
        <input type="text" name="nama" placeholder="Masukkan Nama"><br>
        <br>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Masukkan Password"><br>
        <br>
        <label>ID Level Pengguna</label><br>
        <input type="text" name="level_id" placeholder="Masukkan ID Level Pengguna"><br>
        <br>
        <br>
        <input type="submit" value="Simpan" class="btn btn-success">

    </form>
</body>
</html>
