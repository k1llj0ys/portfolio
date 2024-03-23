<?php 
include('constant/config.php'); 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM tbl_aboutme WHERE id='$id'";
    $res=mysqli_query($conn, $sql);

    if($res){
        $count = mysqli_num_rows($res);
        if($count==1){
            $row=mysqli_fetch_assoc($res);
            $school=$row['school'];
            $birthday=$row['birthday'];
            $location=$row['location'];
        } else {
            ?>
            <script>
                alert("Not found");
                window.location.href = "<?php echo SITEURL?>admin.php";
            </script>
            <?php
        }
    } else {
        echo "Error: " . mysqli_error($conn); // Display MySQL error for debugging
    }
} else {
    header('location:'.SITEURL.'admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    <div class="container">
    <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="school" class="form-label display-6">School:</label>
                        <input type="text" class="form-control" id="school" placeholder="Enter school" value="<?php echo $school?>" name="school">
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label display-6">Birthday:</label>
                        <input type="text" class="form-control" id="birthday" placeholder="Enter birthday" value="<?php echo $birthday?>" name="birthday">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label display-6">Location:</label>
                        <input type="text" class="form-control" id="location" placeholder="Enter location" value="<?php echo $location?>" name="location">
                    </div>
                    
                    <div class="mb-3 mt-3 d-grid">
                        <button type="submit" name="btnSubmitAboutMe" class="btn btn-success btn-block"  >submit</button>
                    </div>
                    </form>

        <?php
           if(isset($_POST['btnSubmitAboutMe'])){
            //echo"tomato";
            $upSchool = $_POST['school'];
            $upBirthday= $_POST['birthday'];
            $upLocation= $_POST['location'];
          

            $sqlupdate="UPDATE tbl_aboutme SET
              school='$upSchool',
              birthday='$upBirthday',
              location='$upLocation'
              where id='$id'
            ";
            $resupdate = mysqli_query($conn, $sqlupdate);
              if($resupdate==TRUE){
                ?>
                  <script>
                    alert("Success");
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
          }
          ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>