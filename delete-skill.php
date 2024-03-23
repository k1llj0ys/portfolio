<?php 
include('constant/config.php'); 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM tbl_skills WHERE id='$id'";
    $res=mysqli_query($conn, $sql);
    if($res){
        ?>
    <script>
        alert("Deleted.");
        window.location.href = "<?php echo SITEURL?>admin.php";
    </script>
    <?php
    }else{
        ?>
        <script>
            alert("Fail");
            window.location.href = "<?php echo SITEURL?>admin.php";
        </script>
        <?php
    }
    
} else {
    ?>
    <script>
        alert("Not found");
        window.location.href = "<?php echo SITEURL?>admin.php";
    </script>
    <?php
}
?>