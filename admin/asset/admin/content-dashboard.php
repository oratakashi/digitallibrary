<div id="big_stats" class="cf">                
    <div class="stat"> <i class="icon-book"></i> <span class="value">
    <?php
        $sql 	= 'SELECT COUNT(*) FROM tb_buku';
        $result = $conn->prepare($sql);
        $result->execute();
        foreach($result as $data){}
    ?>    
    <p>Buku Terdaftar</p></span> </div>
    <div class="stat"> <i class="icon-user"></i> <span class="value">851<p>Anggota Terdaftar</p></span> </div>
    <div class="stat"> <i class="icon-star"></i> <span class="value">851<p>Buku Favorit</p></span> </div>
                        <!-- .stat -->
</div>