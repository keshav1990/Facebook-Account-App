<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1434px;">
                    <!-- BEGIN PAGE HEADER-->
               
                    <h1 class="page-title"> Add Account
                        
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Create Account</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Add Account</span>
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
                                        <span class="caption-subject bold uppercase"> Add Account</span>
                                    </div>
                                 </div>
                                <div class="portlet-body form">
                                  <?php echo  form_open(''); ?>
                                        <div class="form-body">
                                           <div class="row">
										   <?php $account_nameError = strip_tags( form_error('account_name')); ?>
                                            <div class="form-group  col-md-6 <?php if($account_nameError){ ?> has-error <?php }?>">
                                                <?php if($account_nameError){ ?> <label class="control-label"><?php echo $account_nameError; ?></label><?php }else{?> <label>Account Name</label><?php } ?>
                                                <div >
                                                 
                                                    <input type="text" name="account_name" value="<?php echo $account_name; ?>" class="form-control spinner" placeholder="Account Name"> </div>
														
											</div>
                                           <div class="form-group  col-md-6">
                                                <label>Account ID</label>
                                                <div>
                                                   
                                                    <input type="text" name="account_id" value="<?php echo $account_id; ?>" class="form-control spinner" placeholder="Account ID"> </div>
                                            </div>
                                            </div>
											<div class="row">
                                         <div class="form-group  col-md-6">
                                                <label>Total No. of Lead's Need To Send</label>
                                                <input class="form-control spinner" value="<?php echo $total_leads; ?>" name="total_leads" type="text" > 
												</div>
                                          
                                            <div class="form-group  col-md-6">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
													<option <?php if($status==1){echo "selected";} ?> value="1">Active</option>
                                                    <option <?php if($status==0){echo "selected";} ?> value="0">Disabled</option>
                                                    
                                                </select>
                                            </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit"  name="add_account" class="btn blue">Add Account</button>
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
	 