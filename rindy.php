<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_dosen");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>
<h1>Tampilan Menginput Data Dosen</h1>
<h3>Rindy</h3>
<h4>E1E118031</h4><br>
<form action="" method="post">
<table border="1">
    <tr>
        <td>Nama  </td>
        <td><input type="text" name="Nama"></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td><input type="text" name="NIP"></td>
    </tr>
    <tr>
        <td>Jurusan  </td>
        <td><input type="text" name="Jurusan"></td>
    </tr>
    <tr>
        <td>Alamat  </td>
        <td><input type="text" name="Alamat"></td>
    </tr>
    <tr>
        <td>Nomor Telepon  </td>
        <td><input type="number" name="No_hp"></td>
    </tr>
    <tr>
        <td>Pengajar</td>
        <td><input type="text" name="ajar"></td>
    </tr>
</table>
    <input type="submit" name="registrasi" value="Registrasi">
</form>
<h1>Tampilan Hasil Inputan Data Dosen</h1>
<table border="1">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Jurusan</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Pengajar</th>
        <th>Aksi</th>
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `dosen`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            <td><?=$data[4] ?></td>
            <td><?=$data[5] ?></td>
            <td><?=$data[6] ?></td>
            <td>
                <a href="rindy.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['registrasi'])){
        $sqlInput = "INSERT INTO `dosen` (`Nama`,`NIP`,`Jurusan`,`Alamat`,`No_hp`,`ajar`)
                VALUES ('$_POST[Nama]', '$_POST[NIP]','$_POST[Jurusan]','$_POST[Alamat]','$_POST[No_hp]','$_POST[ajar]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'rindy.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `dosen` WHERE
        `dosen`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'rindy.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>