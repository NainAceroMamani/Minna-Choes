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
              <h3 class="card-title">Lista de Marcas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)) : ?>
                <?php foreach($data as $marca) : ?>
                    <tr>
                        <td><?php echo $marca["id"] ?></td>
                        <td><?php echo $marca["name"] ?></td>
                        <td><?php echo $marca["description"] ?></td>
                        <td>
                          <a href="marca?action=2&id=<?php echo $marca["id"] ?>"><button class="btn btn-primary"><i class="fas fa-wrench"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
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
              <h3 class="card-title">Marcas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
             
            <form method="POST">
              <div class="form-group">
                <label for="name">Nombre del Marca</label>
                <?php echo ($_GET['action'] == 2)? '<input type="text" class="form-control" placeholder="Nombre" name="name" value="'.$data["name"].'">' 
                                                :  '<input type="text" class="form-control" placeholder="Nombre" name="name">';?>
                <small id="emailHelp" class="form-text text-muted">Ingrese un nombre para la marca</small>
              </div>
              <div class="form-group">
                <label for="description">Descripción para el marca</label>
                <?php echo ($_GET['action'] == 2)? '<textarea class="form-control" name="description" rows="3">'.$data["description"].'</textarea>' 
                                                :  '<textarea class="form-control" name="description" rows="3"></textarea>';?>
                <small id="emailHelp" class="form-text text-muted">Ingrese una descripción *256</small>
              </div>
              <?php echo ($_GET['action'] == 2)? '<input type="hidden" name="method" value="update">' 
                                                :  '<input type="hidden" name="method" value="create">';?>
              <a href="marca" class="btn btn-dark">Cancelar</a>
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
