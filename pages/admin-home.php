<?php
    session_start();
    if(isset($_SESSION['admin'])){
        $admin = unserialize($_SESSION['admin']);
        echo("with success");
    }else{
        header ("location:..\pages\signup.php?error=wrongWay");
        exit();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../second_css/admin-home.css">
    <title>Document</title>
</head>
<body>
    <H1>admin dashbord</H1>
    <form action="../auth/logout.inc.php" method="POST" >
        <input type="submit" value="log out">
    </form>

    <script src="../master_js/admin-home.js"></script>    
</body>
</html>