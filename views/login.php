

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Login</title>
    
    <link rel="stylesheet" href="../public/css/bracket.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="../public/dist/css/adminlte.min.css?v=3.2.0">
    
    
</head>


<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="login.php"><b>Login</b>CRUD</a>
            <?php
            include_once ("../ajax/login.php");
            
            ?>            
        </div>
        
        
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="" method="POST" >
                    
                    <div class="input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Password"require>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-4">
                            <input name="login" class="btn btn-info btn-with-icon" type="submit" value="iniciar sesion">
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>


    <script src="../public/plugins/jquery/jquery.min.js"></script>

    <script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../public/dist/js/adminlte.min.js?v=3.2.0"></script>
    

    

    

    

   


</body>

</html>