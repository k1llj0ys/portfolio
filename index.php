<?php
include('constant/config.php'); 
    $sql = 'SELECT * FROM tbl_Hero';
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];

    $sql2 = 'SELECT * FROM tbl_aboutMe';
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);
    $school = $row2['school'];
    $birthday = $row2['birthday'];
    $location = $row2['location'];

    
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
            <a class="navbar-brand" href="#">PORTFOLIO</a>
        </div>
    </nav>
<!--END Navbar-->

<!--Main-->
<div>
    <div class="container-fluid d-flex justify-content-center align-items-center text-center sticky text-white bg-profile vh-100">
        <div class="card-content shadow bg-dark rounded">
            <h1 class="mx-2 "><?php echo $name; ?></h1>
        </div>
    </div>
    
    <div class="container-fluid sticky bg-aboutme  text-center text-white vh-100">
        <h2 class="">About Me</h2>
        
            <div class="container">
                <div class="card-content">
                    <p class="display-6">I am currently studying at <strong><?php echo $school; ?></strong>
                        a graduating student, born in <em><?php echo $birthday; ?></em>. I live in <?php echo $location; ?>.
                    </p>
                </div>
            </div>
        
    </div>
    <div class="container-fluid sticky bg-skills text-center text-white vh-100">
        <h2 class="mb-5">Skills</h2>
        <div class="container mt-5  table-responsive">
            <table class="table mt-5 mx-auto text-white">
                <thead>
                    <th>Skills</th>
                    <th>Proficiency</th>
                   
                </thead>
                <?php
                    $sqltb="SELECT * FROM tbl_skills";
                    $restb = mysqli_query($conn,$sqltb);
                    $counttb= mysqli_num_rows($restb);
                    if($counttb > 0){
                        while($rowtb = mysqli_fetch_assoc($restb)){
                            $skills = $rowtb['skills'];
                            $description = $rowtb['description'];
                            ?>
                                <tbody>
                                    <td><?php echo $skills; ?></td>
                                    <td><?php echo $description; ?></td>
                                </tbody>
                            <?php
                        }
                    }
                ?>
                
                
            </table>
        </div>
    </div>
</div>

<footer class="footer bg-dark">
<p>PORTFOLIO</p>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>