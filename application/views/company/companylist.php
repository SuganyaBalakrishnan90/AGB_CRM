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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Company List
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
								<!--begin::Card header-->
								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										
									</div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
											
											<!--begin::Add user-->
											 	
											<button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
											<span class="svg-icon svg-icon-2">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
													<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->New Company</button>
											<!--end::Add user-->
										</div>
									<!--end::Toolbar-->
								
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->

								<!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed table-striped table-hover fs-6 gy-5" id="kt_datatable_dom_positioning">
										<!--begin::Table head-->
										<thead>
											<!--begin::Table row-->
											<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
													
												<th class="min-w-125px">Company Name & Code</th>
												<th class="min-w-125px">City</th>
												<th class="min-w-125px">Phone </th>
												<th class="min-w-125px">Email</th>
												<th class="min-w-125px">Business Type</th>
												<th class="min-w-125px">Status</th>
												<th class="min-w-125px"><span class="text-end">Actions</span></th>
											</tr>
											<!--end::Table row-->
										</thead>
										<!--end::Table head-->
										<!--begin::Table body-->
										<tbody class="text-gray-600 fw-semibold">
											<!--begin::Table row-->
											
												<?php
												$i=1;
												foreach($c_settings as $company_settings)
												{

												
												?>
											<tr>
												<!--begin::User=-->
												<td class="d-flex align-items-center">
													<!--begin:: Avatar -->
													<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
														<a href="javascript:;">
															<div class="symbol-label">
																<img src="assets/images/favicon_agb.jpg" alt="Emma Smith" class="w-100" />
															</div>
														</a>
													</div>
													<!--end::Avatar-->
													<!--begin::User details-->
													<div class="d-flex flex-column">
														<a href="javascript:;" class="text-gray-800 text-hover-primary mb-1"><?php echo $company_settings['COMPANYNAME']; ?></a>
														<span><?php echo $company_settings['LOGINCODE']; ?></span>
													</div>
													<!--begin::User details-->
												</td>
												<!--end::User=-->
												<!--begin::Role=-->
												<td><?php echo $company_settings['CITY']; ?></td>
												<!--end::Role=-->
												<!--begin::Last login=-->
												<td>
													<?php echo $company_settings['PHONE']; ?>
												</td>
												<!--end::Last login=-->
												<!--begin::Two step=-->
												<td><?php echo $company_settings['EMAIL']; ?></td>
												<!--end::Two step=-->
												<!--begin::Joined-->
												<td>
													<?php 
														if($company_settings['BUSINESS_TYPE']==0){
														echo "JEWEL LOAN BUSINESS"; }
														else if($company_settings['BUSINESS_TYPE']>0)  {
															echo "OTHER BUSINESS";
														}
													?>
														
												</td>
												<!--begin::Joined-->
												<td>
													<label class="form-check form-switch form-check-custom form-check-solid">
															<input class="form-check-input" type="checkbox" id="activeunactive_<?php echo $i;?>"  name="activeunactive_<?php echo $i;?>" onchange="activeunactive('<?php echo $company_settings['COMPANYCODE']; ?>',<?php echo $i; ?>)" value=
															<?php 
															if($company_settings['ACTIVE']=='Y')
															{ echo "'1' checked='checked'";}
															else if($company_settings['ACTIVE']=='N')
															{ echo "'0'";}
															?> 
															 >
													</label>
													
												</td>
												<!--begin::Action=-->
												<td>
													<span class="text-end">
													<a href="" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_view_company" onclick="company_view('<?php echo $company_settings['COMPANYCODE']; ?>')">
														<i class="bi bi-eye-fill eyc"></i>
													</a>
													<a href="editcompany.php" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_company" onclick="company_edit('<?php echo $company_settings['COMPANYCODE']; ?>')">
																		<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
																				<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a>
													<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_company" onclick="company_delete('<?php echo $company_settings['COMPANYCODE'];?>')">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</a></span>
												</td>
												<!--end::Action=-->
											</tr>
											<!--end::Table row-->
											<?php 
											 	$i++;
												}
											?>
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
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
		<!--end::Root-->
		<!--begin::Modal - add company-->
		<div class="modal fade" id="kt_modal_upgrade_plan" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
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
					<form name="company_add_form" id="company_add_form" method="POST" action="<?php echo base_url(); ?>company/company_save" enctype="multipart/form-data" onsubmit="return company_validation();">

						<?php
							$qry=$this->db->query("SELECT TOP 1 COMPANYCODE FROM COMPANY ORDER BY COMPANYCODE DESC");
							$res=$qry->row();
							$last_data= $res->COMPANYCODE;
                            $next_value = (int)$last_data + 1;
                            $c_no1=str_pad($next_value,3,0,STR_PAD_LEFT);
						?>
						<input type="hidden" id="company_id" name="company_id" value="<?php echo $c_no1;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">New Company</h1>
							<div class="text-muted fw-semibold fs-5">Place where investment turns into profit</div>
						</div>
						<!--end::Heading-->
						<div class="row mb-6">
												
												
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6"> Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<div class="fv-plugins-message-container invalid-feedback" id="company_err"></div>
													<input type="text" name="company_name" id="company_name"  class="form-control form-control-lg form-control-solid" placeholder="Company Name" REQUIRED onkeyup="company_unique(this.value);">
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="address1" id="address1" class="form-control form-control-lg form-control-solid" placeholder="Company Address">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="address2" id="address2" class="form-control form-control-lg form-control-solid" placeholder="Company Address">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
												<!--end::Label-->
												<!--begin::Left Section-->
												<div class="col-lg-3">
												<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" data-hide-search="true" name="city" id="city">
														<option selected="">Select City</option>
														<?php 
															$qry=$this->db->query("SELECT DISTINCT CITY FROM COMPANY ");
															$res=$qry->result();
															foreach ($res as $city_list) {
																?>
																<option value="<?php echo $city_list->CITY; ?>"> <?php echo $city_list->CITY; ?></option>
																<?php
															}
															?>
													</select>
													<!--end::Select-->
												</div>
												<!--end::Left Section-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Pincode</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="pincode" id="pincode" class="form-control form-control-lg form-control-solid" placeholder="Pincode">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">State</label>
												<!--end::Label-->
												<!--begin::Left Section-->
												<div class="col-lg-3">
												<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select State" data-hide-search="true" id="state" name="state">
														<option selected="">Select State</option>
														<?php 
														
															$qry=$this->db->query("SELECT  STATE_NAME FROM STATES ORDER BY STATE_NAME");
															$res=$qry->result();
															foreach ($res as $state_list) 
															{
																?>
																<option value="<?php echo $state_list->STATE_NAME; ?>"> <?php echo $state_list->STATE_NAME; ?></option>
																<?php
															}
															?> 
													</select>
													<!--end::Select-->
											
												</div>
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Phone</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone No">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Email</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text"  name="email" id="email"  class="form-control form-control-lg form-control-solid" placeholder="Enter Email ID">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Pan No</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="pan_no" id="pan_no"  class="form-control form-control-lg form-control-solid" placeholder="PAN No">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">GSTIN</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="gst_no" id="gst_no"  class="form-control form-control-lg form-control-solid" placeholder="GST No">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Reg No.</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="reg_no" id="reg_no"  class="form-control form-control-lg form-control-solid" placeholder="Reg. No">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">B. Type</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<!--begin::Select-->
													<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Type" data-hide-search="true" id="btype" name="btype">
														<option value="" selected="">Business Type</option>
														<option value="0">Jewel Loan Business</option>
														<option value="1">Other Business</option>
														
													</select>
													<!--end::Select-->
												</div>
												<!--end::Col-->
												
						</div>
						<div class="row mb-6"  >
							<div ><b><u>Printer options</b></u></div>
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="pcname" id="pcname" class="form-control form-control-lg form-control-solid" placeholder="Print Name">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="paddress" id="paddress"  class="form-control form-control-lg form-control-solid" placeholder="Print Address">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												
												<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Code</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3 fv-row fv-plugins-icon-container">
													<input type="text" name="code" id="code" class="form-control form-control-lg form-control-solid" placeholder="Print Code">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
												<!--end::Col-->
												<!--begin::Label-->
												<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6">Has Branch</label> -->
												<!--end::Label-->
												<!--begin::Col-->
												<!-- <div class="col-lg-1 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid"> -->
													<!--begin::Options-->
													<!-- <div class="d-flex align-items-center mt-3"> -->
														<!--begin::Option-->
														<!-- <label class="form-check form-check-inline form-check-solid me-5 is-invalid"> -->
															<!-- <input class="form-check-input" name="communication[]" type="checkbox" value="1"> -->
															<!--<span class="fw-semibold ps-2 fs-6">Branch Status</span>-->
														<!-- </label> -->
														<!--end::Option-->
													<!-- </div> -->
													<!--end::Options-->
												<!-- </div> -->
												<!--end::Col-->
												
						</div>
						<!--begin::Label-->
												<label class="col-lg-1 col-form-label required fw-semibold fs-6">Logo</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-3">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/svg/avatars/blank.svg)"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" name="avatar" accept=".png, .jpg, .jpeg">
															<input type="hidden" name="avatar_remove">
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Remove-->
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
													<!--end::Hint-->
												</div>
												<!--end::Col-->
						
						<!--begin::Actions-->
						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-lg-1">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="d-flex flex-center flex-row-fluid pt-12">
									<button type="submit" class="btn btn-success" >Save Changes</button>
								</div>
							</div>
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Modal body-->
				</form>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - add company-->
		<!--begin::Modal - edit company-->
		<div class="modal fade" id="kt_modal_edit_company" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - edit company-->
		<!--begin::Modal - view company-->
		<div class="modal fade" id="kt_modal_view_company" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - view company-->
		<!--begin::Modal - delete company-->
		<div class="modal fade" id="kt_modal_delete_company" tabindex="-1" aria-hidden="true">
			
		</div>
		<!--end::Modal - delete company-->
		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
		<?php $this->load->view("script");?>
		<script>
// 			$("#kt_datatable_dom_positioning").DataTable({
// 				"ordering": false,
//  "language": {
//   "lengthMenu": "Show _MENU_",
//  },
//  "dom":
//   "<'row'" +
//   "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
//   "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
//   ">" +

//   "<'table-responsive'tr>" +

//   "<'row'" +
//   "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
//   "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
//   ">"
// });
$('#kt_datatable_dom_positioning').DataTable( {
	"aaSorting": [],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
		</script>
		<script >
			var title = $('title').text() + ' | ' + 'Company';
			    $(document).attr("title", title);

			function company_edit(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'company/company_edit',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_edit_company').empty().append(response);
				$('#kt_modal_edit_company').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
			}
			function company_view(val)
			{
				var baseurl= $("#baseurl").val();
				// alert(baseurl);
				$.ajax({
				type: "POST",
				url: baseurl+'company/company_view',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_view_company').empty().append(response);
				$('#kt_modal_view_company').addClass('show');
				//$("#kt_modal_editdept").css("display", "block");
				}
			});
			}
			function closeViewModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_view_company').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'company';
			}
			function closeEditModal()
			{
				var baseurl= $("#baseurl").val();
				$('#kt_modal_edit_company').removeClass('show');
				//$("#kt_modal_update_role").css("display", "none");
				$('.modal-backdrop').removeClass('show');
				window.location.href = baseurl+'company';
			}
			var berr=0;
			function company_unique(val)
			{
				var baseurl= $("#baseurl").val();
				$.ajax({
					type:"POST",
					url:baseurl+'company/company_unique',
					data:{'value':val},
					cache: false,
					dataType: "html",
						success: function(result){
						if(result>0)
						{
							$('#company_err').html('Company already exist!');
							berr=1;
						}
						else
						{
							$('#company_err').html('');
							berr=0;
						}
					}
				});
			}
			function company_edit_validation()
			{
				var erre = 0;
				var company = $('#company_name').val();

			    if(company.trim()==''){
			        $('#company_edit_err').html('Enter company Name!');
			        erre++;
			    }else{
			        //$('#company_err').html('');
			        if(berre>0)
					{
						$('#company_edit_err').html('company already exist!');
						erre++;
					}
					else
					{
						$('#company_edit_err').html('');
					}
			    }
			    
			    if(erre>0){ return false; }else{ return true; }
			}
			function company_validation()
			{
				var err = 0;
				var company_name = $('#company_name').val();

			    if(company_name.trim()==''){
			        $('#company_err').html('Enter company!');
			        err++;
			    }else{
			        //$('#company_err').html('');
			        if(berr>0)
					{
						$('#company_err').html('company already exist!');
						err++;
					}
					else
					{
						$('#company_err').html('');
					}
			    }
			    
			    if(err>0){ return false; }else{ return true; }
			}	
			function activeunactive(val,ival) 
			{
				var unactive;
				var unactv;
				// var cid=string(val);
				// alert(cid);
				var baseurl= $("#baseurl").val();
				var a = $("#activeunactive_"+ival).val();
				// alert(a);
				if(a==1) {
					unactive='N';
					unactv="Active"
					// alert(unactive);
				}
				else{
					unactive='Y';
					unactv="In-Active"
					// alert(unactive);
				}
				var datastring="id="+val+"&status="+unactive;
				$.ajax({
					type:"POST",
					url:baseurl+'company/company_active',
					data:datastring,
					cache: false,
					dataType: "html",
					success: function(result){
						// alert(result+unactive);
						if(a == 1){
				            $("#active").css('display','block');
							$("#active").addClass('response');
				        }else{
				            $("#deactive").css('display','block');
							$("#deactive").addClass('response');
				        }      
			            setTimeout(function() {
				         window.location = baseurl+"company";
				        }, 3000);
					},
					error: function (error) {
						alert('error; ' + eval(error));
						setTimeout(function() {
				         window.location = baseurl+"company";
				        }, 3000);
					}
				});
			}

			function company_delete(val)
			{
				var baseurl= $("#baseurl").val();
				//alert(val);
				$.ajax({
				type: "POST",
				url: baseurl+'company/company_delete',
				async: false,
				type: "POST",
				data: "id="+val,
				dataType: "html",
				success: function(response)
				{
				$('#kt_modal_delete_company').empty().append(response);
				$('#kt_modal_delete_company').addClass('show');
				//$("#kt_modal_delete_role").css("display", "block");
				}
				});
			}

			function removeCompany(val)
			{ 
				var baseurl= $("#baseurl").val();
				$.ajax({
				type: "POST",
				url: baseurl+'company/delete',
				async: false,
				data:"field="+val,
				success: function(response)
				{
				window.location.href = baseurl+'company';
				}
				});
			}
			function closeDeleteModal()
			{
					var baseurl= $("#baseurl").val();
					$('#kt_modal_delete_company').removeClass('show');
					$('.modal-backdrop').removeClass('show');
					window.location.href = baseurl+'company';
			}
		</script>
	</body>
	<!--end::Body-->
</html>