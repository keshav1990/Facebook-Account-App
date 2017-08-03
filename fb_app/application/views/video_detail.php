<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1434px;">
                    <!-- BEGIN PAGE HEADER-->
               
                    <h1 class="page-title">Video's
                        
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                               <a href="<?php echo base_url('ManageAccounts'); ?>"> <span>Manage Auctions</span></a>
                                <i class="fa fa-angle-right"></i>
                            </li>
							<li>
                                <i class="icon-settings"></i>
                                <span>Video's</span>
                               
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
                                        <span class="caption-subject bold uppercase"></span>
                                    </div>
                                 </div>
                                <div class="portlet-body form">
                                  <?php echo  form_open(''); ?>
                                        <div class="form-body">
                                           <div class="row">
										   <?php $reference_idError = strip_tags( form_error('reference_id')); ?>
                                            <div class="form-group  col-md-6 <?php if($reference_idError){ ?> has-error <?php }?>">
                                                <?php if($reference_idError){ ?> <label class="control-label"><?php echo $reference_idError; ?></label><?php }else{?> <label>Reference Id</label><?php } ?>
                                                <div >
                                                 
                                                    <input type="text" name="reference_id" value="" class="form-control spinner" placeholder="Reference Id"> </div>
														
											</div>
											 <?php $fan_pageError = strip_tags( form_error('fan_page')); ?>
                                           <div class="form-group  col-md-6 <?php if($fan_pageError){ ?> has-error <?php }?>">
                                                <?php if($fan_pageError){ ?><label class="control-label"><?php echo $fan_pageError; ?></label><?php }else{?> <label>Fan's Page</label><?php } ?>
                                                <div>
                                                   
                                                    <input type="text" name="fan_page" value="" class="form-control spinner" placeholder="Fan's Page"> </div>
                                            </div>
                                            </div>
											<div class="row">
											 <?php $video_idError = strip_tags( form_error('video_id')); ?>
                                                 <div class="form-group  col-md-6 <?php if($video_idError){ ?> has-error <?php }?>">
                                                 <?php if($video_idError){ ?><label class="control-label"><?php echo $video_idError; ?></label><?php }else{?> <label>Video Id</label><?php } ?>
												<div>
												<input class="form-control spinner" value="" name="video_id" placeholder="Video Id"type="text" > 
												
												</div>
											
                                            </div>
                                            
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit"  name="add_account" value="submit"class="btn blue">Submit</button>
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
	 