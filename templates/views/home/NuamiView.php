<?php require_once 'config.php';
      require_once INCLUDES.'inc_header.php'; ?>
	<!-- start banner Area -->
	<?php if(isset($_GET['comprar'])) : ?> 
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Minnsa Shoes</h1>
                    <nav class="d-flex align-items-center">
                        <a href="#">Comprar<span class="lnr lnr-arrow-right"></span></a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
	
	<!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
				<div class="row">
				<?php for($i = 0 ; $i < $num ; $i++) : ?>
					<?php 
						$prods = new productoModel;
						$prods->id = $datos_get[$i];
						$data = $prods->one_detail();
						$prods->id = $data["id_producto"];
						$datos = $prods->one_detail_prod();
						?>
						<div class="col-md-12" style="margin-top:10px">
							<div class="card">
								<h5 class="card-title text-center"><?php echo 'Código de Producto : '.$data["code"] ?></h5>
							</div>
						</div>
						<br><br>
						<div class="col-md-6">
							<div class="form-group" >
								<input type="number" name="cantidad" class="form-control" placeholder="1.0">
								<small class="form-text text-muted">Ingrese la Cantidad.</small>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" >
								<input type="text" class="form-control" placeholder="1.0" disabled value="<?php echo $data['price']*$peso["price"].' Pesos / Docena' ?>">
								<smallclass="form-text text-muted">Precio .</small>
							</div>
						</div>
						<div class="col-md-12">
							<h6>Elija un Color para el Producto : <?php echo $data["code"] ?></h6>
							<div class="row">
								<?php foreach($datos as $dato): ?>
									<input type="hidden" id="precio" name="price" value="<?php echo $data["price"]*$peso["price"] ?>">
									<div class="col-md-3">
										<div class="card">
											<div class="card-body">
												<div class="carousel-item active">
													<img class="d-block w-100" src="<?php echo IMAGES.'Productos/' . $dato["code"] . '/' . $dato["link_photo"] ?>" alt="First slide">
													<div class="form-check">
														<input style="width: 28px;height: 28px;" class="form-check-input" type="radio" name="radio_<?php echo $data["id_producto"] ?>" id="gridRadios1" checked>
														<label style="margin-left:20px" class="form-check-label" for="gridRadios1">
														<?php echo 'Color :'.$dato["name"] ?>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
				<?php endfor ?>
				</div>
            </div>
			<br><hr>
			<div class="card">
				<div class="card-body">
				<h4 class="card-title text-center">INGRESE SUS DATOS</h4>
				<form>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" placeholder="Nombre">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Apellido</label>
								<input type="text" class="form-control" placeholder="Apellido">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Ruc</label>
								<input type="text" class="form-control" placeholder="Ruc">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Correo Electrónico</label>
								<input type="text" class="form-control" placeholder="Correo">
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label >Tipo de Documento</label>
							<select class="form-control" >
								<option value="DNI">DNI</option>
								<option value="CARNET DE EXTRANJERÍA">CARNET DE EXTRANJERÍA</option>
								<option value="PASAPORTE">PASAPORTE</option>
								<option value="OTROS">OTROS</option>
							</select>
						</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Número de Documento</label>
								<input type="text" class="form-control" placeholder="Documento">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Número telefónico</label>
								<input type="text" class="form-control" placeholder="Celular">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Foto del depósito</label>
								<input type="file" class="form-control-file" id="exampleFormControlFile1">
							</div>
						</div>
					</div>
					<div class="checkout_btn_inner d-flex align-items-center">
						<button class="primary-btn" type="submit">Procesar Pedido</button>
					</div>
				</form>
				</div>
			</div>
        </div>
    </section>
	
    <!--================End Cart Area =================-->
    <!-- End Banner Area -->
	<?php else: ?>
		<section class="banner-area">
			<div class="container">
				<div class="row fullscreen align-items-center justify-content-start">
					<div class="col-lg-12">
						<div class="active-banner-slider owl-carousel">
							<!-- single-slide -->
					<?php if(!empty($productos_detal)) : ?>
						<?php foreach($productos_detal as $pt) :  ?>
							<div class="row single-slide align-items-center d-flex">
								<div class="col-lg-5 col-md-6">
									<div class="banner-content">
										<h2 style="color:#fd7e14">MINNSA SHOES</h2>
										<h1><?php echo $pt['code'] ?> <br></h1>
										<h6 class="btn btn-light" ><?php echo ' $'.$pt["price"].' SOLES' ?><span style="font-size:10px"> por docena</span></h6>
										<h6 class="btn btn-light" ><?php echo ' $'.$pt["price"]*$peso["price"].' pesos' ?><span style="font-size:10px"> por docena</span></h6>
										<p><?php echo $pt['description'] ?></p>
										
									</div>
								</div>
								<div class="col-lg-7">
									<div class="banner-img" style="height:800px; width:600px">
										<img class="img-fluid" src="<?php echo IMAGES.'Productos/' . $pt["code"] . '/' . $pt["link_photo"] ?>" style="margin-top:-45%;border-radius: 4px;border: 5px solid #ddd;">
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						<?php endif; ?>
						</div>
					</div>
					
				</div>
				
			</div>
		</section>
		<!-- End banner Area -->
		
		<!-- start features Area -->
		<section class="features-area section_gap">
			<div class="container">
				<div class="row features-inner">
					<!-- single features -->
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-features">
							<div class="f-icon">
								<img src="img/features/f-icon1.png" alt="">
							</div>
							<h6>Entrega gratuita</h6>
							<p>Envío gratis en todos los pedidos</p>
						</div>
					</div>
					<!-- single features -->
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-features">
							<div class="f-icon">
								<img src="img/features/f-icon3.png" alt="">
							</div>
							<h6>24/7 Soporte</h6>
							<p>Soporte en todo momento</p>
						</div>
					</div>
					<!-- single features -->
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-features">
							<div class="f-icon">
								<img src="img/features/f-icon4.png" alt="">
							</div>
							<h6>Pago seguro</h6>
							<p>Envío gratis en todos los pedidos</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end features Area -->
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-md-5">
				<?php foreach($categorias as $cat) : ?>
					<?php
						$sub_categoria = new subcategoriaModel();
						$sub_categorias =  $sub_categoria->all_subcat($cat["id"]);
					?>
					<div class="sidebar-categories">
						<div class="head"><?php echo $cat['name'] ?></div>
						<ul class="main-categories">
							<?php foreach($sub_categorias as $sub_cat) : ?>
								<li class="main-nav-list"><a  href="?action=4&id=<?php echo $sub_cat['id'] ?>&pagina=1<?php echo (isset($_GET['prod']))? '&prod='.$_GET['prod'] : '' ; ?>" aria-expanded="false" aria-controls="fruitsVegetable">
								<?php echo $sub_cat["name"] ?><span class="lnr lnr-arrow-right"></span></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<hr>
				<?php endforeach; ?>
				</div>
				<div class="col-xl-9 col-lg-8 col-md-7">
					<!-- Start Best Seller -->
					<section class="lattest-product-area pb-40 category-list">
						<div class="row">
						<?php  if(!empty($datos)) : ?>
							<?php foreach($datos as $prod) : ?>
								<!-- single product -->
								<div class="col-lg-4 col-md-6">
									<div class="single-product">
										<img class="img-fluid" src="<?php echo IMAGES.'Productos/' . $prod["code"] . '/' . $prod["link_photo"] ?>" alt="">
										<div class="product-details text-center" >
											<h6><?php echo $prod["code"] ?></h6>
									
								<?php if($prod["stock"] > 0) : ?>
											<div class="price">
												<h6>Colores 
												<?php
													$color = new productoModel();
													$colores =  $color->detail_color($prod["id_producto"]);
													foreach($colores as $color) : ?>
												<span class="badge badge-secondary"><?php echo $color["name"];?></span>
													
												<?php endforeach; ?>
												</h6>
											
												<h6 class="btn btn-light" ><?php echo ' $'.$prod["price"].' soles' ?><span style="font-size:10px"> por docena</span></h6>
												<h6 class="btn btn-light" ><?php echo ' $'.$prod["price"]*$peso["price"].' pesos' ?><span style="font-size:10px"> por docena</span></h6>
											<?php if(isset($datos_get)): ?>
												<?php if(!in_array($prod["id"],$datos_get)) : ?>
													<a href="?<?php echo (isset($_GET['action']) && isset($_GET['id']) )? 'action='.$_GET['action'].'&'.'id='.$_GET['id'] : '' ; ?>&pagina=<?php echo (isset($_GET['pagina']))? $_GET['pagina'] : '1' ; ?>&prod=<?php echo (isset($_GET['prod']))? $_GET['prod'].'-'.$prod["id"] : $prod["id"] ; ?>">
														<hr>
														<button class="btn btn-success" >Añadir al carrito</button>
													</a>
												<?php else: ?>
													<div class="alert alert-info text-center" role="alert">Ya se añadio al carrito de compras!!!</div>
												<?php endif; ?>
											<?php else: ?>
												<a href="?<?php echo (isset($_GET['action']) && isset($_GET['id']) )? 'action='.$_GET['action'].'&'.'id='.$_GET['id'] : '' ; ?>&pagina=<?php echo (isset($_GET['pagina']))? $_GET['pagina'] : '1' ; ?>&prod=<?php echo (isset($_GET['prod']))? $_GET['prod'].'-'.$prod["id"] : $prod["id"] ; ?>">
													<hr>
													<button class="btn btn-success" >Añadir al carrito</button>
												</a>
											<?php endif; ?>
											</div>
								
								<?php else: ?>
									<div class="alert alert-danger" role="alert">
										Producto Agotado!!!
									</div>
								<?php endif; ?>
										</div>
									</div>
								</div>
								
							<?php endforeach; ?>
						<?php  else : ?>
							<div class="alert alert-danger" role="alert">
								No hay Productos disponibles!!!
							</div>
						<?php endif; ?>
						</div>
					</section>
					
					<div class="filter-bar d-flex flex-wrap align-items-center">
						<div class="pagination">
						<?php if(isset($_GET['id']) && isset($_GET['action'])) : ?>
							<a href="?action=4&id=<?php echo $_GET['id'] ?>&pagina=<?php echo ($_GET['pagina'] <= 1)? $_GET['pagina'] : $_GET['pagina'] - 1 ; ?><?php echo (isset($_GET['prod']))? '&prod='.$_GET['prod'] : '' ; ?>" class="prev-arrow disabled"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
							<?php for($i = 0 ; $i < $paginas; $i++) : ?>
								<a href="?action=4&id=<?php echo $_GET['id'] ?>&pagina=<?php echo $i+1 ?><?php echo (isset($_GET['prod']))? '&prod='.$_GET['prod'] : '' ; ?>" class="<?php echo $_GET["pagina"] == $i+1 ? 'active' : '' ; ?>"><?php echo $i + 1 ?></a>
							<?php endfor ?>
							<a href="?action=4&id=<?php echo $_GET['id'] ?>&pagina=<?php echo ($_GET['pagina'] >= $paginas)? $_GET['pagina'] : $_GET['pagina'] + 1 ; ?><?php echo (isset($_GET['prod']))? '&prod='.$_GET['prod'] : '' ; ?>" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						<?php else: ?>
							<a href="?pagina=<?php echo ($_GET['pagina'] <= 1)? $_GET['pagina'] : $_GET['pagina'] - 1 ; ?><?php echo ($_GET['prod'])? '&prod='.$_GET['prod'] : '' ; ?><?php echo (isset($_GET['prod']))? '&prod='.$_GET['prod'] : '' ; ?>" class="prev-arrow disabled"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
							<?php for($i = 0 ; $i < $paginas; $i++) : ?>
								<a href="?pagina=<?php echo $i+1 ?><?php echo (isset($_GET['prod']))? '&prod='.$_GET['prod'] : '' ; ?>" class="<?php echo $_GET["pagina"] == $i+1 ? 'active' : '' ; ?>"><?php echo $i + 1 ?></a>
							<?php endfor ?>
							<a href="?pagina=<?php echo ($_GET['pagina'] >= $paginas)? $_GET['pagina'] : $_GET['pagina'] + 1 ; ?><?php echo (isset($_GET['prod']))? '&prod='.$_GET['prod'] : '' ; ?>" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Start brand Area -->
		<section class="brand-area section_gap">
			<div class="container">
				<div class="row">
					<a class="col single-img" href="#">
						<img class="img-fluid d-block mx-auto" src="<?php echo IMAGES.'brand/1.png' ?>" alt="">
					</a>
					<a class="col single-img" href="#">
						<img class="img-fluid d-block mx-auto" src="<?php echo IMAGES.'brand/2.png' ?>" alt="">
					</a>
					<a class="col single-img" href="#">
						<img class="img-fluid d-block mx-auto" src="<?php echo IMAGES.'brand/3.png' ?>" alt="">
					</a>
					<a class="col single-img" href="#">
						<img class="img-fluid d-block mx-auto" src="<?php echo IMAGES.'brand/4.png' ?>" alt="">
					</a>
				</div>
			</div>
		</section>
		<!-- End brand Area -->
	<?php endif; ?>
<?php require_once INCLUDES.'inc_footer.php'; ?>
