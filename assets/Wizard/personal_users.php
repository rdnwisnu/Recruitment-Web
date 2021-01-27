
<!DOCTYPE html>
<html lang="en">

<head>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="../assets/wizard/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="../assets/wizard/montserrat-font.css">
	
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/Wizard/style.css">
    <!-- Main Style Css -->
    <style>
    .form-wizard {
    margin-top: 100px;
    }
    </style>
</head>

<body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="Nav">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo site_url('users/personal');?>">Personal Data</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo site_url('users/karir')?>">Peluang Karir</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">List Apply</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('logout'); ?>">Logout</a></li>
                 </ul>
            </div>
        </div>
    </nav>
    <section class="form-box" >
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12 form-wizard">
					
						<!-- Form Wizard -->
                    	<form role="form" action="" method="post">

                    		<h3>Sign Up Office Employee Account</h3>
                    		<p>Fill all form field to go next step</p>
							
							<!-- Form progress -->
                    		<div class="form-wizard-steps form-wizard-tolal-steps-4">
                    			<div class="form-wizard-progress">
                    			    <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="4" style="width: 12.25%;"></div>
                    			</div>
								<!-- Step 1 -->
                    			<div class="form-wizard-step active">
                    				<div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    				<p>Data Diri</p>
                    			</div>
								<!-- Step 1 -->
								
								<!-- Step 2 -->
                    			<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                    				<p>Data Pendidikan</p>
                    			</div>
								<!-- Step 2 -->
								
								<!-- Step 3 -->
								<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                    				<p>Data Pekerjaan</p>
                    			</div>
								<!-- Step 3 -->
								
								<!-- Step 4 -->
								<div class="form-wizard-step">
                    				<div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    				<p>Upload Data</p>
                    			</div>
								<!-- Step 4 -->
                    		</div>
							<!-- Form progress -->
                    		
							
							<!-- Form Step 1 -->
                    		<fieldset>

                    		    <h4>Personal Information: <span>Step 1 - 4</span></h4>
								<div class="form-group">
                    			    <label>First Name: <span>*</span></label>
                                    <input type="text" name="First Name" placeholder="First Name" class="form-control required">
                                </div>
                                <div class="form-group">
                    			    <label>Last Name: <span>*</span></label>
                                    <input type="text" name="Last Name" placeholder="Last Name" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Gender : </label>
                                    <label class="radio-inline">
									  <input type="radio" name="Gender" value="option1" checked="checked"> Male
									</label>
									<label class="radio-inline">
									  <input type="radio" name="Gender" value="option2"> Female
									</label>
                                </div>
								<div class="container-fluid">
								<div class="row form-inline">
								<div class="form-group col-md-3 col-xs-3">
                                    <label>Date Of Birth: </label>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Date: </label>
                                    <select class="form-control">
									  <option>01</option>
									  <option>02</option>
									  <option>03</option>
									  <option>04</option>
									  <option>05</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Month: </label>
                                    <select class="form-control">
									  <option>Jan</option>
									  <option>Feb</option>
									  <option>Mar</option>
									  <option>Apr</option>
									  <option>May</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Year: </label>
                                    <select class="form-control">
									  <option>2017</option>
									  <option>2018</option>
									  <option>2019</option>
									  <option>2020</option>
									  <option>2021</option>
									</select>
								</div>
                                </div>
								</div>
								<div class="form-group">
                    			    <label>Maratial Status: </label>
                                    <select class="form-control">
										<option value="">Select Status ...</option>
										<option value="Married">Married</option>
										<option value="Divorced">Divorced</option>
										<option value="Un-Married">Un-Married</option>
										<option value="Widowed">Widowed</option>
									</select>
                                </div>
                                <div class="form-group">
                    			    <label>User Name: <span>*</span></label>
                                    <input type="text" name="Username" placeholder="User Name" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Password: <span>*</span></label>
                                    <input type="password" name="Password" placeholder="User Password" class="form-control required">
                                </div>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
							<!-- Form Step 1 -->

							<!-- Form Step 2 -->
                            <fieldset>

                                <h4>Contact Information : <span>Step 2 - 4</span></h4>
								<div class="form-group">
                    			    <label>Email: <span>*</span></label>
                                    <input type="email" name="Email" placeholder="Email" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Phone: <span>*</span></label>
                                    <input type="text" name="Phone" placeholder="Phone" class="form-control required">
                                </div>
                                <div class="form-group">
                    			    <label>Address: <span>*</span></label>
                                    <input type="text" name="Address" placeholder="Address" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Zip Code: <span>*</span></label>
                                    <input type="text" name="Zip Code" placeholder="Zip Code" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>City: <span>*</span></label>
                                    <input type="text" name="City" placeholder="City" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>State: <span>*</span></label>
                                    <input type="text" name="State" placeholder="State" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Country: </label>
                                    <select class="form-control">
									  <option>Australia</option>
									  <option>America</option>
									  <option>Bangladesh</option>
									  <option>Canada</option>
									  <option>England</option>
									</select>
                                </div>
								
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
							<!-- Form Step 2 -->

							<!-- Form Step 3 -->
                            <fieldset>

                                <h4>Official Information: <span>Step 3 - 4</span></h4>
								<div class="form-group">
                    			    <label>Employee ID: <span>*</span></label>
                                    <input type="text" name="Employee ID" placeholder="Employee ID" class="form-control required">
                                </div>
                                <div class="form-group">
                    			    <label>Designation: <span>*</span></label>
                                    <input type="text" name="Designation" placeholder="Designation" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Department: <span>*</span></label>
                                    <input type="text" name="Department" placeholder="Department" class="form-control required">
                                </div>
								<div class="form-group">
                    			    <label>Working Hours: <span>*</span></label>
                                    <input type="text" name="Working Hours" placeholder="Working Hours" class="form-control required">
                                </div>
								<div class="container-fluid">
								<div class="row form-inline">
								<div class="form-group col-md-3 col-xs-3">
									<label>Joining Date: </label>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Day: </label>
                                    <select class="form-control">
									  <option>01</option>
									  <option>02</option>
									  <option>03</option>
									  <option>04</option>
									  <option>05</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Month: </label>
                                    <select class="form-control">
									  <option>Jan</option>
									  <option>Feb</option>
									  <option>Mar</option>
									  <option>Apr</option>
									  <option>May</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Year: </label>
                                    <select class="form-control">
									  <option>2017</option>
									  <option>2018</option>
									  <option>2019</option>
									  <option>2020</option>
									  <option>2021</option>
									</select>
								</div>
                                </div>
								</div>
								<br/>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>
							<!-- Form Step 3 -->
							
							<!-- Form Step 4 -->
							<fieldset>

                                <h4>Payment Information: <span>Step 4 - 4</span></h4>
								<div style="clear:both;"></div>
								<div class="form-group">
                    			    <label>Bank Name: <span>*</span></label>
                                    <input type="text" name="Bank Name" placeholder="Bank Name" class="form-control required">
                                </div>
                    			<div class="form-group">
                    			    <label>Payment Type : </label>
                                    <label class="radio-inline">
									  <input type="radio" name="Payment" value="option1" checked="checked"> Master Card
									</label>
									<label class="radio-inline">
									  <input type="radio" name="Payment" value="option2"> Visa Card
									</label>
                                </div>
                                <div class="form-group">
                    			    <label>Holder Name: <span>*</span></label>
                                    <input type="text" name="Holder Name" placeholder="Holder Name" class="form-control required">
                                </div>
								<div class="container-fluid">
								<div class="row form-inline">
								<div class="form-group col-md-6 col-xs-6">
									<label>Card Number: <span>*</span></label>
                                    <input type="text" name="Card Number" placeholder="Card Number" class="form-control required">
								</div>
								<div class="form-group col-md-6 col-xs-6">
									<label>CVC: <span>*</span></label>
                                    <input type="text" name="CVC" placeholder="CVC" class="form-control required">
								</div>
                                </div>
								</div>
								<br/>
								<div class="container-fluid">
								<div class="row form-inline">
								<div class="form-group col-md-3 col-xs-3">
									<label>Expiry Date: </label>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Month: </label>
                                    <select class="form-control">
									  <option>Jan</option>
									  <option>Feb</option>
									  <option>Mar</option>
									  <option>Apr</option>
									  <option>May</option>
									</select>
								</div>
								<div class="form-group col-md-3 col-xs-3">
									<label>Year: </label>
                                    <select class="form-control">
									  <option>2017</option>
									  <option>2018</option>
									  <option>2019</option>
									  <option>2020</option>
									  <option>2021</option>
									</select>
								</div>
                                </div>
								</div>
								<br/>
                                <div class="form-wizard-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
							<!-- Form Step 4 -->
                    	
                    	</form>
						<!-- Form Wizard -->
                    </div>
                </div>
                    
            </div>
        </section>
    <!-- Footer-->
    <footer class="footer bg-dark text-center text-white py-4">
        <div class="container">
            Copyright © Your Website 2020
        </div>
    </footer>
      <!-- Bootstrap core JS-->
      <script src="../assets/js/jquery.min.js "></script>
    <script src="../assets/js/bootstrap.bundle.min.js "></script>
    <!-- Third party plugin JS-->
    <script src="../assets/js/jquery.easing.min.js "></script>
    <!-- Contact form JS-->
    <script src="../assets/mail/jqBootstrapValidation.js "></script>
    <script src="../assets/mail/contact_me.js "></script>
    <!-- Core theme JS-->
    <script src="../assets/js/scripts.js "></script>
    <script src="../assets/Wizard/jquery.steps.js "></script>

</html>