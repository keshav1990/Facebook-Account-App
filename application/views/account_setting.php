<div class="page-content-wrapper">
<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                 
                    <h1 class="page-title">Account Setting </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-cog"></i>
                                <a href="">Account Setting</a>
                               
                            </li>
                           
                        
                        </ul>
                       
                    </div>
                    <!-- END PAGE HEADER-->
                   
					
					<!--Enter your code from here -->
					
					
					
					<div class="portlet light ">

                            <div class="portlet-body form">
											
											
				 <?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
					</div>

						<?php } else if($this->session->flashdata('error')){  ?>

						<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
						</div>
						
						<?php } ?>
											
							<form class="form-horizontal" action="<?php echo base_url('ManageAccounts/accountSetting/') ?>" method="post">
                                        <div class="form-body">
                                            <div class="form-group form-md-line-input has-error">
                                                <label class="col-md-2 control-label" for="form_control_1">Admin Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" name="admin_name" id="form_control_1" placeholder="admin name">
                                                     
													<div class="form-control-focus"> </div>
                                                </div>
                                            </div>
											
                                          
                                            <div class="form-group form-md-line-input has-success">
                                                <label class="col-md-2 control-label" for="form_control_1">Old Password</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" id="form_control_1" name="oldpassword" placeholder="Current Password">
													
												   <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input has-warning">
                                                <label class="col-md-2 control-label" for="form_control_1">New Password</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" name="newpassword" id="form_control_1"placeholder="New Password" >
                                                    <?php echo form_error('newpassword'); ?>
													<div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input has-error">
                                                <label class="col-md-2 control-label" for="form_control_1">Re Password</label>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control" name="repassword"id="form_control_1" placeholder="Retype New Password">
                                                      <?php echo form_error('repassword'); ?>
													<div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-2 col-md-10">
                                                   
                                                    <button type="submit" name="submit" class="btn blue">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
					
					
					
					
					<!-- New code insertion end's here -->
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
		</div>
		<?php 
		$this->load->view('common/css_other'); 
		$this->load->view('common/home_css'); 
	 $this->load->view('common/common_js');
	 $this->load->view('common/theme_js');
	 ?>