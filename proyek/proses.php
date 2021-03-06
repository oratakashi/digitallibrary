<?php
/**
 * Created by PhpStorm.
 * User: putuguna
 * Date: 7/18/2016
 * Time: 8:09 AM
 */
require_once ("koneksi.php");
class Login {
    function loginToYourDashboard(){
        $connection = new ConnectionDB();
        $conn = $connection->getConnection();

        try{
            if(isset($_POST['submit'])){
                if(empty($_POST['username']) || empty($_POST['password'])){
                    header('Location: login.php');
                }else{
                    $status = 0; // Mengset Status Login Menjadi Offline
                    $id = $_SESSION['id'];
                    $sql = "UPDATE tb_anggota SET statuslogin=$status where id_anggota = :id";
                    $result = $conn->prepare($sql);
                    $result->bindParam(':id', $id);
                    $result->execute();
                    session_destroy(); //Memaksa Logout Session Yang Ada
                    $username = $_POST['username'];
                    $password = sha1($_POST['password']);
                    $sql = "SELECT * FROM tb_anggota where username=:username ";
                    $result = $conn->prepare($sql);
                    $result->bindParam(':username', $username);
                    $result->execute();

                    $count = $result->rowCount();
                    if($count == 1){
                        foreach($result as $data){
                            if($username!=$data['username']){
                                header('Location: login.php?error=true');
                                //echo $data['username'];
                            }else if($password!=$data['password']){
                                header('Location: login.php?error=true');
                                //echo $data['password'];
                            }else{
                                session_start(); // turn the session on
                                $_SESSION['username'] = $data['username'];
                                $_SESSION['email'] = $data['email'];
                                $_SESSION['nim'] = $data['nim'];
                                $_SESSION['nama'] = $data['nama'];
                                $_SESSION['id'] = $data['id_anggota'];
                                $id = $data['id_anggota'];
                                $status = 1; // Mengset Status Login Menjadi Online
                                $sql = "UPDATE tb_anggota SET statuslogin=$status where id_anggota = :id";
                                $result = $conn->prepare($sql);
                                $result->bindParam(':id', $id);
                                $result->execute();
                                $sql = "SELECT level_user from tb_admin where id_anggota=$id";
                                $query = $conn->prepare($sql);
                                $query->execute();
                                foreach($query as $lvluser){}
                                $_SESSION['level_user']=$lvluser['level_user'];
                                $sql = "SELECT * from tb_foto where id_anggota=$id";
                                $result = $conn->prepare($sql);
                                $result->execute();
                                $count = $result->rowCount();
                                if($count == 0){
                                    $_SESSION['foto']="default.jpg";
                                }else{
                                    foreach($result as $hasil){}
                                    $_SESSION['foto']=$hasil['nama_file'];
                                }
                                header('Location: member.php');
                            }
                        }
                    }else{
                        $sql = "SELECT * FROM tb_anggota where email=:email ";
                        $result = $conn->prepare($sql);
                        $result->bindParam(':email', $username);
                        $result->execute();
    
                        $count = $result->rowCount();
                        if($count == 1){
                            foreach($result as $data){
                                if($username!=$data['email']){
                                    header('Location: login.php?error=true');
                                    //echo $data['username'];
                                }else if($password!=$data['password']){
                                    header('Location: login.php?error=true');
                                    //echo $data['password'];
                                }else{
                                    session_start(); // turn the session on
                                    $_SESSION['username'] = $data['username'];
                                    $_SESSION['email'] = $data['email'];
                                    $_SESSION['nim'] = $data['nim'];
                                    $_SESSION['nama'] = $data['nama'];
                                    $_SESSION['id'] = $data['id_anggota'];
                                    $id = $data['id_anggota'];
                                    $status = 0; // Mengset Status Login Menjadi Offline
                                    $sql = "UPDATE tb_anggota SET statuslogin=$status where id_anggota = :id";
                                    $result = $conn->prepare($sql);
                                    $result->bindParam(':id', $id);
                                    $result->execute();
                                    $sql = "SELECT level_user from tb_admin where id_anggota=$id";
                                    $query = $conn->prepare($sql);
                                    $query->execute();
                                    foreach($query as $lvluser){}
                                    $_SESSION['level_user']=$lvluser['level_user'];
                                    $sql = "SELECT * from tb_foto where id_anggota=$id";
                                    $result = $conn->prepare($sql);
                                    $result->execute();
                                    $count = $result->rowCount();
                                    if($count == 0){
                                        $_SESSION['foto']="default.jpg";
                                    }else{
                                        foreach($result as $hasil){}
                                        $_SESSION['foto']=$hasil['nama_file'];
                                    }
                                    header('Location: member.php');
                                }
                            }
                        }else{
                            $sql = "SELECT * FROM tb_anggota where nim=:nim ";
                            $result = $conn->prepare($sql);
                            $result->bindParam(':nim', $username);
                            $result->execute();
        
                            $count = $result->rowCount();
                            if($count == 1){
                                foreach($result as $data){
                                    if($username!=$data['nim']){
                                        header('Location: login.php?error=true');
                                        //echo $data['username'];
                                    }else if($password!=$data['password']){
                                        header('Location: login.php?error=true');
                                        //echo $data['password'];
                                    }else{
                                        session_start(); // turn the session on
                                        $_SESSION['username'] = $data['username'];
                                        $_SESSION['email'] = $data['email'];
                                        $_SESSION['nim'] = $data['nim'];
                                        $_SESSION['nama'] = $data['nama'];
                                        $_SESSION['id'] = $data['id_anggota'];
                                        $id = $data['id_anggota'];
                                        $status = 1; // Mengset Status Login Menjadi Offline
                                        $sql = "UPDATE tb_anggota SET statuslogin=$status where id_anggota = :id";
                                        $result = $conn->prepare($sql);
                                        $result->bindParam(':id', $id);
                                        $result->execute();
                                        $sql = "SELECT level_user from tb_admin where id_anggota=$id";
                                        $query = $conn->prepare($sql);
                                        $query->execute();
                                        foreach($query as $lvluser){}
                                        $_SESSION['level_user']=$lvluser['level_user'];
                                        $sql = "SELECT * from tb_foto where id_anggota=$id";
                                        $result = $conn->prepare($sql);
                                        $result->execute();
                                        $count = $result->rowCount();
                                        if($count == 0){
                                            $_SESSION['foto']="default.jpg";
                                        }else{
                                            foreach($result as $hasil){}
                                            $_SESSION['foto']=$hasil['nama_file'];
                                        }
                                        header('Location: member.php');
                                    }
                                }
                            }else{
                                header('Location: login.php?error=true');
                            }
                        }
                    }
                }
            }
        }catch (PDOException $e){
            echo "ERROR : " . $e->getMessage();
        }
    }
}

$login = new Login();
$login->loginToYourDashboard();