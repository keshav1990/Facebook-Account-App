<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1434px;">
                    <!-- BEGIN PAGE HEADER-->

                      <h1 class="page-title">Fan Pages</h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="fa fa-cog"></i>
                                <a href="">Fan Pages </a>

                            </li>


                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
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
                            <div class="portlet light ">
                                 <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase">Fan Pages</span>
                                    </div>
                                 </div>
                                 <?php
                                  if(!empty($authUrl)) {
                                      echo '<a href="'.$authUrl.'">Log in with facebook</a>';
                                  }else{
                                  ?>
                                <div class="portlet-body form">
								<?php echo  form_open('ManageAccounts/fan_pageadd/'); ?>
                                         <div class="form-body">
                                           <div class="row">
                                            <div class="form-group  col-md-12">
                                                <label>Fan page Name</label>
                                                <div >
                                                <select name="fan_page" required>
                                                <option value="">Select Page</option>
                                                <?php foreach($fan_page['data']  as $fan){  ?>
                                                <option value="<?php echo $fan['id'];?>_<?php echo $fan['access_token'];?>_<?php echo $fan['name'];?>"><?php echo $fan['name'];?></option>
                                                 <?php } ?>
                                                </select>

											</div>
                                            </div>
                                          </div>

                                       </div>
                                          <div class="form-actions">
                                            <button type="submit"   name="add_fan" class="btn blue">Submit</button>
                                            <button type="reset" class="btn default">Reset Form</button>

                                        </div>
                                </form>

   <p><b>Logout from <a href="<?php echo $logoutUrl; ?>">Facebook</a></b></p> 
<?php } ?>
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