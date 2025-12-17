<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 218px;/*the maximum height you want to achieve*/
        width: 100%;
    }
  .dataTables_scroll thead{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    background-color: #fff;
    z-index: 2;
  }

</style>
	<!--begin::Body-->
	<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Theme mode setup on page load-->
		<script>if ( document.documentElement ) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + ( name !== null ? name + "_" : "" ) + "theme_mode_value"); if ( themeMode === null ) { if ( defaultThemeMode === "system" ) { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<?php $this->load->view("sidebar");?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header");?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Products 
										<!--begin::Separator-->
										<!--end::Description-->
									</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Page title-->
							
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->	
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Row-->
							<div class="row gy-5 g-xl-8">
								<!--begin::Col-->
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										
											<?php if($this->session->flashdata('g_success')){?>
					                        <div class="alert alert-success" id="alertaddmessage">
					                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					                        <?php echo $this->session->flashdata('g_success'); ?>
					                        </div>
					                        <?php } ?>

					                        <?php if($this->session->flashdata('g_err')){?>
					                        <div class="alert alert-success" id="alertaddmessage">
					                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
					                        <?php echo $this->session->flashdata('g_err'); ?>
					                        </div>
					                        <?php } ?>	
					                    
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Heading-->
											<div class="mb-10 text-center"></div>
											<!--end::Heading-->
										<div class="row">

											<div class="col-lg-7">
												<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>/aksproduct_master/product_save" enctype="multipart/form-data" onsubmit="return product_validation();">
													<div class="row">
														<label class="col-lg-3 col-form-label fw-semibold fs-6 required">Category</label>
												    	<div class="col-lg-3 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="add_cat_name"  id="add_cat_name">	
																	<option value="0">Select</option>
																	<?php foreach($category_list as $category_list)
																	{?>
																	<option value="<?php echo $category_list['AKSCATEGORY_ID'] ;?>"><?php echo $category_list['AKSCATEGORY_NAME'];?></option><?php
																	 }?>
													        </select>
													        <div class="fv-plugins-message-container invalid-feedback" name="prd_cat_err" id="prd_cat_err"></div>
														</div>	
													
													<label class="col-lg-3 col-form-label fw-semibold fs-5 required">Product Name</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container ">
															<input type="text" name="add_prd_name" id="add_prd_name" class="form-control form-control-lg form-control-solid fs-5" placeholder="Product Name" >
															<div class="fv-plugins-message-container invalid-feedback" name="prd_name_err" id="prd_name_err" ></div>
														</div>

										         </div>
												 <div class="row">
												 	<label class="col-lg-3 col-form-label fw-semibold fs-5 required">HSN Code</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container ">
															<input type="text" name="prd_hsn_code" id="prd_hsn_code" class="form-control form-control-lg form-control-solid fs-5" placeholder="Enter HSN Code" >
															<div class="fv-plugins-message-container invalid-feedback" name="prd_hsn_err" id="prd_hsn_err" ></div>
														</div>	
												 	
													 <label class="col-lg-3 col-form-label fw-semibold fs-6 required">Product Weight</label>
															<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container ">
															<input type="text" name="add_prd_wt" id="prd_wgt" class="form-control form-control-lg form-control-solid " placeholder="Weight In Gram"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback" name="prd_wgt_err" id="prd_wgt_err"></div>
														</div>
													  	  		
												 </div>

												 <div class="row">
												 	<label class="col-lg-3 col-form-label fw-semibold fs-6 required">Purchase Price</label>
														<div class="col-lg-3 fv-row fv-plugins-icon-container ">
															<input type="text" name="add_pur_price" id="prd_pp" class="form-control form-control-lg form-control-solid " placeholder="Price per Gram"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
															<div class="fv-plugins-message-container invalid-feedback" id="prd_pp_err"></div>
														</div>
												 	<label class="col-lg-3 col-form-label fw-semibold fs-6 required">Sale Price</label>
															<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container ">
															<input type="text" name="add_prd_price" id="prd_sp" class="form-control form-control-lg form-control-solid " placeholder="Price per Gram"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
															<div class="fv-plugins-message-container invalid-feedback" id="prd_sp_err"></div>
														</div>
														
															
												</div>	
												<div class="row">
														<label class="col-lg-3 col-form-label fw-semibold fs-6 required">Min stock Alert</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container ">
															<input type="text" name="add_prd_min_stk" id="prd_min" class="form-control form-control-lg form-control-solid " placeholder="Min Stock"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
															<div class="fv-plugins-message-container invalid-feedback" id="prd_min_err"></div>
														</div>
														<label class="col-lg-3 col-form-label fw-semibold fs-6 required">Max Stock Alert</label>
															<!--end::Label-->
															<!--begin::Col-->
															<div class="col-lg-3 fv-row fv-plugins-icon-container ">
																<input type="text" name="add_prd_max_stk" id="prd_max" class="form-control form-control-lg form-control-solid " placeholder="Max stock"  oninput="this.value = this.value.replace(/[^/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																<div class="fv-plugins-message-container invalid-feedback" id="prd_max_err"></div>
															</div>
													    <label class="col-lg-3 col-form-label fw-semibold fs-6 required">Details</label>
															<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<div class="fv-row fv-plugins-icon-container ">
														<textarea class="form-control form-control-solid fs-5" rows="2" placeholder="Details" name="add_prd_details" id="prd_detail"></textarea></div>
														<div class="fv-plugins-message-container invalid-feedback" id="prd_detail_err"></div>
														</div>	
													</div>
											</div>
											<div class="col-lg-5">
											<div class="row">
											  <label class="col-lg-6 col-form-label fw-semibold fs-6 required">Product Image</label>
													<!--end::Label-->
													<!--begin::Col-->
										            <div class="col-lg-6 fv-row" style="margin-top: 7px !important;">

														<div class="image-input image-input-outline" data-kt-image-input="true">
															<div class="image-input-wrapper" style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg)"></div>
															<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-pencil-fill fs-10"></i>
																<input type="file" name="prd_img"  id="prd_img" accept=".png, .jpg, .jpeg">
																<input type="hidden"  class="fv-plugins-message-container invalid-feedback" name="" id="">
																
															</label>
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-6"></i>
															</span>
															<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
																<i class="bi bi-x fs-6"></i>
															</span>
															<div class="fv-plugins-message-container invalid-feedback" id="prd_img_err"></div>

														</div>
												    </div>
												</div>	
										    </div>
							     		</div>
										    <div class="d-flex flex-end flex-row-fluid pt-12">
											<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-primary">Save Product</button>
					               	        </div>
									</div>		
								</form>
										<!--end::Card body-->
									</div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
				   <?php $this->load->view("footer");?>
					<!--end::Content-->
				</div>

				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
	
	<!--begin::Modal - New 	purchase-->
	
	<!--end::Modal - New purchase-->
	<!--begin::Modal - delete Products-->
	<div class="modal fade" id="kt_modal_delete_aks_products" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-m">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
					<div class="swal2-icon-content">!</div></div>
					<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete?</div>
					<div class="d-flex flex-center flex-row-fluid pt-12">
						<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">No,cancel</button>
						<button type="submit" class="btn btn-primary " data-bs-dismiss="modal">Yes, delete!</button>
					</div><br><br>
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>

	<!--end::Modal - delete Products-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	    <?php $this->load->view("script");?>
		<!-- <script src="js/products-list.js"></script> -->
		<script>
			$("#kt_datatable_responsive").DataTable({
				
				"responsive": true,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  // "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  // "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  // "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  // "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
		</script>
		<script>
	      $("#kt_datatable_responsive").kendoTooltip({
	        filter: "td",
	        show: function(e){
	          if(this.content.text() !=""){
	            $('[role="tooltip"]').css("visibility", "visible");
	          }
	        },
	        hide: function(){
	          $('[role="tooltip"]').css("visibility", "hidden");
	        },
	        content: function(e){
	          var element = e.target[0];
	          if(element.offsetWidth < element.scrollWidth){
	            return e.target.text();
	          }else{
	            return "";
	          }
	        }
	      })
	    </script>
		
		<!-- non tag list day fillter end -->
		<!-- non tag wallet day fillter start -->
		
		 <script>
			$("#view_table_scroll").DataTable({
				//"aaSorting":[],
				"sorting":false,
				"paging": false,
				// "responsive": true,
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
				  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
				  ">"
				});
			$('#view_table_scroll').wrap('<div class="dataTables_scroll" />');
		</script>
		<script>
			function product_validation()
			{
				var err = 0;
				var prd_hsn_code = $('#prd_hsn_code').val();
				var add_cat_name = $('#add_cat_name').val();
				var add_prd_name = $('#add_prd_name').val();
				var prd_wgt       = $('#prd_wgt').val();
				var prd_sp        = $('#prd_sp').val();
				var prd_pp        = $('#prd_pp').val();
				var prd_min       = $('#prd_min').val();
				var prd_max       = $('#prd_max').val();
				var prd_detail    = $('#prd_detail').val();
				var prd_img       = $('#prd_img').val();

				if(prd_hsn_code.trim()=='')
			    {
			        $('#prd_hsn_err').html('Enter HSN Code!');
			        err++;
			    }
			    else
			    {
			       
					$('#prd_hsn_err').html('');
					
			    }

				if(add_cat_name == 0)
			    {
			        $('#prd_cat_err').html('Please Select Category!');
			        err++;
			    }
			    else
			    {
					$('#prd_cat_err').html('');
			    }

			    if(add_prd_name.trim()=='')
			    {
			        $('#prd_name_err').html('Enter Product Name!');
			        err++;
			    }
			    else
			    {
			       
					$('#prd_name_err').html('');
					
			    }
			    if(prd_wgt.trim()=='')
			    {
			        $('#prd_wgt_err').html('Enter Product Weight !');
			        err++;
			    }
			    else
			    {
					$('#prd_wgt_err').html('');
			    }
			    if(prd_sp.trim()=='')
			    {
			        $('#prd_sp_err').html('Enter Sale Price !');
			        err++;
			    }
			    else
			    {
					$('#prd_sp_err').html('');
			    }
			    if(prd_pp.trim()=='')
			    {
			        $('#prd_pp_err').html('Enter Product Purchase 	Price !');
			        err++;
			    }
			    else
			    {
					$('#prd_pp_err').html('');
			    }
			    if(prd_min.trim()=='')
			    {
			        $('#prd_min_err').html('Enter Minimum Stock Alert!');
			        err++;
			    }
			    else
			    {
					$('#prd_min_err').html('');
			    }
			    if(prd_max.trim()=='')
			    {
			        $('#prd_max_err').html('Enter Maximum Stock Alert!');
			        err++;
			    }
			    else
			    {
					$('#prd_max_err').html('');
			    }
			   	if(prd_detail.trim()=='')
			    {
			        $('#prd_detail_err').html('Enter Product Details !');
			        err++;
			    }
			    else
			    {
					$('#prd_detail_err').html('');
			    }
			    if(prd_img.trim()=='')
			    {
			        $('#prd_img_err').html('select Image !');
			        err++;
			    }
			    else
			    {
					$('#prd_img_err').html('');
			    }
			   
			     if(err>0){ return false; }else{ return true; }
			}		
		</script>
	</body>
	<!--end::Body-->
</html>