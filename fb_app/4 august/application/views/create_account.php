<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1434px;">
                    <!-- BEGIN PAGE HEADER-->
               
                    <h1 class="page-title"> <?php echo $title; ?>
                        
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
                                <span><?php echo $title; ?></span>
                               
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
                                        <span class="caption-subject bold uppercase"> <?php echo $title; ?></span>
                                    </div>
                                 </div>
                                <div class="portlet-body form">
                                  <?php echo  form_open(''); ?>
                                        <div class="form-body">
                                           <div class="row">
										   <?php $account_nameError = strip_tags( form_error('account_name')); ?>
                                            <div class="form-group  col-md-6 <?php if($account_nameError){ ?> has-error <?php }?>">
                                                <?php if($account_nameError){ ?> <label class="control-label"><?php echo $account_nameError; ?></label><?php }else{?> <label>Auction Name</label><?php } ?>
                                                <div >
                                                 
                                                    <input type="text" name="account_name" value="<?php echo $account_name; ?>" class="form-control spinner" placeholder="Auction Name"> </div>
														
											</div>
											 <?php $account_idError = strip_tags( form_error('account_id')); ?>
                                           <div class="form-group  col-md-6 <?php if($account_idError){ ?> has-error <?php }?>">
                                                <?php if($account_idError){ ?><label class="control-label"><?php echo $account_idError; ?></label><?php }else{?> <label>Video Id</label><?php } ?>
                                                <div>
                                                   
                                                    <input type="text" name="account_id" value="<?php echo $account_id; ?>" class="form-control spinner" placeholder="Video Id"> </div>
                                            </div>
                                            </div>
											<div class="row">
                                         <div class="form-group  col-md-6">
                                                <label>Products Ids , seprated</label>
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
										<div class="row">
										<div class="form-group  col-md-12">
										<div class="input_fields_wrap">
											
											
									
											<?php if(isset($item) && count($item) > 0){
                                             foreach(unserialize($item) as $key =>$itemvalue){
											?>
											<div class="row"><div class="col-md-5">
											<input type="text" value="<?php echo $itemvalue; ?>" class="form-control spinner" style="margin-top: 2px;"name="mytext[]">
											<?php if($key != 0){?>
											<a href="#" dataid="<?php echo $id; ?>" dataname="<?php echo $itemvalue; ?>" onclick="removeitem('<?php echo $id; ?>','<?php echo $itemvalue; ?>')" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a>
											<?php } ?>
											</div>
											</div>	
											<?php } } else{ ?>	
											<div class="row"><div class="col-md-5">
											<input type="text" class=" data form-control spinner" placeholder="Add Item's "  name="mytext[]">
											
											</div>
											</div>
											<?php } ?>
										</div>
											<button class="add_field_button ">Add More Fields</button>
											
										</div>
										</div>
                                        <div class="form-actions">
                                            <button type="submit"  name="add_account" class="btn blue"><?php echo $button_label; ?></button>
                                            <button type="reset" class="btn default">Reset Form</button>
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
                         
                        </div>
                    </div>
             </div>
                <!-- END CONTENT BODY -->
         

<?php 
	 $this->load->view('common/css_other'); 
	 $this->load->view('common/home_css'); 
	 $this->load->view('common/common_js');
	 $this->load->view('common/theme_js');
	 ?>
	 <script>
	 $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
		e.stopPropagation();
		//alert("hi");
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row remove_item"> <div class="col-md-5"><input class=" data form-control spinner"type="text" name="mytext[]"/><a href="#" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
	 $(".remove_field").on("click", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    });
});



	 </script>
	 <style>
	 
	 .add_field_button{
		 margin-top: 2px;
		 }
	 .data{
		  margin-top: 2px;
	 }
	 </style>