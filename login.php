<?php 

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php"); 
        exit;
    }

    require_once "config.php";


    $username = $password = "";
    $username_err = $password_err = "";    

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty(trim($_POST["exampleInputEmail"]))){
            $username_err = "Por favor ingrese nombre de usuario.";
        } else{
            $username = trim($_POST["exampleInputEmail"]);
        }

        if(empty(trim($_POST["exampleInputPassword"]))){
            $password_err = "Por favor, introduzca su contraseña.";
        } else{
            $password = trim($_POST["exampleInputPassword"]);
        }

        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT id_usuario ,Nombre,login_user,login_pass,id_tipo_usuario  FROM usuario WHERE login_user = ?";

            if($stmt = mysqli_prepare($con, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                $param_username = $username;

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        mysqli_stmt_bind_result($stmt, $id_usuario, $Nombre, $login_user, $login_pass, $id_tipo_usuario);
                        
                        if(mysqli_stmt_fetch($stmt)){                       

                            if(password_verify($password, $login_pass)){

                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id_usuario;
                                $_SESSION["username"] = $Nombre; 

                                header("location: index.php");
                            }
                            else{
                                $username_err = "¡Uy! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
                            }
                        }
                    }
                    else{
                        $username_err = "¡Uy! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
                    }


                }
                else{
                    echo "¡Uy! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
                }
            }

            mysqli_stmt_close($stmt);

        }
        mysqli_close($con);

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Philippe Cousteau</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="exampleInputEmail" 
                                                placeholder="Nombre de usuario...">
                                                <span class="help-block"><?php echo $username_err; ?></span>    
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <!--
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        -->
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                        <hr>                                       
                                    </form>                           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>