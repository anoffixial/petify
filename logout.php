<?php

session_start();

if(isset($_SESSION['name'])){
    session_unset();
    session_destroy();
    echo "Logout Successful";
    echo "<script>location.href='petify.php'</script>";
    
}
else{
    echo "Logout Failed";
}

?>

<html>
    <a href="petify.php">Return Homepage</a>
</html>