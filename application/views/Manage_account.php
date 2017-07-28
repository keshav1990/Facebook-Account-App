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
                                <a href="index.html">Manage Accounts</a>
                                
                            </li>
                           
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 ">
						<div class="portlet box red">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs"></i>Table </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <div id="sample_3_wrapper" class="dataTables_wrapper no-footer">
									<div class="row">
									<div class="col-md-8 col-sm-8">
									<div class="btn-group">
                                                    <a href="<?php echo base_url('ManageAccounts/create_account'); ?>" id="sample_editable_1_2_new" class="btn sbold red"> Add New
                                                        <i class="fa fa-plus"></i></a>
                                                    
                                                </div>
									</div>
									<div class="col-md-4 col-sm-4"><div id="sample_3_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm input-small input-inline" placeholder="" aria-controls="sample_3"></label></div></div></div><div class="table-scrollable">
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
										 echo '<button type="button" class="btn green-haze">Active</button>' ;
										 break;
										 case ($row->account_status == 0):
										 echo '<button type="button" class="btn red-haze">Disable</button>';
										 break;
									     }
										  ?>
										<td>										
										<div class="actions">
                                            <a href="<?php echo base_url('ManageAccounts/edit_record/'.$row->id); ?>"class="btn btn-circle green btn-icon-only btn-default"  >
                                            <i class="icon-wrench"></i>
                                            </a>
                                            <a  href="javascript:void(0)" onclick="if(confirm('Do you really want to delete this user ?')){location='<?php echo base_url('ManageAccounts/remove/'). $row->id; ?>';}" class="btn btn-circle red btn-icon-only btn-default">
                                             <i class="icon-trash"></i>
                                            </a>
                                        </div>												
										</td>
										
									</tr>
									<?php endforeach; ?>
                                    </tbody>
                                    </table>
									</div>              
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