<?php include 'app/views/users/overall/head.php'; ?>

    </head>
	<body>

		<!-- Header -->
	<?php include 'app/views/users/overall/header.php'; ?>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
          <div class="col-md-6 ">
						<div class="section-row">
							<h3>Get SignIn here!</h3>
							<form>
								<div class="row">
									<div class="col-md-11">
										<div class="form-group">
											<span>Email</span>
											<input class="input" type="email" name="email">
										</div>
									</div>
									<div class="col-md-11">
										<div class="form-group">
											<span>Password</span>
											<input class="input" type="password" name="password">
										</div>
									</div>
                  <div class="row col-md-11"  style="padding:0; margin-left:0.2%">
                    <div class="col-md-7">

  										<div class="form-group ">
  											<span>Captcha</span>
  											<input class="input" type="text" name="captcha">

  										</div>

  									</div>
                    <div class="col-md-5" >
                      <img src="/blog/<?= $img_captcha ?>" alt="" width="100%" height="38"  style="margin-top:12%;border:1px solid lightgrey">
                    </div>
                    <br>
                  </div>
                  <div class="col-md-11">
                    <div class="form-group">
                      <label for="">
                        <input type="checkbox" name="" value=""> Remmember Me
                      </label>
                    </div>
                  </div>
									<div class="col-md-11">
										<button class="primary-button">Login</button>
									</div>
								</div>

  						</div>
							</form>
              <br>
              <div class="col-md-12" style="padding:0">
                  <p>You dont have an account? <a href="/blog/access/register">Click here</a> </p>
              </div>
              <div class="col-md-12" style="padding:0">
                	<button style="background-color: #db4a39"  class="primary-button">Google <i class="fa fa-google"></i> </button>
                  <button style="background-color:#3b5998" class="primary-button">Facebook <i class="fa fa-facebook"></i> </button>
                  <button style="background-color:#333" class="primary-button">GitHub <i class="fa fa-github"></i> </button>

              </div>
					</div>
					<div class="col-md-6">
						<div class="section-row">
							<h3>Contact Information</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<ul class="list-style">
								<li><p><strong>Email:</strong> <a href="#">Webmag@email.com</a></p></li>
								<li><p><strong>Phone:</strong> 213-520-7376</p></li>
								<li><p><strong>Address:</strong> 3770 Oliver Street</p></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
	<?php include 'app/views/users/overall/footer.php'; ?>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<?php include 'app/views/users/overall/plugins.php'; ?>

	</body>
</html>
