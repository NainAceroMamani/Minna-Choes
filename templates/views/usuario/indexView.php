<?php require_once 'config.php';
      require_once INCLUDES.'admin/inc_header.php'; ?>
<?php if(empty($_GET['action'])) :  ?>

<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"> 
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Fecha de creación</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)): ?>
                <?php foreach($data as $user): ?>
                    <tr>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["last_name"] .' , '. $user["name"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td><?php echo $user["date"] ?></td>
                        <td>
                          <a href="usuario?action=2&id=<?php echo $user["id"] ?>"><button class="btn btn-primary"><i class="fas fa-wrench"></i></button></a>
                        </td>
                    </tr>
                <?php   endforeach; ?>
                <?php endif; ?>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<?php else : if($_GET['action'] == 1 || $_GET['action'] == 2) : ?>

<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
             
            <form method="POST">
              <div class="form-group">
                <label for="name">Nombre del Usuario</label>
                <?php echo ($_GET['action'] == 2)? '<input type="text" class="form-control" placeholder="Nombre" name="name" value="'.$data["name"].'">' 
                                                :  '<input type="text" class="form-control" placeholder="Nombre" name="name">';?>
                <small class="form-text text-muted">Ingrese un nombre para el Usuario</small>
              </div>

              <div class="form-group">
                <label for="last_name">Apellido del Usuario</label>
                <?php echo ($_GET['action'] == 2)? '<input type="text" class="form-control" placeholder="Apellido" name="last_name" value="'.$data["last_name"].'">' 
                                                :  '<input type="text" class="form-control" placeholder="Apellido" name="last_name">';?>
                <small class="form-text text-muted">Ingrese un apellido para el Usuario</small>
              </div>

              <div class="form-group">
                <label for="email">Email del Usuario</label>
                <?php echo ($_GET['action'] == 2)? '<input type="text" class="form-control" placeholder="Email" name="email" value="'.$data["email"].'">' 
                                                :  '<input type="text" class="form-control" placeholder="Email" name="email">';?>
                <small class="form-text text-muted">Ingrese un email para el Usuario</small>
              </div>

              <?php if($_GET['action'] == 1){ ?>
                <div class="form-group">
                  <label for="password">Contraseña del Usuario</label>
                  <input type="password" class="form-control" placeholder="Contraseña" name="password">
                  <small class="form-text text-muted">Ingrese una contraseña para el Usuario</small>
                </div>
              <?php  }?>
              
              <?php echo ($_GET['action'] == 2)? '<input type="hidden" name="method" value="update">' 
                                                :  '<input type="hidden" name="method" value="create">';?>
              <a href="usuario" class="btn btn-dark">Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php       endif;
      endif; ?>
<?php require_once INCLUDES.'admin/inc_footer.php'; ?>
