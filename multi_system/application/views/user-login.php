<?php
$this->load->view('common/head');
 ?>
         
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="/">
                <img src="<?php echo base_url(); ?>assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
				
					   
			 <?php
			 if(!empty($this->session->flashdata('sucess_message'))){
			echo '<p class="statusMsg">'.$this->session->flashdata('sucess_message').'</p>';
			 }
		  elseif(!empty($this->session->flashdata('error_message'))){
			echo '<p class="statusMsg">'.$this->session->flashdata('error_message').'</p>';
			}
			
			?>
            <form class="login-form" action="<?php echo base_url('login/loginAccount'); ?>"method="post">
                <h3 class="form-title font-green">Sign In</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter Your username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
					</div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                  
                </div>
				  <div class="create-account"style="margin: 0 -40px -30px; padding: 15px 0 17px; text-align: center;    background-color: #6c7a8d;">
   
   

                    <p>
                        <a href="<?php echo base_url('register'); ?>" id="register-btn" class="uppercase">Create an account</a>
                    </p>
                </div>
             </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
			
            <form class="forget-form" action="" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
			
         </div>
        <div class="copyright"> <?php echo date('Y'); ?> &copy;  Admin Dashboard. </div>
		 <?php $this->load->view('common/css_other'); 
		 $this->load->view('common/common_js'); ?>
   
   </body>

</html>