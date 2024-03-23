<?php 
include('constant/config.php'); 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM tbl_skills WHERE id='$id'";
    $res=mysqli_query($conn, $sql);

    if($res){
        $count = mysqli_num_rows($res);
        if($count==1){
            $row=mysqli_fetch_assoc($res);
            $skill=$row['skills'];
            $desc=$row['description'];
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
                        <label for="skill" class="form-label display-6">Skill:</label>
                        <input type="text" class="form-control" id="skill" placeholder="Enter skill" value="<?php echo $skill?>" name="skill">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label display-6">Level:</label>
                        <input type="text" class="form-control" id="desc" placeholder="Enter level" value="<?php echo $desc?>" name="desc">
                    </div>
                    <div class="mb-3 mt-3 d-grid">
                        <button type="submit" name="btnSubmitSkill" class="btn btn-success btn-block"  >submit</button>
                    </div>
                    </form>

        <?php
           if(isset($_POST['btnSubmitSkill'])){
            //echo"kay pogi";
            $upSkill = $_POST['skill'];
            $upDesc= $_POST['desc'];

            

            $sqlupdate="UPDATE tbl_skills SET
              skills='$upSkill',
              description='$upDesc'
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