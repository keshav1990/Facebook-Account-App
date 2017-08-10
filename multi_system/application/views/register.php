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
			
	<form class="register-form" action=" <?php echo base_url('register'); ?> " method="post" novalidate="novalidate" style="display: block;">
           <h3 class="font-green">Sign Up</h3>
           <?php
				if(!empty($this->session->flashdata())){
				echo '<p class="statusMsg">'.$this->session->flashdata('error_message').'</p>';
			}
			?>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">User Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Username"  name="name">
						<?php echo form_error('name'); ?>
						 </div>
			   <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">User Email</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Useremail" name="email">
						<?php echo form_error('email'); ?></div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">user Password</label>
                    <input class="form-control placeholder-no-fix" type="password" placeholder="Userpassword"  name="password"> 
					<?php echo form_error('password'); ?></div>
                
                <div class="form-actions">
					  <a href="<?php echo base_url('login/index')?>" type="button" id="back-btn" class="btn btn-success uppercase">Back</a>
                    <button type="submit" name="register" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
	
         </div>
        <div class="copyright"> <?php echo date('Y'); ?> &copy;  Admin Dashboard. </div>
		 <?php $this->load->view('common/css_other'); 
		 $this->load->view('common/common_js'); ?>
   
   </body>

</html>

