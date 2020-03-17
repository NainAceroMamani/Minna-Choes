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
              <h3 class="card-title">Clientes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"> 
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre Completo</th>
                  <th>ruc</th>
                  <th>Tipo de Documento</th>
                  <th>N# de Documento</th>
                  <th>Celular</th>
                  <th>N# de compras</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)): ?>
                <?php foreach($data as $user): ?>
                    <tr>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["last_name"]. ' , ' .$user["name"] ?></td>
                        <td><?php echo $user["ruc"] ?></td>
                        <td><?php echo $user["tipo_doc"].' : '.$user["num_doc"] ?></td>
                        <td><?php echo $user["email"] ?></td>
                        <td><?php echo $user["phone"] ?></td>
                        <td><?php echo $user["count"] ?></td>
                        <td>
                          <a href="cliente?action=2&ruc=<?php echo $user["ruc"] ?>"><button class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
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
              <h3 class="card-title">Cliente con ruc : <?php echo $_GET['ruc']; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre Completo</th>
                  <th>Ruc</th>
                  <th>Documento</th>
                  <th>Celular</th>
                  <th>Correo</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)): ?>
                <?php foreach($data as $user): ?>
                    <tr>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["last_name"] .' , '. $user['name']  ?></td>
                        <td><?php echo $user["ruc"] ?></td>
                        <td><?php echo $user["tipo_doc"] .' : '. $user['num_doc'] ?></td>
                        <td><?php echo $user["phone"] ?></td>
                        <td><?php echo $user["email"] ?></td>
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
<?php       endif;
      endif; ?>
<?php require_once INCLUDES.'admin/inc_footer.php'; ?>
