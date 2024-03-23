<?php 
include('constant/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            *{
                box-sizing: border-box;
            }
            body{
                background-image: url(img/loginbg.jpg);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100vh;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .wrapper{
                border: 2px solid gray;
                border-radius: 15px;
                width: auto;
                height: auto;
                background: transparent;
                padding: 15px 30px;
                color: white;
                backdrop-filter: blur(10px);
            }
        </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center text-center">
        <div class="wrapper">
            <h1>Login</h1>
            <form action="" method="post">
                <div class="mb-3 mt-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="user">
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
                  <div class="mb-3 mt-3 d-grid">
                    <button type="submit" name="btnLogin" class="btn btn-secondary">Login</button>
                  </div>
            </form>
            <?php 
                if(isset($_POST['btnLogin'])){
                    //echo"avocado";
                    $username = $_POST['user'];
                    $password = $_POST['pwd'];

                    $sql = "SELECT * FROM tbl_admin WHERE name='$username' AND pass='$password'";
                    $res=mysqli_query($conn, $sql);
                    $count=mysqli_num_rows($res);
                    if($count == 1){
                        $_SESSION['user'] = $username;
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>