<div class="main">
  <div class="main-inner">
    <div class="container">
        
        <div class="row">
            <div class="span12">
                
                <?
                    $cari = $_GET['cari'];
                    $pilihan = $_GET['pilihan']; 
                    echo "<h3>Hasil Pencarian dari $pilihan : $cari</h3>"?>
                <a href="dashboard.php?page=user"><button class="btn btn-success" style="margin-bottom:20px;"><i class="icon-caret-left" style="margin-right:5px;"></i>Kembali</button></a>
            </div>
        </div>
        
        <div class="row">
            <div class="span12">
                <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Daftar Anggota</h3> <a href="dashboard.php?page=user-tambah"><button class="btn btn-success"><i class="icon-plus" style="margin-right:2px;"></i>Tambah</button></a>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="widget big-stats-container">
                    <?php
                        // Mendapatkan Data Tabel
                        if(isset($_GET['submit'])){
                            $cari = $_GET['cari'];
                            $pilihan = $_GET['pilihan'];
                            $sql 	= "SELECT * FROM tb_anggota where $pilihan like '%".$cari."%'";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $count = $result->rowCount();
                        }
                    ?>   
                    <table class="table table-striped table-bordered datatable-extended">
                                    <thead>
                                        <tr>
                                            <th>Kode Anggota</th>
                                            <th>NIM</th>
                                            <th>Username</th>
                                            <th>Nama Anggota</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php 
                                            foreach($result as $row){ ?>
                                            <tr>
                                                <td><?php echo $row['id_anggota']?></td>
                                                <td><?php echo $row['nim']?></td>
                                                <td><?php echo $row['username']?></td>
                                                <td><?php echo $row['nama']?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><a href="../proyek/profile.php?id=<?php echo $row['nim'] ?>" style="margin-right:5px"><button class="btn btn-info">Profil</button></a><a href="action/hapus-anggota.php?id_anggota=<?php echo $row['id_anggota'] ?>"><button class="btn btn-danger">Hapus</button></a></td>
                                            </tr>
                                        <?php } ?>                                   
                                    </tbody>
                    </table>
                <!-- /widget-content --> 
                </div>
            </div>
</div>
        </div>
    </div>
</div>