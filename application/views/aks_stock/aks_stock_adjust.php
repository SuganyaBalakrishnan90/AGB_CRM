<?php $this->load->view("common");?>
<style>
	.dataTables_scroll
    {
        position: relative;
        overflow: auto;
        max-height: 300px;/*the maximum height you want to achieve*/
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
	<body 
		data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Adjust Stock
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--begin::Description-->
									<!--end::Description--></h1>
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
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="row">
														<label class="col-lg-2 col-form-label fw-semibold fs-6 required">Category</label>
													    	<div class="col-lg-3 fv-row fv-plugins-icon-container mb-10">
																<select class="form-select form-select-solid" name="category_select" id="category_select" data-control="select2" data-hide-search="true" onchange="category_selected()">
																	<option value="all" selected>All</option>
																	<?php foreach($category_list1 as $category_list)
																	{?>
																	<option value="<?php echo $category_list['AKSCATEGORY_ID'] ;?>" <?php if($category_list1==$category_list['AKSCATEGORY_NAME']){ echo "selected"; } ?>
																	><?php echo $category_list['AKSCATEGORY_NAME'];?></option><?php
																	 }?>
																	
													            </select>
															</div>	
													</div>
											<!--begin::Table-->
											<form method="POST" action="<?php echo base_url(); ?>aks_stock/stock_update">
											<table id="adjust_table" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 mb-20 dataTable ">
												<thead>
												  <tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-50px">Sno</th>
														<th class="min-w-50px">Product</th>
														<th class="min-w-50px">Current Qty</th>
														<th class="min-w-100px">Adjust Stock</th>
													</tr>    
												</thead>
												<tbody class="text-gray-600 fw-semibold" id="cat_change">

												</tbody>

											</table>

											<div class="d-flex justify-content-md-end mt-13">
						                      <button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>

											  <button type="submit" class="btn btn-primary">Update Stock</button>

											</div>

										</form>
										<!--end::Card body-->
									    </div></div>
									<!--end::Tables Widget 9-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>		

<!--start::Modal - delete  Products--><!--begin::Modal - delete Products-->
			<div class="modal fade" id="kt_modal_delete_aks_products" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-m">
					<!--begin::Modal content-->
					<div class="modal-content rounded">
						<div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
							<div class="swal2-icon-content">!</div></div>
							<div class="swal2-html-container" id="swal2-html-container" style="display: block;">Are you sure you want to delete?</div>
							<div class="d-flex flex-center flex-row-fluid pt-12">
								<button type="submit" class="btn btn-danger me-3" data-bs-dismiss="modal">Yes, delete!</button>
								<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No,cancel</button>
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
					
					category_selected()


		function category_selected(){

			// var category_type = document.getElementById("category_select").value;
			// alret (category_type);
			var val= $("#category_select").val();
			var baseurl= $("#baseurl").val();
			// alert(val);
			$.ajax({
				type: "POST",
				url: baseurl+'aks_stock/category_select',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{


					// alert(response);
					// var res=response.split('||');
				
					$("#cat_change").empty().append(response);


				
				}
				});

		}
	</script>
				<script>
					$("#kt_datatable_responsive").DataTable({
						
						"responsive": true,
						"aaSorting":[],
						 "language": {
						  "lengthMenu": "Show _MENU_",
						 },
						 "dom":
						  "<'row'" +
						  "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
						  "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
						  ">" +

						  "<'table-responsive'tr>" +

						  "<'row'" +
						  "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
						  "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
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
			    <script>

						$("#kt_daterangepicker_lot_entry_from").flatpickr({
										dateFormat: "d-m-Y",
									});
						$("#kt_daterangepicker_lot_entry_to").flatpickr({
										dateFormat: "d-m-Y",
									});
						$("#kt_daterangepicker_lot_entry_add_date").flatpickr({
										dateFormat: "d-m-Y",
									});
						$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
										dateFormat: "d-m-Y",
									});
						$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
										dateFormat: "d-m-Y",
									});

				</script>
				<script>
					$("#adjust_table").DataTable({
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
					$('#adjust_table').wrap('<div class="dataTables_scroll" />');
				</script>
    </body>
	<!--end::Body-->
</html>