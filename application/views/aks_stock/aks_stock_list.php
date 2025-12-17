<?php $this->load->view("common");?>
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Stock List
									<!--begin::Separator-->
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Category &emsp;-</span>
										<span>&emsp;<?php if($category_name==''){ echo "All"; }else{ echo $category_name; } ?></span>
									</label><span class="h-20px border-gray-400 border-start ms-3 mx-2"></span><!-- 
									<span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Date &emsp;-</span>
										<span>&emsp;Today</span>
									</label> -->
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
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
										<!--begin::Card body-->
										<div class="card-body py-4">
												<!--begin::Card title-->
										<!-- <div class="row">
											<div class="col-lg-8">
												<div class="row">
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Product Count</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold">255</label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Gold</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold">150</label>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="text-center">
															<label class="form-label fs-3 fw-bold">Platinum</label>
														</div>
														<div class="text-center">
															<label class="text-success fs-2 fw-bold">296</label>
														</div>
													</div>
												</div>
											</div> -->
											<div class="col-lg-12">
												<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
													<!--begin::Filter-->
													<button type="button" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Filter
													</button>
													<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
														<div class="px-7 py-5" data-kt-user-table-filter="form">
															<form method="POST" action="<?php echo base_url(); ?>aks_stock/">
															<div class="mb-2">
																<label class="form-label fs-6 fw-semibold">Category</label>
																	<!-- <select class="form-select form-select-solid" name="" id="" data-control="select2" data-hide-search="true">	
																		<option value="all" selected>All</option>
																		<?php //foreach($category_list1 as $category_list1)
																	{?>
																	<option value="<?php// echo $category_list1['AKSCATEGORY_ID'] ;?>" <?php// if($category_list1==$category_list1['AKSCATEGORY_NAME']){ //echo "selected"; } ?>
																	><?php //echo $category_list1['AKSCATEGORY_NAME'];?></option><?php
																	 }?>
														            </select> -->


														            <select class="form-select form-select-solid"data-control="select2" data-hide-search="true" id="category_name" name="category_name">	
																	<option value="">All</option>
																	<?php foreach($category_list as $clist)
																	{?>
																	<option value="<?php echo $clist['AKSCATEGORY_ID']; ?>" >

																		<?php echo $clist['AKSCATEGORY_NAME']; ?></option>

																	<?php  }?>
																   </select>
															</div>
															<div class="d-flex justify-content-end">
																<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
																<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
															</div>
														</form>
														</div>
													</div>
													<button type="button"class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-3"data-bs-toggle="modal" data-bs-target="#">Export
													</button>
												</div>
											</div>
										
										<!--end::Card title-->
									     <!--begin::Table-->
											<table id="" class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-1 gs-2 dataTable no-footer">
												<thead>
												  <tr class="text-start text-muted fw-bold fs-7 gs-0">
														<th class="min-w-50px">Sno</th>
														<th class="min-w-100px">Category</th>
														<th class="min-w-100px">Product</th>
														<th class="min-w-100px">Current Stock</th>
														<th class="min-w-100px">Stock Status</th>
														<th class="min-w-100px">Action</th>
												  </tr>  
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<?php  foreach($category_fill as $i=> $plist){?>
														<td><?php echo $i+1; ?></td>
														<td><?php echo $plist['AKSCATEGORY_NAME'];?></td>
														<td class="d-flex align-items-center"> 
														<?php $image_url =  base_url().'assets/images/aks_product_image/'. $plist['AKS_PRD_IMG']; 
												           if(@getimagesize($image_url)){
												         	?>
	                                                       <a href="<?php echo base_url() ?>assets/images/aks_product_image/<?php echo 
	                                                       $plist['AKS_PRD_IMG'];  ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-fslightbox="lightbox-basic<?php echo $i; ?>" data-bs-toggle="modal"  onclick="image_view('<?php echo $plist['AKS_PRD_IMG']; ?>')">

												            	    <div class="image-input" data-kt-image-input="true">
																	  <div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/aks_product_image/<?php echo $plist['AKS_PRD_IMG']; ?>)">
																	  </div>
																	 </div>
															</a>
 	                                                        <?php 
                                                              }else{
	                                                           ?>
                                                           <a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"  >
										                      	<div class="image-input" data-kt-image-input="true">
																			<div class="image-input-wrapper w-40px h-40px" style="background-image: url(<?php echo base_url() ?>assets/images/karupatti.jpg)"></div>
																		</div>
															</a>
 	
	                                                       <?php }?>		
															 <div class="d-flex flex-column">
																	<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1 "><?php echo $plist['AKS_PRD_NAME'];?></a>
															 </div>
														</td>
														
														<td><?php echo $plist['PRD_CUR_QTY'];?></td>
															<td>

															<?php if($plist['PRD_CUR_QTY'] < $plist['AKS_MIN_STK'] ){ ?>

														<label class="col-form-label fw-semibold fs-7"><span style="background-color:#f1416c;border-radius: 5px;padding: 2px 5px 2px 5px;">Low Stock</span>
															</label>
														<?php } else{?>



														<?php if($plist['PRD_CUR_QTY'] > $plist['AKS_MAX_STK'] ){ ?>
														<label class="col-form-label fw-semibold fs-7 me-3"><span style="background-color:#eb5d14;border-radius: 5px;padding: 2px 5px 2px 5px;">Surplus</span>
															</label>
													
														<?php } }?>
														
														</td>

														<!--begin::Action=-->
														<td>
														<span class="text-end">
															<a href="<?php echo base_url();?>aks_stock/stock_history/<?php echo $plist['AKS_PRD_MID']; ?>" target="_blank"
																class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
																<i class="fas fa-history eyc fs-4" title="Stock History" ></i>
														    </a>
														</span>
														<!--end::Action=-->
													    </td>
													</tr>
													<?php $i++; }?>
												
													
												</tbody>
											</table>
											<?php 
												$coun = ceil( $count/10);
												$c_page = isset($_GET['page']) ? $_GET['page'] : 1;
											?>
											<?php $paging_info = get_paging_info1($count,10,$c_page); ?>

														<form   method="POST" id="filter_form" action="" enctype="multipart/form-data" >
															
															

															<input type="hidden" id="category_name" name="category_name"  value="<?php echo $category_name; ?>">

															
														<ul class="pagination " style="float:right;" >
														<!-- If the current page is more than 1, show the First and Previous links -->
														<?php if($paging_info['curr_page'] > 1) : ?>
														
														<li class='paginate_button page-item move_to' value="<?php echo ($paging_info['curr_page'] - 1); ?>" > <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link'  title='Page <?php echo ($paging_info['curr_page'] - 1); ?>'><</a></li>
														
														<?php endif; ?>

														<?php
															//setup starting point

															//$max is equal to number of links shown
															$max = 3;
															if($paging_info['curr_page'] < $max)
																$sp = 1;
															elseif($paging_info['curr_page'] >= ($paging_info['pages'] - floor($max / 2)) )
																$sp = $paging_info['pages'] - $max + 1;
															elseif($paging_info['curr_page'] >= $max)
																$sp = $paging_info['curr_page']  - floor($max/2);
														?>

														<!-- If the current page >= $max then show link to 1st page -->
														<?php if($paging_info['curr_page'] >= $max) : ?>

														<li class='paginate_button page-item move_to' value="1" ><a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' class='page-link' onclick="form_submit()"  title='Page 1'>1</a></li>
														<!--<li class='paginate_button page-item '><input type="submit" name="first_page" value="Update" />  </li>-->
														..
														<?php endif; ?>
														<!-- Loop though max number of pages shown and show links either side equal to $max / 2 -->
														<?php for($i = $sp; $i <= ($sp + $max -1);$i++) : ?>

															<?php
																if($i > $paging_info['pages'])
																	continue;
															?>

															<?php if($paging_info['curr_page'] == $i) : ?>

																<li class='paginate_button page-item active move_to' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link'  
																title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php else : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo $i; ?>"> <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="form_submit()" class='page-link'  title='Page <?php echo $i; ?>'><?php echo $i; ?></a></li>

															<?php endif; ?>

														<?php endfor; ?>
														<!-- If the current page is less than say the last page minus $max pages divided by 2-->
														<?php if($paging_info['curr_page'] < ($paging_info['pages'] - floor($max / 2))) : ?>

															..
															<li class='paginate_button page-item  move_to' value="<?php echo $paging_info['pages']; ?>"><a  aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link'   title='Page <?php echo $paging_info['pages']; ?>'><?php echo $paging_info['pages']; ?></a></li>

														<?php endif; ?>

														<!-- Show last two pages if we're not near them -->
														<?php if($paging_info['curr_page'] < $paging_info['pages']) : ?>

															<li class='paginate_button page-item move_to ' value="<?php echo ($paging_info['curr_page'] + 1); ?>">  <a aria-controls='kt_roles_view_table' data-dt-idx='1' tabindex='0' onclick="submit()" class='page-link'  title='Page <?php echo ($paging_info['curr_page'] + 1); ?>'>></a></li>

														

														<?php endif; ?>
														</ui>
														</form>
														<?php
														function get_paging_info1($tot_rows,$pp,$curr_page)
														{
															$pages = ceil($tot_rows / $pp); // calc pages

															$data = array(); // start out array
															$data['si']        = ($curr_page * $pp) - $pp; // what row to start at
															$data['pages']     = $pages;                   // add the pages
															$data['curr_page'] = $curr_page;               // Whats the current page
															$paging_info['curr_url'] = "http://eibs.elysiumproduct.com/";

															return $data; //return the paging data

														}?>
										</div>
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
					<!--end::Content-->
				<?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
<!--begin::View_stock_Products-->
	<div class="modal fade" id="kt_view_purchase" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-lg">
			<!--begin::Modal content-->
			<div class="modal-content rounded">
				<!--begin::Modal header-->
				<div class="modal-header justify-content-end border-0 pb-0">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
					<!--begin::Heading-->
					<div class="mb-10 text-center">
						<h1>View Purchase</h1>	
					</div>
					<!--end::Heading-->
						
				<diV class="row">
					<div class="col-lg-4">
						<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;"> -->
							<div class="row">
								
								<div class="d-flex align-items-center">
									<div class="symbol symbol-circle symbol-100px overflow-hidden me-3">
									 <a href="javascript:;">
										<div class="symbol-label">
										 <img src="assets/images/1_kg_old_jaggery.jpeg" class="w-fit" />
										</div>
										</a>
									</div>
								</div>
								<div  class="fw-bold fs-5 fs-xl-1">Old Jaggery</div>
								
							</div>
						 <!-- </div>-->	
				    </div>
				

					<div class="col-lg-8">
						<!-- <div class="px-4" style="border-radius: 10px;padding-bottom: 20px;box-shadow: 0 5px 10px #00002947;"> -->

						  <div class="row">
							<label class="col-lg-4 col-form-label  fw-semibold fs-6">Size/Wgt</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<label class="col-lg-10 col-form-label fw-bold fs-5">250 g</label>
						    </div>
						  </div> 
						  <div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Date</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<label class="col-lg-10 col-form-label fw-bold fs-5">23-03-2023</label>
							</div>
						  </div>
						  <div class="row">
							<label class="col-lg-4 col-form-label  fw-semibold fs-6">Current Stock</label>
							<div class="col-lg-4 fv-row fv-plugins-icon-container">
								<label class="col-lg-10 col-form-label fw-bold fs-5">100</label>
							</div>
						  </div>
					    <!-- </div> -->
					</div>		 
				</diV>

			</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
<!--end::View_stock_Products-->
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

		$(document).ready(function() {
			
			$(".move_to").on("click", function () {
				value=$(this).val();
				// alert(value);
				$('#filter_form').attr('action', "<?php echo base_url(); ?>aks_stock?page="+value);
				$("#filter_form").submit();
				e.preventDefault();
			});
		});
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
			function date_fill_nontag_list()
			{
				var dt_fill_nontag_list = document.getElementById('dt_fill_nontag_list').value;
				var today_dt_nontag_list = document.getElementById('today_dt_nontag_list');
				var week_from_dt_nontag_list = document.getElementById('week_from_dt_nontag_list');
				var week_to_dt_nontag_list = document.getElementById('week_to_dt_nontag_list');
				var monthly_dt_nontag_list = document.getElementById('monthly_dt_nontag_list');
				var from_dt_nontag_list = document.getElementById('from_dt_nontag_list');
				var to_dt_nontag_list = document.getElementById('to_dt_nontag_list');
				var from_date_fillter_nontag_list = document.getElementById('from_date_fillter_nontag_list');
				var to_date_fillter_nontag_list = document.getElementById('to_date_fillter_nontag_list');

				if (dt_fill_nontag_list == "today") 
				{
					today_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#today_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_list == "week")
				{
					today_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "block";
					week_to_dt_nontag_list.style.display = "block";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_list').val(firstday);
					$('#week_to_date_fillter_nontag_list').val(lastday);
					
				}
				else if (dt_fill_nontag_list == "monthly")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "block";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
					$("#monthly_date_fillter_nontag_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_nontag_list == "custom_date")
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "block";
					to_dt_nontag_list.style.display = "block";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";

					$("#from_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_list.style.display = "none";
					monthly_dt_nontag_list.style.display = "none";
					from_dt_nontag_list.style.display = "none";
					to_dt_nontag_list.style.display = "none";
					week_from_dt_nontag_list.style.display = "none";
					week_to_dt_nontag_list.style.display = "none";
				}
			}
		</script>
		<!-- non tag list day fillter end -->
		<!-- non tag wallet day fillter start -->
		<script>
			function date_fill_nontag_wallet()
			{
				var dt_fill_nontag_wallet = document.getElementById('dt_fill_nontag_wallet').value;
				var today_dt_nontag_wallet = document.getElementById('today_dt_nontag_wallet');
				var week_from_dt_nontag_wallet = document.getElementById('week_from_dt_nontag_wallet');
				var week_to_dt_nontag_wallet = document.getElementById('week_to_dt_nontag_wallet');
				var monthly_dt_nontag_wallet = document.getElementById('monthly_dt_nontag_wallet');
				var from_dt_nontag_wallet = document.getElementById('from_dt_nontag_wallet');
				var to_dt_nontag_wallet = document.getElementById('to_dt_nontag_wallet');
				var from_date_fillter_nontag_wallet = document.getElementById('from_date_fillter_nontag_wallet');
				var to_date_fillter_nontag_wallet = document.getElementById('to_date_fillter_nontag_wallet');

				if (dt_fill_nontag_wallet == "today") 
				{
					today_dt_nontag_wallet.style.display = "block";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
					$("#today_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_nontag_wallet == "week")
				{
					today_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "block";
					week_to_dt_nontag_wallet.style.display = "block";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_nontag_wallet').val(firstday);
					$('#week_to_date_fillter_nontag_wallet').val(lastday);
					
				}
				else if (dt_fill_nontag_wallet == "monthly")
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "block";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
					$("#monthly_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_nontag_wallet == "custom_date")
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "block";
					to_dt_nontag_wallet.style.display = "block";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";

					$("#from_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_nontag_wallet").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_nontag_wallet.style.display = "none";
					monthly_dt_nontag_wallet.style.display = "none";
					from_dt_nontag_wallet.style.display = "none";
					to_dt_nontag_wallet.style.display = "none";
					week_from_dt_nontag_wallet.style.display = "none";
					week_to_dt_nontag_wallet.style.display = "none";
				}
			}
		</script>
	</body>
	<!--end::Body-->
</html>