<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1434px;">
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
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light ">
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
					
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Account Setting</span>
                                    </div>
                                 </div>
                                <div class="portlet-body form">
								<?php echo  form_open('ManageAccounts/myaccountSetting/'); ?>
                             
                                        <div class="form-body">
                                           <div class="row">
										   
                                            <div class="form-group  col-md-6">
                                                <label>Admin Name</label>
                                                <div >
                                                 
                                                    <input type="text" name="admin_name" value="<?php echo  $this->session->userdata('admin_name'); ?> " class="form-control spinner" placeholder="Admin Name"> </div>
														
											</div>
                                           <div class="form-group  col-md-6">
                                                <label>Admin Email</label>
                                                <div>
                                                   
                                                    <input type="text" name="admin_email" value="<?php echo  $this->session->userdata('admin_email'); ?> " class="form-control spinner" placeholder="Admin Email"> </div>
                                            </div>
                                            </div>
											<div class="row">
											 <?php $old_passwordError = strip_tags( form_error('oldpassword')); ?>
											 <div class="form-group  col-md-6 <?php if($old_passwordError){ ?> has-error <?php }?>">
                                                   <?php if($old_passwordError){ ?> <label class="control-label"><?php echo $old_passwordError; ?></label><?php }else{?> <label>Old Password</label><?php } ?>
                                                <div>
												<input type="password" class="form-control spinner" value="" name="oldpassword" > 
												</div>
                                          </div>
										   <?php $new_passwordError = strip_tags( form_error('newpassword')); ?>
                                            <div class="form-group  col-md-6 <?php if($new_passwordError){ ?> has-error <?php }?>">
                                                  <?php if($new_passwordError){ ?> <label class="control-label"><?php echo $new_passwordError; ?></label><?php }else{?> <label>New Password</label><?php } ?>
												  <div>
                                                <input  type="password" class="form-control spinner" value="" name="newpassword"> 
                                            </div></div>
                                            </div>
												<div class="row">
												<?php $confirm_passwordError = strip_tags( form_error('confirmpassword')); ?>
												 <div class="form-group  col-md-6 <?php if($new_passwordError){ ?> has-error <?php }?>">
													 <?php if($confirm_passwordError){ ?> <label class="control-label"><?php echo $confirm_passwordError; ?></label><?php }else{?> <label>Confirm Password</label><?php } ?>
													  <div>
                                                <input  type="password" class="form-control spinner" value="" name="confirmpassword"> 
												
												</div></div>
												</div>
                                            
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit"   name="add_account" class="btn blue">Submit</button>
                                            <button type="reset" class="btn default">Reset Form</button>
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
                         
                        </div>
                    </div>
             </div>
                <!-- END CONTENT BODY -->
            </div>

<?php 
$this->load->view('common/css_other'); 
$this->load->view('common/home_css'); 
	 $this->load->view('common/common_js');
	 $this->load->view('common/theme_js');
	 ?>
	 <script>
	 </script>
	 