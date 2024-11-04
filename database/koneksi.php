    <?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kamus pribadi";

    $conn = new mysqli($host,$username,$password,$database);
    if(!$conn){
        echo "database tidak terkoneksi";
    }else{
        echo "database terkoneksi";
    }
    
    
    ?>