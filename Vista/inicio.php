<?php include "header.php";
        if(isset($_SESSION['usuarios']) && 
        $_SESSION['usuarios']['rol']==1||
        $_SESSION['usuarios']['rol']==2){
        
        ?>



<?php
    include "footer.php";
?>



<?php
}else{
header("location:../index.html");
}
?>