    <?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kamus pribadi";

    $conn = new mysqli($host,$username,$password,$database);
    if(!$conn){
        die ("Koneksi gagal :" . mysqli_connect_error());
    }else{
        echo "database terkoneksi";
    }
    
    
    ?>