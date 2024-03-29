<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="min-height: 1434px;">
                    <!-- BEGIN PAGE HEADER-->
               
                    <h1 class="page-title"> Manage Account
                        
                    </h1>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <span>Manage Accounts</span>
                                
                            </li>
                           
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 ">
						<div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Manage Accounts </div>
                                   
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
									<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_3" role="grid" aria-describedby="sample_3_info">
                                        <thead>
                                            <tr role="row">
											
							
									   <tr>
											<th> # </th>
											<th>Account Name</th>
											<th>Account Id</th>
											<th>Total Leads</th>
											<th>Account Status</th>
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
<?php echo $this->pagination->create_links(); ?>									
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