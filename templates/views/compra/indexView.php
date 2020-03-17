<?php require_once 'config.php';
      require_once INCLUDES.'admin/inc_header.php'; ?>
<?php if(empty($_GET['action'])) { ?>
  <!-- Main content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Compra</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Estado</th>
                  <th>Date</th>
                  <th>Nombre</th>
                  <th>Ruc</th>
                  <th>Email</th>
                  <th>Celular</th>
                  <th>Total</th>
                  <th>Opciones</th>
                </tr>

                </thead>
                <tbody>
                <?php if(!empty($data)) { ?>
                <?php foreach($data as $compra) { ?>
                    <tr>
                        <th>
                        <?php if($compra["state"] == 1) : ?>
                        
                          <span class="badge badge-primary">Espera</span>
                        <?php else : ?>
                          <span class="badge badge-secondary">Transferido</span>

                        <?php endif ?>
                        </th>
                        <td><?php echo $compra["date"] ?></td>
                        <td><?php echo $compra["last_name"] . ' , ' . $compra["name"] ?></td>
                        <td><?php echo $compra["ruc"] ?></td>
                        <td><?php echo $compra["email"] ?></td>
                        <td><?php echo $compra["phone"] ?></td>
                        <td><?php echo $compra["total"] ?></td>
                        <td>
                            <a href="compra?action=1&id=<?php echo $compra["id"] ?>">
                              <button class="btn btn-warning" style="color:#fff"><i class="fas fa-check"></i></button>
                            </a>
                            <a href="compra?action=2&id=<?php echo $compra["id"] ?>">
                              <button class="btn btn-success" style="color:#fff"><i class="fas fa-eye"></i></button>
                            </a>
                            <a href="compra?action=3&ruc=<?php echo $compra["ruc"] ?>&img=<?php echo $compra["link_photo"] ?>">
                              <button class="btn btn-dark" style="color:#fff"><i class="fas fa-camera"></i></button>
                            </a>
                            
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
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

<?php } 
      else {
        if($_GET['action'] == 2) { ?>

  <!-- Main content -->
  <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Compra</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Código del Producto</th>
                    <th>Color</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                  </tr>

                  </thead>
                  <tbody>
                  <?php if(!empty($data)) { ?>
                  <?php foreach($data as $compra) { ?>
                      <tr>
                          <td><?php echo $compra['code'] ?></td>
                          <td><?php echo $compra['color'] ?></td>
                          <td><?php echo $compra['cantidad'] ?></td>
                          <td><?php echo $compra['price']*$compra['cantidad'].' Soles' ?></td>
                      </tr>
                  <?php } ?>
                  <?php } ?>
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
                    
<?php   }
        if($_GET['action'] == 3 && isset($_GET['ruc'])  && isset($_GET['img'])) { ?>
  <!-- Main content -->
  <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ruc: <?php echo $_GET['ruc'] ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card">
                <img class="card-img-top" src="<?php echo IMAGES.'Clientes/' . $_GET["ruc"] . '/' . $_GET['img'] ?>" alt="Card image cap">
              </div>
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
     <?php  } } ?>
<?php require_once INCLUDES.'admin/inc_footer.php'; ?>
