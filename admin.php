<?php
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">JK V. M</a>
        </div>
    </nav>
<!--END Navbar-->
<!--hero-->
<div class="container-fluid text-center vh-100">
    <h1>Admin</h1>
    <!--Hero-->
            <h3 class="shadow m-2">Hero</h3>
    <div class="container table-responsive">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <?php
                    $sqlhero="SELECT * FROM tbl_Hero";
                    $reshero = mysqli_query($conn,$sqlhero);
                    $counthero= mysqli_num_rows($reshero);
                    if($counthero > 0){
                        while($rowhero = mysqli_fetch_assoc($reshero)){
                            $heroId = $rowhero['id'];
                            $name = $rowhero['name'];
                            
                            ?>
                                <tbody>
                                    <td><?php echo $name; ?></td>
                                    <td>
                                    <a href="<?php echo SITEURL;?>edit-name.php?id=<?php echo $heroId?>" class="btn btn-secondary"> Edit</a>
                                    </td>
                                </tbody>
                            <?php
                        }
                    }
                ?>
        </table>
    </div>
    <!--Hero-->
    <!--Skills-->
        <h3 class="shadow m-2">Skills</h3>
    <div class="container  table-responsive d-grid">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#skill">Add skills</button>
        <table class="table">
            <thead>
                <th>Skill</th>
                <th>Description</th>
                <th>Action</th>
            </thead>
            <?php
                    $sqls="SELECT * FROM tbl_skills";
                    $ress = mysqli_query($conn,$sqls);
                    $counts= mysqli_num_rows($ress);
                    if($counts > 0){
                        while($rows = mysqli_fetch_assoc($ress)){
                            $skillid = $rows['id'];
                            $skill = $rows['skills'];
                            $desc = $rows['description'];
                       
                            ?>
                                <tbody>
                                    <td><?php echo $skill; ?></td>
                                    <td><?php echo $desc; ?></td>
                                    <td>
                                    <a href="<?php echo SITEURL;?>edit-skill.php?id=<?php echo $skillid; ?>" class="btn btn-secondary"> Edit</a>
                                    <a href="<?php echo SITEURL;?>delete-skill.php?id=<?php echo $skillid; ?>" class="btn btn-danger"> Delete</a>
                                    </td>
                                </tbody>
                            <?php
                        }
                    }
                ?>

        </table>
    </div>
    <!--skill-->
    <!--aboutme-->
 
 <h3 class="shadow m-2">About Me</h3>
    <div class="container  table-responsive d-grid">
        
        <table class="table">
            <thead>
                <th>school</th>
                <th>birthday</th>
                <th>location</th>
                <th>Action</th>
            </thead>
            <?php
                    $sqlaboutme="SELECT * FROM tbl_aboutme";
                    $resaboutme = mysqli_query($conn,$sqlaboutme);
                    $countaboutme= mysqli_num_rows($resaboutme);
                    if($countaboutme > 0){
                        while($rowaboutme = mysqli_fetch_assoc($resaboutme)){
                            $aboutmeId = $rowaboutme['id'];
                            $school = $rowaboutme['school'];
                            $birthday = $rowaboutme['birthday'];
                            $location = $rowaboutme['location'];

                            
                            ?>
                                <tbody>
                                    <td><?php echo $school; ?></td>
                                    <td><?php echo $birthday; ?></td>
                                    <td><?php echo $location; ?></td>
                                    <td>
                                    <a href="<?php echo SITEURL;?>edit-aboutMe.php?id=<?php echo $aboutmeId?>" class="btn btn-secondary"> Edit</a>
                                    </td>
                                </tbody>
                            <?php
                        }
                    }
                ?>

        </table>
    </div>
    <!--aboutme-->



</div>

<footer class="footer bg-dark">
<p>Kairan</p>
</footer>

<!-- Modal add skill -->
<div class="modal fade" id="skill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
                    <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <label for="skill" class="form-label display-6">Skill:</label>
                        <input type="text" class="form-control" id="skill" placeholder="Enter skill" name="skill">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label display-6">Level:</label>
                        <input type="text" class="form-control" id="desc" placeholder="Enter level" name="desc">
                    </div>
                    <div class="mb-3 mt-3 d-grid">
                        <button type="submit" name="btnSubmitSkill" class="btn btn-success btn-block"  >submit</button>
                    </div>
                    </form>
                    <?php
                        if(isset($_POST['btnSubmitSkill'])){
                            //echo"pruits";
                            
                           $addSkill = $_POST['skill'];
                           $addDesc = $_POST['desc'];

                           $sqlAddSkill = "INSERT INTO tbl_skills SET
                                skills='$addSkill',
                                description='$addDesc'
                           ";
                           $resAddSkill = mysqli_query($conn, $sqlAddSkill);
                           if($resAddSkill==TRUE){
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>