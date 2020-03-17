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
              <h3 class="card-title">Productos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Código Producto</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)) : ?>
                <?php foreach($data as $producto) : ?>
                    <tr>
                          <td><?php echo $producto["id"] ?></td>
                          <td><?php echo $producto["code"] ?></td>
                          <td><?php echo $producto["price"] ?></td>
                          <td><?php echo $producto["name_marca"] ?></td>
                        <td>
                        <a href="producto?action=1&id=<?php echo $producto["id"] ?>"><button class="btn btn-success"><i class="fas fa-eye"></i></button></a>
                        <a href="producto?action=5&id=<?php echo $producto["id"] ?>"><button class="btn btn-primary"><i class="fas fa-wrench"></i></button></a>
                        <a href="producto?action=4&id=<?php echo $producto["id"] ?>&code=<?php echo $producto["code"] ?>"><button class="btn btn-dark"><i class="fas fa-shopping-cart"></i></button></a>
                        <a href="producto?action=3&id=<?php echo $producto["id"] ?>&code=<?php echo $producto["code"] ?>" title="Subcategoria"><button class="btn btn-secondary"><i class="fas fa-align-justify"></i></button></a>
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

<?php elseif($_GET['action'] == 1) : ?>
  <!-- Main content -->
  <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detalle Productos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Colores</th>
                    <th>Stock</th>
                    <th>Foto</th>
                    <th>Banner</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(!empty($data)) : ?>
                  <?php foreach($data as $producto) : ?>
                      <tr>
                          <td><?php echo $producto["name"] ?></td>
                          <td><?php echo $producto["stock"].' docenas' ?></td>
                          <td class="text-center">
                            <img src="<?php echo IMAGES.'Productos/' . $producto["code"] . '/' . $producto["link_photo"] ?>" 
                              alt="" width="100px">
                          </td>
                          <td><?php
                             if($producto["banner"] == 1) { ?>
                                <a href="producto?action=8&id=<?php echo $producto["id"] ?>"><button class="btn btn-success"><i class="far fa-check-circle"></i></button></a>
                          <?php  } else { ?>
                                <a href="producto?action=9&id=<?php echo $producto["id"] ?>"><button class="btn btn-danger"><i class="far fa-times-circle"></i></button></a>

                          <?php  } 
                          ?>
                          </td>
                          <td>
                            <a href="producto?action=6&id=<?php echo $producto["id"] ?>"><button class="btn btn-primary"><i class="fas fa-wrench"></i></button></a>
                            <a href="producto?action=7&id=<?php echo $producto["id"] ?>"><button class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a>
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
<?php       
        elseif($_GET['action'] == 2) : ?>
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registrar Productos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
             
            <form method="POST">
              <div class="form-group">
                <label for="code">Código del Producto</label>
                <input type="text" class="form-control" name="code" placeholder="Codigo">
                <small  class="form-text text-muted">Procure que el código no se repita en otros Productos.</small>
              </div>

              <div class="form-group">
                <label for="price">Precio del Producto</label>
                <input type="text" class="form-control" name="price" placeholder="Precio">
                <small  class="form-text text-muted">Precio del Producto ejemplo "5.20".</small>
              </div>

              <div class="form-group">
                <label for="description">Descripción del Producto</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
                <small  class="form-text text-muted">Max descripción 1200 caracteres.</small>
              </div>

              <div class="form-group">
                <label>Marcas Disponibles</label>
                <select class="form-control" name="id_marca">
                  <?php foreach($data as $marca): ?>  
                    <option value="<?php echo $marca["id"] ?>"><?php echo $marca["name"] ?></option>
                  <?php endforeach; ?>
                </select>
                <small id="emailHelp" class="form-text text-muted">Lista de Marcas Disponibles</small>
              </div>
              <input type="hidden" name="method" value="create_producto">
              <a href="producto" class="btn btn-dark">Cancelar</a>
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
<?php 
        elseif($_GET['action'] == 3 && !empty($_GET["id"])) :  ?>
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registrar SubCategoria Producto : <?php echo $_GET["code"] ?> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
             
            <form method="POST">
              <div class="form-group">
                <label>Escoja una Subcategoria</label>
                <select class="form-control" name="id_subcategoria">
                <?php foreach($data as $subcat) : ?>
                  <option value="<?php echo $subcat["id"] ?>"><?php echo $subcat["name_sub_cat"] ?></option>
                <?php endforeach; ?>
                </select>
              </div>
              <input type="hidden" name="method" value="create_subcategora">
              <a href="producto" class="btn btn-dark">Cancelar</a>
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
<?php 
    elseif($_GET['action'] == 4 && !empty($_GET["id"])) :  ?>

<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Registrar Detalle Producto : </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
            <?php if(!empty($message)) echo '<div class="alert alert-primary" role="alert">'.$notification.'</div>';?>
            
            <form method="POST" enctype="multipart/form-data" >
              <div class="form-group">
                <label>Escoja un Color</label>
                <select class="form-control" name="id_color">
                <?php foreach($data as $color) : ?>
                  <option value="<?php echo $color["id"] ?>"><?php echo $color["name"] ?></option>
                <?php endforeach; ?>
                </select>
                <small class="form-text text-muted">Ingrese un color.</small>
              </div>
              <div class="form-group">
                <label>Ingrese Stock del Producto</label>
                <input type="text" class="form-control" name="stock" placeholder="100">
                <small class="form-text text-muted">Ingrese cantidad de productos disponibles.</small>
              </div>
              <div class="form-group">
                <label>Ingrese una foto</label>
                <input name="uploadedfile" class="form-control-file" type="file" />
              </div>
              <input type="hidden" name="method" value="create_detalle">
              <a href="producto" class="btn btn-dark">Cancelar</a>
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
<?php 
    elseif($_GET['action'] == 5 && !empty($_GET["id"]) ) :  ?>

<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Actualizar Producto : <?php echo $data['code'] ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
             
            <form method="POST">
              <div class="form-group">
                <label >Código de Producto</label>
                <input type="text" class="form-control" placeholder="Código" name="code" value="<?php echo $data["code"] ?>">
                <small class="form-text text-muted">Ingrese Nuevo Código del Producto.</small>
              </div>
              <div class="form-group">
                <label >Precio de Producto</label>
                <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $data["price"] ?>">
                <small class="form-text text-muted">Ingrese Nuevo Precio del Producto.</small>
              </div>
              <div class="form-group">
                <label >Descripción de Producto</label>
                <textarea class="form-control" name="description" rows="3"><?php echo $data["description"] ?></textarea>
                <small class="form-text text-muted">Ingrese la Nueva Descripción del Producto.</small>
              </div>
              <input type="hidden" name="method" value="update_producto">
              <a href="producto" class="btn btn-dark">Cancelar</a>
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
<?php 
    elseif($_GET['action'] == 6 && !empty($_GET["id"]) ) :  ?>

<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Editar Producto Detalle  </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?php if(!empty($notification)) echo '<div class="alert alert-danger" role="alert">'.$notification.'</div>';?>
            <?php if(!empty($_GET['register'])) echo '<div class="alert alert-primary" role="alert">'.$_GET['register'].'</div>';?>
            <?php if(!empty($message)) echo '<div class="alert alert-primary" role="alert">'.$notification.'</div>';?>
            
            <form method="POST" enctype="multipart/form-data" >
            <?php if(!empty($color)) : ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Colores</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="id_color">
                    <?php foreach($color as $col): ?>  
                      <option value="<?php echo $col["id"] ?>" 
                      <?php echo ($col["id"] == $data["id_color"])? 'selected' : '' ; ?> ><?php echo $col["name"] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <small id="emailHelp" class="form-text text-muted">Color Seleccionado</small>
                </div>
                <div class="form-group">
                  <label >Stock del Producto</label>
                  <input type="text" class="form-control" name="stock" placeholder="Stock" value="<?php echo $data["stock"] ?>">
                  <small  class="form-text text-muted">Nuevo Stock del Producto.</small>
                </div>
                <div class="form-group">
                  <label>Ingrese una foto</label>
                  <input name="uploadedfile" class="form-control-file" type="file" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="card" style="padding:25px">
                    <img class="card-img-top" src="<?php echo IMAGES.'Productos/' . $data["code"] . '/' . $data["link_photo"] ?>" alt="Card image cap">
                </div>
              </div>
            </div>
              
            <?php endif; ?>
              <input type="hidden" name="code" value="<?php echo $data["code"] ?>">
              <input type="hidden" name="method" value="update_detalle">
              <a href="producto" class="btn btn-dark">Cancelar</a>
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

    <?php endif; ?>
<?php require_once INCLUDES.'admin/inc_footer.php'; ?>