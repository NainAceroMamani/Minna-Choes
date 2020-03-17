<?php require_once 'config.php';
      require_once INCLUDES.'inc_header.php'; ?>
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12" style="margin-top:25px">
					<div class="login_form_inner">
						<h3>MINNSA SHOES</h3>
						<form class="row login_form" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="email" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Recordar Contraseña</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
    

<?php require_once INCLUDES.'inc_footer.php'; ?>