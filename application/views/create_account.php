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
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Add Account</span>
                                    </div>
                                 </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                           <div >
                                            <div class="form-group  col-md-6">
                                                <label>Account Name</label>
                                                <div >
                                                   
                                                    <input type="text" name="account_name" class="form-control spinner" placeholder="Account Name"> </div>
                                            </div>
                                           <div class="form-group  col-md-6">
                                                <label>Account ID</label>
                                                <div>
                                                   
                                                    <input type="text" name="account_id" class="form-control spinner" placeholder="Account ID"> </div>
                                            </div>
                                            </div>
                                         <div class="form-group  col-md-6">
                                                <label>Total No. of Lead's Need To Send</label>
                                                <input class="form-control spinner" value="100" name="total_leads" type="text" > 
												</div>
                                          
                                            <div class="form-group  col-md-6">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
													<option>Active</option>
                                                    <option>Disabled</option>
                                                    
                                                </select>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Add Account</button>
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
	 