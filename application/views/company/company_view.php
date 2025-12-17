<!--begin::Modal dialog-->
			<div class="modal-dialog modal-xl">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" onclick="closeViewModal();">
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
					<form name="company_view_form" id="company_view_form" method="POST" action="<?php echo base_url(); ?>company/company_view" enctype="multipart/form-data" >
						<input type="hidden" id="company_id" name="company_id" value="<?php echo $company_details->COMPANYCODE;?>">
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-13 text-center">
							<h1 class="mb-3">Company Details</h1>
							<div class="text-muted fw-semibold fs-5">Place where investment turns into profit</div>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->
						<div class="row mb-6">
													
													
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6"> Name</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="company_name" id="company_name" class="form-control form-control-lg form-control-solid" placeholder="Company Name" value="<?php echo $company_details->COMPANYNAME; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback" id="company_edit_err"></div>
														
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="address1" id="address1" class="form-control form-control-lg form-control-solid" placeholder="Company Address" value="<?php echo $company_details->ADDRESS1;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="address2" id="address2" class="form-control form-control-lg form-control-solid" placeholder="Company Address" value="<?php echo $company_details->ADDRESS2;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">City</label>
													<!--end::Label-->
													<!--begin::Left Section-->
													<div class="col-lg-3">
													<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Zone" data-hide-search="true" name="city" id="city" disabled>
															<option selected="">Select City</option>
															<?php 
															$qry=$this->db->query("SELECT DISTINCT CITY FROM COMPANY ");
															$res=$qry->result();
															foreach ($res as $city_list) {
																?>
																<option value="<?php echo $city_list->CITY; ?>" selected="<?php if ($city_list->CITY==$company_details->CITY){echo 'selected';}  ?>"> <?php echo $city_list->CITY; ?></option>
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
														<input type="text" name="pincode" id="pincode" class="form-control form-control-lg form-control-solid" placeholder="Phone No" value="<?php echo $company_details->PINCODE;?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">State</label>
													<!--end::Label-->
													<!--begin::Left Section-->
													<div class="col-lg-3">
													<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select State" data-hide-search="true" id="state" name="state" disabled>
															<option >Select State
															</option>
															<?php 
														
															$qry=$this->db->query("SELECT  STATE_NAME FROM STATES ORDER BY STATE_NAME");
															$res=$qry->result();
															foreach ($res as $state_list) 
															{
																?>
																<option value="<?php echo $state_list->STATE_NAME; ?>" selected="<?php 
																if($state_list->STATE_NAME == $company_details->STATE){echo 'selected';}else {echo ''; }  ?>"> <?php echo $state_list->STATE_NAME; ?></option>
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
														<input type="text" name="phone" id="phone" class="form-control form-control-lg form-control-solid" placeholder="Phone No" value="<?php echo $company_details->PHONE; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Email</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="email" id="email" class="form-control form-control-lg form-control-solid" placeholder="Enter Email ID" value="<?php echo $company_details->EMAIL; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">PAN No</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="pan_no" id="pan_no" class="form-control form-control-lg form-control-solid" placeholder="PAN No" value="<?php echo $company_details->PAN_NO; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">GSTIN</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="gst_no" id="gst_no" class="form-control form-control-lg form-control-solid" placeholder="GST Number" value="<?php echo $company_details->GST_NO; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Reg No.</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="reg_no" id="reg_no" class="form-control form-control-lg form-control-solid" placeholder="Contact Person" value="<?php echo $company_details->REGNO; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">B. Type</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<!--begin::Select-->
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Type" data-hide-search="true" id="btype" name="btype" disabled>
															<option selected="">Business Type</option>
															<option value="0" selected="<?php if($company_details->BUSINESS_TYPE==0){echo 'selected';}else{ echo ''; }?>">Jewel Loan Business</option>
															<option value="1" selected="<?php if($company_details->BUSINESS_TYPE>0){echo 'selected';}else{ echo ''; }?>">Other Business</option>
															
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
														<input type="text" name="pcname" id="pcname" class="form-control form-control-lg form-control-solid" placeholder="Company Code" value="<?php echo $company_details->COMPANYNAME2; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Address</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="paddress" id="paddress" class="form-control form-control-lg form-control-solid" placeholder="Company Code" value="<?php echo $company_details->ADDRESSLINE; ?>" readonly>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!--end::Col-->
													
													<!--begin::Label-->
													<label class="col-lg-1 col-form-label required fw-semibold fs-6">Code</label>
													<!--end::Label-->
													<!--begin::Col-->
													<div class="col-lg-3 fv-row fv-plugins-icon-container">
														<input type="text" name="code" id="code" class="form-control form-control-lg form-control-solid" placeholder="Company Code" value="<?php echo $company_details->LOGINCODE; ?>" readonly>
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
															<!-- <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-kt-initialized="1"> -->
																<!-- <i class="bi bi-pencil-fill fs-7"></i> -->
																<!--begin::Inputs-->
																<!-- <input type="file" id="clogo" name="clogo" accept=".png, .jpg, .jpeg"> -->
																<input type="hidden" name="avatar_remove">
																<!--end::Inputs-->
															<!-- </label> -->
															<!--end::Label-->
															<!--begin::Cancel-->
															<!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-kt-initialized="1"  > -->
																<!-- <i class="bi bi-x fs-2"></i> -->
															<!-- </span> -->
															<!--end::Cancel-->
															<!--begin::Remove-->
															<!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-kt-initialized="1"> -->
																<!-- <i class="bi bi-x fs-2"></i> -->
															<!-- </span> -->
															<!--end::Remove-->
														</div>
														<!--end::Image input-->
														<!--begin::Hint-->
														<!-- <div class="form-text">Allowed file types: png, jpg, jpeg.</div> -->
														<!--end::Hint-->
													</div>
													<!--end::Col-->
							<!--begin::Actions-->
							<div class="row">
								<div class="col-lg-9"></div>
								<div class="col-lg-1">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal" onclick="closeViewModal();">Cancel</button>
									</div>
								</div>
								<!-- <div class="col-lg-2">
									<div class="d-flex flex-center flex-row-fluid pt-12">
										<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save Changes</button>
									</div>
								</div> -->
							</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog