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
              <h3 class="card-title">Lista de Monedas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)) : ?>
                <?php foreach($data as $moneda) : ?>
                    <tr>
                        <td><?php echo $moneda["id"] ?></td>
                        <td><?php echo $moneda["name"] ?></td>
                        <td><?php echo $moneda["price"] ?></td>
                        <td>
                          <a href="moneda?action=2&id=<?php echo $moneda["id"] ?>"><button class="btn btn-primary"><i class="fas fa-wrench"></i></button></a>
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

<?php else : if($_GET['action'] == 2) : ?>

<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Monedas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
             
            <form method="POST">
              <div class="form-group">
                <label for="price">Precio de la moneda</label>
                <input type="text" class="form-control" placeholder="Precio" name="price" value="<?php echo $data["price"] ?>">
                <small class="form-text text-muted">Ingrese un precio para la moneda</small>
              </div>
              <input type="hidden" name="method" value="update">
              <a href="categoria" class="btn btn-dark">Cancelar</a>
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
