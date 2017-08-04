<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1434px;">
                    <!-- BEGIN PAGE HEADER-->
               
                    <h1 class="page-title"> Manage Auction
                        
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <span>Manage Auctions</span>
                                
                            </li>
                           
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 ">
						<div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Manage Auctions </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <div id="sample_3_wrapper" class="dataTables_wrapper no-footer">
									<div class="row">
									<div class="col-md-7 col-sm-7">
									<div class="btn-group">
                                                    <a href="<?php echo base_url('ManageAccounts/create_account'); ?>" id="sample_editable_1_2_new" class="btn sbold green"> Add New
                                                        <i class="fa fa-plus"></i></a>
                                                    
                                                </div>
									</div>
									<div class="col-md-5 col-sm-5">	
					
				
				</div>
				</div>
									<div class="table-scrollable">
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
									<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_3" role="grid" aria-describedby="sample_3_info">
                                        <thead>
                                            <tr role="row">
											
							
									   <tr>
											<th> # </th>
											<th>Auction Name</th>
											<th>Auction Id</th>
											<th>Total Leads</th>
											
											<th>Auction Status</th>
											<th>Items</th>
											<th style="text-align:center">Action</th>
										</tr>
										</tr>
                                  </thead>
											
                                    
                                          <tbody>
                                    <?php  foreach($user as $row): ?>    
									<tr>   						 
										 <td><?= $row->id?></td>  
										 <td><?= $row->account_name?></td>  
										 <td><?= $row->account_id?></td> 
										 <td><?= $row->total_leads?></td> 
										 <td>
										 <?php
                                         switch (true) {
										 case ($row->account_status == 1):
										 echo '<form action="'.base_url('ManageAccounts/update_status/'.$row->id).'"><input type="hidden" name="status" value="0"><button type="submit" name="update_status" class="btn green">Active</button></form>' ;
										 break;
										 case ($row->account_status == 0):
										 echo '<form action="'.base_url('ManageAccounts/update_status/'.$row->id).'"><input type="hidden" name="status" value="1"><button type="submit" name="update_status" class="btn red">Disabled</button></form>' ;
										 break;
									     }
										  ?>
										  </td>
										  <td><?php  if(isset($row->item) && count($row->item) > 0); ?>
										  <?php print_r(implode("," , unserialize($row->item))); ?></td>
										<td>										
										<div class="actions">
                                            <a href="<?php echo base_url('ManageAccounts/edit_record/'.$row->id); ?>"class="btn btn-circle green btn-icon-only btn-default"  >
                                            <i class="fa fa-pencil"></i>
                                            </a>
                                            <a  href="javascript:void(0)" onclick="if(confirm('Do you really want to delete this account ?')){location='<?php echo base_url('ManageAccounts/remove/'). $row->id; ?>';}" class="btn btn-circle red btn-icon-only btn-default">
                                          <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>												
										</td>
										
									</tr>
									<?php endforeach; ?>
                                    </tbody>
                                    </table>
									</div> 
		<?php  echo $this->pagination->create_links(); ?>									
									</div>
                            </div>
							</div>
							</div>
							</div>
							</div>
							<?php 
		$this->load->view('common/css_other'); 
		$this->load->view('common/home_css'); 
	 $this->load->view('common/common_js');
	 $this->load->view('common/theme_js');
	 ?>