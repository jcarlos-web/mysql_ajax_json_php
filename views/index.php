<?php
include '../controllers/usuario_controller.php';
include 'head/head.php';
?>
<!--Cargar método readUsuario de Ajax-->
<body onload="readUsuario('');">

<section class="container">
<br>
    <header>
      <h1>Listado de Usuario</h1>
      <br>
    </header>
    <nav>
      <!-- Aquí pondre el ménu-->
    </nav>
        <div class="container">
          <?php if(!empty($message)) { ?>
            <br>
            <div class="alert alert-info">
                  <h4><center><?php echo $message; ?></center></h4>
            </div>
            <br>
          <?php } ?>
          <div class="col-lg-12">
            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                                                      <!--Utilizar el evento onkeyup para activar el método readUsuario de Ajax-->
                <input type="text" class="form-control" placeholder="Buscar..." name="search" onkeyup="readUsuario(this.value);">
              </div>
            </form>
            <br>
            <div class="table-responsive">

                <div class="readAjax"></div>

            </div>

          </div>
        </div>
        <section class="row">
            <div class="col-lg-4">
              <h3>Nuevo usuario</h3>
              <form class="form-horizontal" action="index.php" method="post" id="formCreateUpdate">
                <input type="hidden" name="create_update" value="true">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" placeholder="Ingrese nombre" type="text" name="nombre" id="nombre" value="">
                    <strong  id="validar_usuario"></strong>
                  </div>
                  <div class="form-group">
                    <label for="ap_pat">Apellido paterno:</label>
                    <input class="form-control" placeholder="Ingrese apellido paterno" type="text" name="ap_pat" id="ap_pat" value="">
                    <strong  id="validar_ap_pat"></strong>
                  </div>
                  <div class="form-group">
                    <label for="ap_mat">Apellido materno:</label>
                    <input class="form-control" placeholder="Ingrese apellido materno" type="text" name="ap_mat" id="ap_mat" value="">
                    <strong  id="validar_ap_mat"></strong>
                  </div>
                  <div class="form-group">
                    <label for="usu">Usuario:</label>
                    <input class="form-control" placeholder="Ingrese usuario" type="text" name="usu" id="usu" value="">
                    <strong  id="validar_usu"></strong>
                  </div>
                  <div class="form-group">
                    <label for="pw">Password:</label>
                    <input class="form-control" placeholder="Ingrese password" type="text" name="pw" id="pw" value="">
                    <strong  id="validar_pw"></strong>
                  </div>

                  <input type="submit" class="btn btn-primary btn-block" value="Crear" id="btnVerificar">
                  <strong  id="respuesta"></strong>
              </form>
            </div>

            <div class="col-lg-4"></div>

            <div class="col-lg-4">
              <?php if(!empty($enlace)){ ?>
                <h3>Editar usuario</h3>
                <form class="form-horizontal" action="index.php" method="post">
                  <input type="hidden" name="create_update" value="true">
                    <div class="form-group">
                      <input class="form-control" placeholder="Ingrese nombre" type="hidden" name="id" id="id_update" value="<?php echo $enlace['id']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input class="form-control" placeholder="Ingrese nombre" type="text" name="nombre" id="nombre_update" value="<?php echo $enlace['nombre']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="ap_pat">Apellido paterno:</label>
                      <input class="form-control" placeholder="Ingrese apellido paterno" type="text" name="ap_pat" id="ap_pat_update" value="<?php echo $enlace['ap_pat']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="ap_mat">Apellido materno:</label>
                      <input class="form-control" placeholder="Ingrese apellido materno" type="text" name="ap_mat" id="ap_mat_update" value="<?php echo $enlace['ap_mat']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="usu">Usuario:</label>
                      <input class="form-control" placeholder="Ingrese usuario" type="text" name="usu" id="usu_update" value="<?php echo $enlace['usu']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="pw">Password:</label>
                      <input class="form-control" placeholder="Ingrese password" type="text" name="pw" id="pw_update" value="<?php echo $enlace['pw']; ?>">
                    </div>
                    <input type="submit" class="btn btn-warning btn-block" id="verificarUsuario_update" value="Editar">
                </form>
              <?php } ?>
            </div>
        </section>

</section>

<?php include 'footer/footer.php'; ?>
