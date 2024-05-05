<?php include("frmpath.php"); 

include("frmpath.php"); 
include("config.php"); 

$Titulo = "Principal"; 
$Modulo = ""
?>  

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar - Brand -->
	    <?php include("menubar.php"); ?>
	    <!-- End of Sidebar -->        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" >

                <!-- Topbar -->
                <?php include("frmTopBar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>                        
                    </div>

                    
                        <?php
                            $result = mysqli_query($con, "SELECT * FROM horario_asistencia");                                    
                            while ($row1 = mysqli_fetch_assoc($result)){ 
                                echo "<tr>";     
                                $id_horario = $row1["id_horario"];
                                $Inicio = $row1["Inicio"];
                                $Fin = $row1["Fin"];
                                $Curso = $row1["Curso"];
                                $Ramo = $row1["Ramo"];
                                $Profesor = $row1["Profesor"];
                                $Día = $row1["Día"];
                                $Sala = $row1["Sala"];                                        
                                
                                //Comentia
                                echo "<div id='div_$id_horario'>";  
                                echo "<div class='form-group row'  >";
                                
                                echo "<div class='col-sm-2 mx-sm-0 border text-center align-middle'>
                                        <button type='button' class='btn_confirmar_asistencia btn btn-outline-success' data='$id_horario'>
                                            <span class='fas fa-check' aria-hidden='true'> Presente.
                                        </button>                                        
                                    </div>";
                                echo "<div class='col-sm-2 mx-sm-0 border'>
                                        <label>Sala</label>
                                        <label>$Sala</label>
                                        </div>";
                                
                                echo "<div class='col-sm-2 mx-sm-0 border'>
                                    <label>Ramo</label>
                                    <label>$Ramo</label>
                                    </div>";
    
                                echo "<div class='col-sm-2 mx-sm-0 border'>
                                        <label>Curso</label>
                                        <label>$Curso</label>
                                    </div>";
    
                                echo "<div class='col-sm-1 mx-sm-0 border'>
                                        <label>Inicio</label>
                                        <label>$Inicio</label>
                                    </div>";

                                echo "<div class='col-sm-1 mx-sm-0 border'>
                                        <label>Fin</label>
                                        <label>$Fin</label>
                                    </div>";

                                echo "<div class='col-sm-2 mx-sm-0 border'>
                                        <label>Profesor</label>
                                        <label>$Profesor</label>
                                    </div>";

                                echo "</div>";    
                                echo "<hr>";
                                echo "</div>";                              
                            }
                        ?> 


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("frmFooter.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include("frmLogout.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- bootbox code -->
    <script src="<?=$base_url?>vendor/bootbox/bootbox.min.js"></script>
    
    <script src="<?=$base_url?>js/bootstrapValidator.min.js" type="text/javascript" ></script>
   
    <!-- Sidebar - Brand -->
    <?php include("formScript.php"); ?>      
	<!-- End of Sidebar -->

    <script>
      $(document).ready(function(){
        $('.btn_confirmar_asistencia').click(function(){
            event.preventDefault();
            var nId_Horario = $(this).attr('data');
            var parent = $(this).parent("div").parent("div").parent("div")
            
            var fd = new FormData();
            fd.append('nId_Horario',nId_Horario);

            $.ajax({
                url: 'ConfirmarAsistencia.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){                   
                    
                    if (response == "Registro Aceptado"){
                                                
                        parent.fadeOut('slow');                        
                        bootbox.alert(response);
                    }
                    else{                        
                        bootbox.alert("Registro utilizado en otra aplicación.");
                    } 
                }
            });
            
        });

      });

    </script>

</body>

</html>