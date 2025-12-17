<?php $this->load->view("common");?>
<!-- <link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" /> -->
<link href="assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
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

  /*Auto complete css start*/

		.xdsoft_autocomplete,
		.xdsoft_autocomplete div,
		.xdsoft_autocomplete span{
		/*	-moz-box-sizing: border-box !important;
			box-sizing: border-box !important;*/
		}

		.xdsoft_autocomplete{
		display:inline;
		position:relative;
		word-spacing: normal;
		text-transform: none;
		text-indent: 0px;
		text-shadow: none;
		text-align: start;
		}
		/*.xdsoft_autocomplete_dropdown
		{
			left: 0px !important;
			top: 31px !important;
			margin-left: 0px !important;
			margin-right: 0px !important;
			width: 500px !important;
			display: none !important;
			max-height: 475px !important;
		}*/

		.xdsoft_autocomplete .xdsoft_input{
			position:relative;
			z-index:2;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown{
			position:absolute;
			border: 1px solid #ccc;
			border-top-color: #d9d9d9;
			box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			-webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
			cursor: default;
			display:none;
			z-index: 1001;
			margin-top:-1px;
			background-color:#fff;
			/*min-width:100%;*/
			width: 170px !important;
			overflow:auto;
			max-height: 300px !important;
			/*overflow-y: auto !important;
			overflow-x: auto !important;*/
			/*padding-right: 20px !important;*/
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_hint{
			position:absolute;
			z-index:1;
			color:#ccc !important;
			-webkit-text-fill-color:#ccc !important;
			text-fill-color:#ccc  !important;
			overflow:hidden !important;
			white-space: pre  !important;
		}

		.xdsoft_autocomplete .xdsoft_autocomplete_hint span{
			color:transparent;
			opacity: 0.0;
		}

		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > .xdsoft_autocomplete_copyright{
			color:#ddd;
			font-size:10px;
			text-decoration:none;
			right:5px;
			position:absolute;
			margin-top:-15px;
			z-index:1002;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div{
			background:#fff;
			white-space: nowrap;
			cursor: pointer;
			line-height: 1.5em;
			padding: 2px 0px 2px 0px;
		}
		.xdsoft_autocomplete .xdsoft_autocomplete_dropdown > div.active{
			background: #0097CF;
			color: #FFFFFF;
		}

		/*Auto complete css end*/
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
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Hand Loan
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
								<div class="col-xxl-8">
									<!--begin::Tables Widget 9-->
									
										<!--begin::Card header-->
										<!-- <div class="card-header1 border-0 pt-6">
										</div> -->
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<div class="loader">
											</div>
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Handloan/handloanentry_save" enctype="multipart/form-data" onsubmit="return handloan_validation();">
											<div class="row">
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 10px;height: 400px;box-shadow: 0 5px 10px #00002947;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Party Basic Details</label>
															<div class="row">
																<div class="row mt-4">
																		<label class="col-lg-2 col-form-label fw-semibold fs-6">Name</label>
																		<div class="col-lg-8 fv-row fv-plugins-icon-container">
																			<input type="text" name="first_name" class="form-control form-control-lg1 form-control-solid" placeholder="Party Name" id="first_name" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="first_nm_party();">
																			<input type="hidden" name="first_name_id_hidden" id="first_name_id_hidden" value="">
																			<input type="hidden" name="party_id_hidd" id="party_id_hidd" value="">

																			<div class="fv-plugins-message-container invalid-feedback" id="first_name_err"></div>
																		</div>
																	</div>
															
																	
																	<div class="col-lg-6">
																		<!-- <div id="card_show"> -->
																		<div class="row">
																			<label class="col-lg-12 col-form-label fw-bold fs-6" id="no_card" name="no_card" style="display: none"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<a href="<?php echo base_url();?>/membershipcard" target="_blank"><span style="color: red" >Click Here for<br> <b>New Membership Card</b></span></a>
																				
																				<!-- <i class="fas fa-check-circle fs-5" style="color:green;"></i> -->
																			</label>
																			<label class="col-lg-12 col-form-label fw-bold fs-6" id="lbl_mem_card_no"><i class="fa fa-address-card fs-6" aria-hidden="true" title="Card No"></i>&emsp;<span id="membership_card_no" name="membership_card_no">xxxx-xxxx-xxxx-xxxx</span>
																				<span id="verify_icon"><i class="fas fa-times-circle fs-5" style="color:red;"></i></span>
																				

																			</label>
																			<label class="col-lg-6 col-form-label fw-bold fs-6 text-center" name="card_type" id="card_type" >
																				

																				</label> 
																			<label class="col-lg-6 col-form-label fw-bold fs-6" name="" id="lbl_mem_point"><i class="fa-solid fa-coins fs-6" title="Points"></i>&emsp;<span id="membership_card_points" name="membership_card_points">000</span></label>

																			
																 
																			<div class="col-lg-12 d-flex justify-content-center" id="lbl_mem_verify">
																				<p class=" btn btn-sm  btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2  " data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" id="btn_verify_popup" name="btn_verify_popup" >Verify</p>
																			</div>
																		<!-- </div> -->
																		
																	</div>

																	
																</div>
																
																<div class="col-lg-6">
																	<div class="row mt-4">
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&emsp;<span name="last_name" id="last_name">C/o XXXX  </span></label>
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																			<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>
																		&emsp;<span name="address" id="address">No, street, city</span></label> 
																		<label class="col-lg-12 col-form-label fw-bold fs-6" name="" id="">
																				<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>
																			&emsp;<span name="mobile" id="mobile">9999999999</span> <span data-bs-toggle="modal" data-bs-target="#kt_modal_verify_mobile_no"><!-- <i class="fas fa-square-check" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_mobile_no" ></i> --><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
																				 viewBox="0 0 505 505" xml:space="preserve" height=35 width=35>
																			<circle style="fill:#FFD05B;" cx="252.5" cy="252.5" r="252.5"/>
																			<path style="fill:#324A5E;" d="M316,416.7H119c-4.7,0-8.4-3.8-8.4-8.4V96.7c0-4.7,3.8-8.4,8.4-8.4h197c4.7,0,8.4,3.8,8.4,8.4v311.6
																				C324.5,412.9,320.7,416.7,316,416.7z"/>
																			<rect x="131" y="128.6" style="fill:#54C0EB;" width="173.1" height="228.6"/>
																			<path style="fill:#ACB3BA;" d="M238.8,111.8h-42.5c-2.4,0-4.3-1.9-4.3-4.3l0,0c0-2.4,1.9-4.3,4.3-4.3h42.5c2.4,0,4.3,1.9,4.3,4.3
																				l0,0C243.1,109.9,241.2,111.8,238.8,111.8z"/>
																			<circle style="fill:#2B3B4E;" cx="278.4" cy="109.3" r="9.7"/>
																			<circle style="fill:#ACB3BA;" cx="217.5" cy="385.6" r="17.4"/>
																			<path style="fill:#FF7058;" d="M372,309H220.8c-12.3,0-22.3-10-22.3-22.3v-93.6c0-12.3,10-22.3,22.3-22.3h151.3
																				c12.3,0,22.3,10,22.3,22.3v93.6C394.4,299,384.4,309,372,309z"/>
																			<path style="fill:#F1543F;" d="M387.9,302.4c-4,4.1-9.7,6.6-15.9,6.6H220.8c-6.2,0-11.9-2.6-15.9-6.6l62.5-62.5l29-29l29,29
																				L387.9,302.4z"/>
																			<path style="fill:#E6E9EE;" d="M387.9,177.4l-62.5,62.5l-13.2,13.2c-8.7,8.7-22.9,8.7-31.7,0l-13.2-13.2l-62.5-62.5
																				c4-4.1,9.7-6.6,15.9-6.6h151.2C378.2,170.8,383.9,173.3,387.9,177.4z"/>
																			</svg></span></label>
																			
																	</div>

																	
															</div>
															<div class="row mt-2">
																		<label class="col-lg-2 col-form-label fw-semibold fs-6">Nominee</label>
																			<div class="col-lg-8 fv-row fv-plugins-icon-container">
																				<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="nominee" name="nominee">	
																					<option value="">Select</option>
																					
																				</select>
																			</div>
																	</div>
																	<div class="row">

																		<label class="col-lg-2 col-form-label fw-semibold fs-6">Rating</label>
																			<label class="col-lg-6 col-form-label fw-bold fs-6" >
																				<span name="rating" id="rating"><i class="fa-solid fa-star" ></i>&nbsp;Rating</span>
																				
																			</label>

																	</div>
														</div>
														
													</div>
												</div>
												<div class="col-lg-6">
													<div class="px-4" style="border-radius: 10px;padding-bottom: 1px; box-shadow: 0 5px 10px #00002947;height: 400px;">
														<label class="col-lg-12 col-form-label fw-bold fs-5 text-center">Loan Information</label>
														<div class="row mt-4">
															<label class="col-lg-2 col-form-label fw-semibold fs-6" >Company</label>
															<div class="col-lg-4 fv-row fv-plugins-icon-container">
																<select class="form-select form-select-solid fs-7 " data-control="select2" data-hide-search="true" id="company" name="company">	
																		<option value="">Select Company</option>
																		<?php  foreach($company_list as $clist) {?>
																		<option value="<?php echo $clist['COMPANYCODE']?>" <?php echo ($clist['COMPANYCODE']==$_SESSION['COMPANYCODE'])?'selected':''; ?>><?php echo $clist['COMPANYNAME'];?></option>
																		<?php }?>
																	</select>
															</div>
															<label class="col-lg-2 col-form-label fw-semibold fs-6">Date</label>
															<div class="col-lg-4 fv-row">
																<div class="d-flex align-items-center">
																	<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																			<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																			<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																			<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
																		</svg>
																	</span>
																	<input class="form-control form-control-solid ps-12" name="add_date_hand_loan_entrys"  id="kt_datepicker_new_loan_date" value="<?php echo date("d-m-Y"); ?>"/>


																</div>
																<div class="fv-plugins-message-container invalid-feedback" id="kt_datepicker_new_loan_date_err"></div>
															</div>
															<div class="row mt-4 mb-4">
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)" id="party_photo" name="party_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/aadhaar_blank.png)" id="id_photo" name="id_photo">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party_proof.jpg)"></div>
																	</div>
																</div>
																<div class="col-lg-4 fv-row">
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/signature_blank.png)">
																		<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/signature.jpg)"></div>
																	</div>
																</div>
															</div>
															<div class="col-lg-12 text-center">
																<label class="col-form-label fw-bold fs-2">H/L Amount</label>&emsp;
																
															</div>
															<div class="col-lg-12">
																<div class="row">
																	<table class="table align-middle gy-2 gs-2" id="hand_loan_his" >
																		<thead class="fw-bold fs-6 text-center">
																		<tr>
																		 <th class="col-lg-4 fw-bold fs-2 text-center">Total Amt</th>
																		 <th class="col-lg-4 fw-bold fs-2 text-center">Available Amt</th>
																		 <th class="col-lg-4 fw-bold fs-2 text-center">Balance</th>
																		</tr>
																	    </thead>
																		<tbody class="fw-semibold fs-6 text-center">
																			
																			
																			
																			<tr >
																			
																		
																				<td class="col-lg-4 fw-bold fs-2" id="hl_tot_amt"></td>
																				<td class="col-lg-4 fw-bold fs-2" id="hl_crtot_amt"></td>
																				<td class="col-lg-4 fw-bold fs-2" id="hl_baltot_amt"></td>
																			
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="d-grid mt-4">
													<ul class="nav nav-tabs flex-nowrap text-nowrap">
														<li class="nav-item">
															<a class="nav-link active btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_hand_loan_amt">Hand Loan Amount</a>
														</li>
														<li class="nav-item">
															<a class="nav-link btn btn-active-light btn-color-black-800 btn-active-color-primary rounded-bottom-0 fw-bold fs-6" data-bs-toggle="tab" href="#kt_tab_pane_on_account">On Account</a>
														</li>
													</ul>
												</div>
												<div class="tab-content" id="myTabContent">
													<div class="tab-pane fade show active" id="kt_tab_pane_hand_loan_amt" role="tabpanel">
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6">H/L Amt</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" class="form-control form-control-lg form-control-solid" name="hl_amount" id="hl_amount" value="0">

																<div class="fv-plugins-message-container invalid-feedback" id="hl_amount_err"></div>
															</div>
														</div>
														<div class="row">
															<label class="col-form-label fw-bold fs-5">Payment From Company</label>
														</div>
														<div class="row">
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="cash_hand_loan_paid_from_company_add_radio" type="checkbox" value="Cash" id="cash_hand_loan_paid_from_company_add_radio" onclick="cash_hd_ln_pdfrm_cmy_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="cheque_hand_loan_paid_from_company_add_radio" type="checkbox" value="Cheque" id="cheque_hand_loan_paid_from_company_add_radio" onclick="cheque_hd_ln_pdfrm_cmy_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">Cheque</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="rtgs_hand_loan_paid_from_company_add_radio" type="checkbox" value="RTGS" id="rtgs_hand_loan_paid_from_company_add_radio" onclick="rtgs_hd_ln_pdfrm_cmy_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">RTGS</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="upi_hand_loan_paid_from_company_add_radio" type="checkbox" value="UPI" id="upi_hand_loan_paid_from_company_add_radio" onclick="upi_hd_ln_pdfrm_cmy_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">UPI</label>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_cash_paid_from_cmy_label" style="display:none;">Cash</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_cash_paid_from_cmy_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" id="hlcashamount" name="hlcashamount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_cash_paid_from_detail_cmy_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="hlcashdetail" id="hlcashdetail"></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_cheque_paid_from_cmy" style="display:none;">Cheque</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container"id="hand_ln_cheque_amt_paid_from_cmy_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" id="hl_chequeamount" name="hl_chequeamount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_cheque_no_paid_from_cmy_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque No" id="hl_chequeno" name="hl_chequeno">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_ln_cheque_com_bank_paid_from_cmy_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="cheque_cmbk" id="cheque_cmbk" data-placeholder="Company Bank">
																	<option value="">Select</option>
																	<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) {
																	?>
																	<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_cheque_par_bank_paid_from_cmy_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="bank_details_drop_cq" name="bank_details_drop_cq">	
																<option value="">Select</option>			
																</select>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container"  id="hand_ln_cheque_detail_paid_from_cmy_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="hl_chequedetail" id="hl_chequedetail"></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_rtgs_paid_from_cmy" style="display:none;">RTGS</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_rtgs_amt_paid_from_cmy_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="hl_rtgsamount" id="hl_rtgsamount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_rtgs_ref_paid_from_cmy_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="hl_rtgsrefno" id="hl_rtgsrefno">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_ln_rtgs_com_bank_paid_from_cmy_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" name="hl_rtgscbank" id="hl_rtgscbank">
																	<option value="">Select</option>
																	<?php
																		$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																		foreach ($bnk_det as $blist) {
																		?>
																		<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
																		<?php
																		}
																		?>
																</select>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_rtgs_par_bank_paid_from_cmy_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="bank_details_drop_rtgs" name="bank_details_drop_rtgs">	
																<option value="">Select</option>			
																</select>
															
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_rtgs_detail_paid_from_cmy_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="hl_rtgsdetails" id="hl_rtgsdetails"></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_upi_paid_from_cmy" style="display:none;">UPI</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_upi_amt_paid_from_cmy_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="hl_upiamount" id="hl_upiamount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_upi_ref_paid_from_cmy_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Reference No" name="hl_upirefno" id="hl_upirefno">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_ln_upi_com_bank_paid_from_cmy_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-placeholder="Company Bank" data-hide-search="true" name="hl_upicbank" id="hl_upicbank">
																	<option value="">Select</option>
																	<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) {
																	?>
																	<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_upi_par_bank_paid_from_cmy_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="bank_details_drop_upi" name="bank_details_drop_upi">	
																<option value="">Select</option>

																</select>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_upi_detail_paid_from_cmy_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="hl_upidetail" id="hl_upidetail"></textarea>
															</div>

													   
														</div>
													</div>
													<div class="tab-pane fade show" id="kt_tab_pane_on_account" role="tabpanel">
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6">On A/c</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container">
																<input type="text" class="form-control form-control-lg form-control-solid" id="ac_amount" name="ac_amount" value="0">
																<div class="fv-plugins-message-container invalid-feedback" id="ac_amount_err"></div>
															</div>
														</div>
														<div class="row">
															<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
														</div>
														<div class="row">
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="cash_loan_received_add_radio" type="checkbox" value="Cash" id="cash_hd_loan_paid_from_party_add_radio" onclick="cash_hand_loan_pdfrm_party_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="cheque_hd_loan_paid_from_party_add_radio" type="checkbox" value="Cheque" id="cheque_hd_loan_paid_from_party_add_radio" onclick="cheque_hand_loan_pdfrm_party_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">Cheque</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="rtgs_hd_loan_paid_from_party_add_radio" type="checkbox" value="RTGS" id="rtgs_hd_loan_paid_from_party_add_radio" onclick="rtgs_hand_loan_pdfrm_party_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">RTGS</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="upi_hd_loan_paid_from_party_add_radio" type="checkbox" value="UPI" id="upi_hd_loan_paid_from_party_add_radio" onclick="upi_hand_loan_pdfrm_party_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">UPI</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="mcard_hand_loan_paid_from_party_add_radio" type="checkbox" value="Membership Redeem" id="mcard_hand_loan_paid_from_party_add_radio" onclick="mcard_hd_ln_pdfrm_party_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">Membership Card</label>
																</div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
																<div class="d-flex align-items-center mt-1">
																	<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																		<input class="form-check-input" name="chit_hand_loan_paid_from_party_add_radio" type="checkbox" value="Chit Redeem" id="chit_hand_loan_paid_from_party_add_radio" onclick="chit_hd_ln_pdfrm_party_add_radio()">
																	</label>
																	<label class="col-form-label fw-semibold fs-6">Chit</label>
																</div>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_loan_cash_party_label" style="display:none;">Cash</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_loan_cash_party_label_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" name="ac_cashamount" id="ac_cashamount">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_cash_party_detail_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="ac_cashdetail" id="ac_cashdetail"></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_loan_cheque_party_amt" style="display:none;">Cheque</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_loan_cheque_party_amt_tbox" style="display:none;">
																<input type="text" name="ac_chequeamount" id="ac_chequeamount" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container"  id="hand_loan_cheque_party_bank_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-hide-search="true"  name="party_bank_ac" id="party_bank_ac" >
																	<option>Select</option>
																	
																</select>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_cheque_party_chq_no_tbox" style="display:none;">
																<input type="text" name="ac_chequerefno" id="ac_chequerefno" class="form-control form-control-lg form-control-solid" placeholder="Cheque/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_cheque_party_detail_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="ac_chequedetail" id="ac_chequedetail"></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_loan_rtgs_party_amt" style="display:none;">RTGS</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_loan_rtgs_party_amt_tbox" style="display:none;">
																<input type="text" name="ac_rtgsamount" id="ac_rtgsamount" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_rtgs_party_no_tbox" style="display:none;">
																<input type="text" name="ac_rtgsrefno" id="ac_rtgsrefno" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_rtgs_party_bank_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" name="ac_rtgscbank" id="ac_rtgscbank">
																	<option value="">Select</option>
																	<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) {
																	?>
																	<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_rtgs_party_detail_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="ac_rtgsdetails" id="ac_rtgsdetails"></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_loan_upi_party_amt" style="display:none;">UPI</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_loan_upi_party_amt_tbox" style="display:none;">
																<input type="text" name="ac_upiamount" id="ac_upiamount" class="form-control form-control-lg form-control-solid" placeholder="Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_upi_party_trans_no_tbox" style="display:none;">
																<input type="text" name="ac_upirefno" id="ac_upirefno" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_upi_party_bank_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Company Bank" data-hide-search="true" name="ac_upicbank" id="ac_upicbank">
																	<option value="">Select</option>
																	<?php
																	$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																	foreach ($bnk_det as $blist) {
																	?>
																	<option value="<?php echo $blist['BANKNAME'];?>"><?php echo $blist['BANKNAME'];?></option>
																	<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_loan_upi_party_detail_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="" id=""></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_card_no_paid_from_pty" style="display:none;">M.card No</label>
															<div class="col-lg-2" id="hand_ln_card_no_paid_from_pty_tbox" style="display:none;">
																<label class="col-form-label fw-bold fs-5" name="ac_mem_card_no" id="ac_mem_card_no">xxxx-xxxx-xxxx-xxxx</label>
																<input type="hidden" name="ac_mem_card_num" id="ac_mem_card_num">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-3" id="hand_ln_points_paid_from_pty" style="display:none;">
																<label class="col-form-label fw-bold fs-6">Available Points</label>&emsp;
																<label class="col-form-label fw-bold fs-5" name="ac_member_points" id="ac_member_points">0</label>
															</div>
															<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_redeem_paid_from_cmy" style="display:none;">Redeem</label> -->
															<div class="col-lg-2" id="hand_ln_redeem_paid_from_pty_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Points" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="ac_mem_redeem_point"  id="ac_member_red_points">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_mcard_detail_paid_from_pty_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="ac_mem_redeem_detail" id="ac_mem_redeem_detail"></textarea>
															</div>
														</div>
														<div class="row">
															<label class="col-lg-1 col-form-label fw-semibold fs-6" id="hand_ln_sch_paid_from_pty" style="display:none;">Scheme</label>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_sch_paid_from_pty_tbox" style="display:none;">
																<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Scheme" name="sch_payment" id="sch_payment" data-hide-search="true" onchange="get_chit()">
																	<option value="">Select</option>
																	<option value="1">Selvamagal</option>				
																	<option value="2">Thangamagal</option>
																	<input type="hidden" name="sch_type_hidden" id="sch_type_hidden">
																</select>
															</div>
															<div class="col-lg-3 fv-row fv-plugins-icon-container" id="hand_ln_avai_bal_paid_from_pty" style="display:none;">

																<!-- <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Chit ID" data-hide-search="true" id="chit_option"> -->

																	<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="chit_option" name="chit_option">
																	<option value="">Select</option>
																	<!-- <option value="">Select Chit ID</option>
																	<option value="1">CH-001/23 - 45863.00</option>				
																	<option value="2">CH-002/23 - 85964.00</option> -->
																</select>
															</div>
															<div class="col-lg-2" id="hand_ln_redeem_amt_paid_from_pty_tbox" style="display:none;">
																<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Redeem Amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="0" name="chit_red_amt" id="chit_red_amt">
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<div class="col-lg-2 fv-row fv-plugins-icon-container" id="hand_ln_redeem_detail_paid_from_pty_tbox" style="display:none;">
																<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="chit_red_det" id="chit_red_det"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-end mt-4">
												<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="save_changes_add_new_loan">Send to Sanction</button>
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
					<!--end::Content-->
				 <?php $this->load->view("footer");?>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

		<div class="modal fade" id="kt_modal_verify_mobile_no" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
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
						<div class="mb-13 text-center">
							<h1 class="mb-3">Verify Mobile No</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-mobile-android-alt fs-5" aria-hidden="true" title="Mobile No"></i>&emsp;<span id="pop_mobile_no"></span>
							</label><br>
							<label class="form-check form-check-inline form-check-solid is-invalid">
								<input class="form-check-input" name="pop_mobile_no_is_change" type="checkbox" id="pop_mobile_no_is_change" onclick="change_mobile();">
								<span class="col-form-label fw-semibold fs-6">Change Mobile Number</span>
							</label>
						</div>
						<div class="row" id="div_change_mobile_no" style="display: none;">
							<div class="row">
								<label class="col-lg-3 col-form-label fw-semibold fs-6">Mobile No</label>
								<div class="col-lg-5 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter Mobile no" name="new_mobile_no" id="new_mobile_no" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!-- <div class="col-lg-8 fv-row fv-plugins-icon-container"></div> -->
								<div class="col-lg-4 d-flex justify-content-end">
									<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="update_no();" >Change</button>
								</div>
							</div>
						</div>
						<div class="row">
							<!--generated_otp-->
							<span style="border-radius: 8px;padding: 5px 15px 5px 15px;color: #e41f7a; display: none;" id="generated_otp"> </span>
							<input type="hidden" name="generated_otp_hidden" id="generated_otp_hidden" value="">
						</div>
						<div class="row"  id="div_verify_mobile_no" >
							<label class="col-lg-6 col-form-label fw-semibold fs-6">OTP from Customer</label>
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter code" name="check_otp" id="check_otp">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<div class="d-flex justify-content-center">
								<label class="col-form-label fw-bold fs-6 text-center" name="status" id="status" >
									<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white; display: none;" id="mb_err"> Not Matched...</span>
									<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;display: none;"  id="mb_success">Verified</span>
									<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
								</label>
							</div>
							<div class="row">

							<div class="col-lg-12 d-flex justify-content-center">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="generate_otp();">Generate</button>
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="check_mobile();">Verify</button>
								<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->
		</div>
		<!--end::Modal - view payment-->

		<!--begin::Modal - hand loan history-->
		<div class="modal fade" id="kt_modal_hand_loan_history" tabindex="-1" aria-hidden="true">
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
						<div class="mb-3 text-center">
							<h1 class="mb-3">Payment History</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->	
						<div class="row">
							<div class="col-lg-4">
								<label class="col-form-label fw-bold fs-5">H/L Amount</label>&emsp;
								<label class="col-form-label fw-bold fs-5">3000.00</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label fw-bold fs-5">On Account</label>&emsp;
								<label class="col-form-label fw-bold fs-5">100.00</label>
							</div>
							<div class="col-lg-4">
								<label class="col-form-label fw-bold fs-5">Bal.Amount</label>&emsp;
								<label class="col-form-label fw-bold fs-5">2900.00</label>
							</div>
							<table class="table align-middle table-row-dashed table-striped table-hover fs-7 gy-4 gs-2" id="view_payment_his_hand_loan">
								<thead>
									<tr class="text-start text-muted fw-bold fs-7 gs-0">
										<th class="min-w-25px">Sno</th>
							            <th class="min-w-80px">Date</th>
							            <th class="min-w-80px">H/L Amount</th>
							            <th class="min-w-80px">On A/c Amount</th>
							            <th class="min-w-80px">Balance Amount</th>
									</tr>
								</thead>
								<tbody class="text-gray-600 fw-semibold">
									<tr>
										<td>1</td>
										<td>22-01-2023</td>
										<td>200.00</td>
										<td>100.00</td>
										<td>200.00</td>
									</tr>
									<tr>
										<td>2</td>
										<td>12-02-2023</td>
										<td>500.00</td>
										<td>0.00</td>
										<td>500.00</td>
									</tr>
									<tr>
										<td>3</td>
										<td>16-03-2023</td>
										<td>1000.00</td>
										<td>0.00</td>
										<td>1000.00</td>
									</tr>
									<tr>
										<td>4</td>
										<td>18-03-2023</td>
										<td>1000.00</td>
										<td>0.00</td>
										<td>1000.00</td>
									</tr>
									<tr>
										<td>5</td>
										<td>22-03-2023</td>
										<td>300.00</td>
										<td>0.00</td>
										<td>300.00</td>
									</tr>						
							    </tbody>
							</table>
						</div>	
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - kt_modal_verify_membership_card_receiptt-->
		</div>
		<!--end::Modal - hand loan history-->

		<!--begin::Modal - view payment -->
		<div class="modal fade" id="kt_modal_verify_membership_card" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-md">
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
						<div class="mb-13 text-center">
							<h1 class="mb-3">Verify Membership Card</h1>
						</div>
						<!--end::Heading-->
						<!--end::Heading-->					
						<div class="row">
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No"></i>&emsp;<span id="pop_member_card"></span>
							</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6" name="pop_card_type" id="pop_card_type" ></label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;<span id="pop_member_points"></span></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Scan Here" name="check_card_no" id="check_card_no">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						</div>
						<div class="row">
							<label class="col-lg-8 col-form-label fw-bold fs-6 text-end" name="status" id="status" >
								<!-- <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white;">Not Matched...</span> -->
								<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Verifying...</span>
								<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
							</label>
							<div class="col-lg-4 d-flex justify-content-end">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card" onclick="check_card();">Verify</button>
							</div>
						</div>
						<div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<!-- <button class="btn btn-primary">Ok</button> -->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>

		<input type="hidden" id="baseurl" value="<?php echo base_url();?>">
	    <?php $this->load->view("script");?>
			<!-- Payment from Company hand loan Start -->
<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>

			<script >
		var baseurl = $("#baseurl").val();
		var span = document.querySelector('#last_name');

	        $("#first_name").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'Handloan/userList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#first_name").val(suggestion.firstname);
	                $('#first_name_id_hidden').val(suggestion.id);
	                $('#p_pid').val(suggestion.id);
	                $('#party_id_hidd').val(suggestion.id);
	                
	                var txt=suggestion.lastname+'&emsp; &emsp;<a target="_blank" href="<?php echo base_url();?>party/party_view/'+suggestion.id+'"><i class="fas fa-mail-bulk" title=" View Party"></i></a>';
	                $("#last_name").html(txt);
	                if(suggestion.rating==3){
	                	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
	                }
	                else if(suggestion.rating==2){
	                	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
	                }
	                else if(suggestion.rating==1){
	                	r='<i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good';	
	                }
	                else{
	                	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-';	
	                }
	                $("#rating").html(r);
	                $("#address").html(suggestion.address);
	                $("#mobile").html(suggestion.phone);
	                $("#pop_mobile_no").html(suggestion.phone);
	                $("#hl_db_amt").html(suggestion.cr_amt);
	                
	                if(suggestion.member_points==0)
	                {
	                	document.getElementById('no_card').style.display="block";
	                	document.getElementById('lbl_mem_card_no').style.display="none";
	                	document.getElementById('card_type').style.display="none";
	                	document.getElementById('lbl_mem_point').style.display="none";
	                	document.getElementById('lbl_mem_verify').style.display="none";
	                }
	            	else
	            	{
	            		document.getElementById('no_card').style.display="none";
	                	document.getElementById('lbl_mem_card_no').style.display="block";
	                	document.getElementById('card_type').style.display="block";
	                	document.getElementById('lbl_mem_point').style.display="block";
	                	document.getElementById('lbl_mem_verify').style.display="block";
		                $("#membership_card_no").html(suggestion.member_id);
		                $("#ac_mem_card_no").html(suggestion.member_id);
		                $("#pop_member_card").html(suggestion.member_id);
		                $("#membership_card_points").html(suggestion.member_points);
		                $("#pop_member_points").html(suggestion.member_points);
		                $("#ac_member_points").html(suggestion.member_points);
		                $("#ac_member_points").val(suggestion.member_points);
		                // $("#ac_member_red_points").html(suggestion.member_points);
		                 $("#ac_mem_card_num").val(suggestion.member_id);
	                
	                }
	        });
	         
		$('#last_name').on('DOMSubtreeModified',function(){
		  // alert('changed');
		  var pid= $("#first_name_id_hidden").val();

		  // alert(pid);
		  
		  $.ajax({
							type: "POST",
							url: baseurl+'Handloan/get_nominee_list',
							async: false,
							type: "POST",
							data: "id="+pid,
							dataType: "html",
							success: function(response)
							{
								// alert(response);
				                $('#nominee').empty().append(response);
							}
							});
		  


		  $.ajax({
							type: "POST",
							url: baseurl+'Handloan/get_party_bank',
							async: false,
							type: "POST",
							data: "id="+pid,
							dataType: "html",
							success: function(response)
							{
								// alert(response);
				                $('#bank_details_drop_cq').empty().append(response);
				                $('#bank_details_drop_rtgs').empty().append(response);
				                $('#bank_details_drop_upi').empty().append(response);
				                $('#party_bank_ac').empty().append(response);

							}
							});
		  $.ajax({
							type: "POST",
							url: baseurl+'Handloan/get_hl_det',
							async: false,
							type: "POST",
							data: "id="+pid,
							dataType: "html",
							success: function(response)
							{
								
							
				            var resp = response.split('||');
				            $('#hl_crtot_amt').empty().append(resp[0]);
				            $hl_tot =$('#hl_tot_amt').val(resp[1]);
				            $('#hl_tot_amt').empty().append(resp[1]);
				            $('#hl_baltot_amt').empty().append(resp[2]);
				           
				    

							}
							});
		  $.ajax({
							type: "POST",
							url: baseurl+'Handloan/get_photo',
							async: false,
							type: "POST",
							data: "id="+pid,
							dataType: "html",
							success: function(response)
							{
								
				                $('#party_photo').empty().append(response);
							}
							});

		  $.ajax({
							type: "POST",
							url: baseurl+'Handloan/get_id_photo',
							async: false,
							type: "POST",
							data: "id="+pid,
							dataType: "html",
							success: function(response)
							{
								
				                $('#id_photo').empty().append(response);
							}
							});
		  $.ajax({
							type: "POST",
							url: baseurl+'Handloan/get_card_type',
							async: false,
							type: "POST",
							data: "id="+pid,
							dataType: "html",
							success: function(response)
							{
								
				                $('#card_type').html(response);
				                $('#pop_card_type').html(response);
							}
							});
		});
		$("#pledge_item").autocomplete({ 
			                valueKey:'title',
			                source:[{
			                //type: 'post',
			                url:baseurl+'Handloan/pledgedList?query=%QUERY%',
			                type:'remote',
			                ajax:{
			                  dataType : 'json',
			                }
			            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
			                $("#pledge_item").val(suggestion.itemname);
			                $('#pledge_item_id_hidden').val(suggestion.id);
			              
			        });

		function check_card()
		{
			var chk=$('#check_card_no').val();
			var no=$('#pop_member_card').html();
			
			if(no!="" && chk!="")
			{
			if(no==chk){
				// alert('matched');
				$('#verify_icon').html('<i class="fas fa-check-circle fs-5" style="color:green;"></i>');
				document.getElementById('btn_verify_popup').style.display='none';
			}
			else{
				// alert('not matched');
				$('#verify_icon').html('<i class="fas fa-times-circle fs-5" style="color:red;"></i>');
				document.getElementById('btn_verify_popup').style.display='block';	
			}	
			}
	else
	{
		alert("Enter Card no to Verify")
	}

}
function get_chit(){
						    var pid= $("#first_name_id_hidden").val();
                            var cid = $('#sch_payment').val()
                            // alert(cid);
                            // alert(pid);
                            $.ajax({
							type: "POST",
							url: baseurl+'Handloan/get_chit_list',
							async: false,
							type: "POST",
							data: "ccid="+cid+'&pid='+pid,
							dataType: "html",
							success: function(response)
							{
							$('#chit_option').empty().append(response);

							}
							});

							
							


}
		  					

function get_int_due_details()
{
	var int_grp=$('#int_grp').val();
	var int_type=$('#int_type').val();
	var loan_dt=$('#kt_datepicker_new_loan_date').val()
	// alert(loan_dt);
	$.ajax({
					type: "POST",
					url: baseurl+'Handloan/get_int_due_details?',
					async: false,
					type: "POST",
					data: "grp="+int_grp+"&itype="+int_type+"&loan_dt="+loan_dt,
					dataType: "html",
					success: function(response)
					{
						var res=response.split('||');
		                $('#expiry_dt').html(res[1]);
		                $('#m1_ex_dt').html(res[2]);
		                $('#m2_ex_dt').html(res[3]);
		                $('#m3_ex_dt').html(res[4]);
		                $('#int1').html(res[5]);
		                $('#int2').html(res[6]);
		                $('#int3').html(res[7]);
		                
					}	
					});
			var p_fname = $('#first_name').val();
			if(p_fname!="")
			{
				var pid = $('#first_name_id_hidden').val();
				var nid = $('#nominee').val();
				var jtype = $('#jewel_type').val();
				var int_grp = $('#int_grp').val();
				var int_sch=$('select[name=int_grp]').find(':selected').text();
				var int_type = $('#int_type').val();
				var int_per=$('select[name=int_type]').find(':selected').text();
				var jeweltype=$('select[name=jewel_type]').find(':selected').text();
				var loandate = $('#kt_datepicker_new_loan_date').val();
				var cmp = $('#company').val();
				$.ajax({
						type: "POST",
						url: baseurl+'loan/insert_master?',
						async: false,
						type: "POST",
						data: "int_grp="+int_grp+"&int_type="+int_type+"&cmp="+cmp+"&pid="+pid+"&nid="+nid+"&jtype="+jtype+"&loandate="+loandate+"&p_fname="+p_fname+"&int_sch="+int_sch+"&int_per="+int_per+"&jewel_type="+jeweltype,
						dataType: "html",
						success: function(response)
						{
							if(response==0)
							{
								$('#int_grp').prop('disabled',false);
								alert("Error in Bill_no");
								
							}
							else
							{
								res=response.split('||');
								// alert(res[1]);
								$('#bill_no').val(res[2]);
								$('#p_bill_no').val(res[2]);
								$('#int_grp').prop('disabled',true);
							}
							
						}
						});
				
			}
			else
			{
				alert("Enter Party Name");
				document.getElementById("first_name").focus();
			}

}
	</script>
	<script>
		function loan_autocomplete()
{
	

            var pid = $('#loan_party_id').val();
            //alert(pid);

            var baseurl= $("#baseurl").val();
			//alert(val);
			$.ajax({
			type: "POST",
			url: baseurl+'Handloan/get_party_details',
			async: false,
			type: "POST",
			data: "id="+pid,
			dataType: "html",
			success: function(response)
			{
				var resp = response.split('||');
				$('#pid').val(resp[0]);
				$('#pname').val(resp[1]);
				$('#lname_prefix').val(resp[2]);
				$('#fname').val(resp[3]);
				$('#area').val(resp[4]);
				$('#dno').val(resp[5]);
				$('#address1').val(resp[6]);
				$('#address2').val(resp[7]);
				$('#city').val(resp[8]);
				// $('#hl_deb').val(resp[9]);

			}
			});

          

        $("#loan_no").focus();
}
	</script>
	<script>
		function change_mobile()
			{
				if(document.getElementById('pop_mobile_no_is_change').checked==true)
				{
					document.getElementById('div_change_mobile_no').style.display="block";
					document.getElementById('div_verify_mobile_no').style.display="none";
					document.getElementById('generated_otp').style.display="none";
				}
				else
				{
					document.getElementById('div_change_mobile_no').style.display="none";
					document.getElementById('div_verify_mobile_no').style.display="block";	
					// document.getElementById('generated_otp').style.display="none";
				}
			}
			function check_mobile()
			{
				var otp=$('#check_otp').val();
				var gen_otp=$('#generated_otp_hidden').val();
				if(gen_otp=='')
				{
					alert("Click generate OTP to get CODE");
					return false;
				}
				else
				{
					if(otp==gen_otp)
					{
						document.getElementById('mb_success').style.display="block";
						document.getElementById('mb_err').style.display="none";
						alert("verified");
					}
					else
					{
						document.getElementById('mb_success').style.display="none";
						document.getElementById('mb_err').style.display="block";
						alert("OTP Error");

						return false;
					}
				}
			}
			function generate_otp()
			{
				// alert("hi");
				let x = Math.floor((Math.random() * 1000000) + 1);
				document.getElementById("generated_otp").innerHTML = " Your generted OTP is : <b>"+x+"</b>";
				document.getElementById("generated_otp").style.display="block";
				$('#generated_otp_hidden').val(x);

			}
			function update_no()
			{
				var baseurl = $("#baseurl").val();
				var mbn=$('#new_mobile_no').val();
				// alert(mbn);
				var mbo=$('#pop_mobile_no').html();
				// alert(mbo);
				var pid=$('#first_name_id_hidden').val();
				// var pid=$('#bank_hidd').val();
				
				
				if(pid=='')
				{
					alert("Enter Party Name");
					
					$('#kt_modal_verify_mobile_no').removeClass('show');
					$('.modal-backdrop').removeClass('show');
					document.getElementById('first_name').focus();
					return true;
					 // window.location.href=baseurl+"loan/loan_add";
				}
				else
				{
					if(mbn==mbo)
					{
						alert("You have entered Old no ");
						
						$('#new_mobile_no').val('');
						document.getElementById('new_mobile_no').focus();
						return false;
					}
					else if(mbn='')
					{
						alert("Please Enter mobile no");
						$('#new_mobile_no').val('');
						document.getElementById('new_mobile_no').focus();
						return false;
					}
					else
					{
						var newno=$('#new_mobile_no').val();
						// alert(newno);
						$.ajax({
						type: "POST",
						url: baseurl+'Handloan/update_party_phone_no?',
						async: false,
						type: "POST",
						data: "pid="+pid+"&new_no="+newno,
						dataType: "html",
						success: function(response)
						{	

							 alert("Mobile number changed");
							 $('#pop_mobile_no').html(newno);
							 $('#mobile_no').html(newno);
							 document.getElementById('pop_mobile_no_is_change').checked=false;
							 document.getElementById('div_change_mobile_no').style.display="none";
							document.getElementById('div_verify_mobile_no').style.display="block";
							// $('#kt_modal_verify_mobile_no').removeClass('show');
							// $('.modal-backdrop').removeClass('show');
						}
						});
					}
				}
			}
	</script>
	<script >
	function handloan_validation()
	{
		var err=0;
		var party_name= $('#first_name').val();
		var date_select= $('#kt_datepicker_new_loan_date').val();
		var hl_amt = $('#hl_amount').val();
		var on_amt = $('#ac_amount').val();

		if(party_name=="")
		{
			$('#first_name_err').html('Enter Party name');
			err++;
			document.getElementById("first_name").focus();
		}
		else
		{
			$('#first_name_err').html('');
		}
		if(date_select=="")
		{
			$('#kt_datepicker_new_loan_date_err').html('Select Date !');
			err++;
			document.getElementById("kt_datepicker_new_loan_date").focus();
		}
		else
		{
			$('#kt_datepicker_new_loan_date_err').html('');
		}
		if((hl_amt<=0) && (on_amt<=0))
		{

			$('#hl_amount_err').html('Enter H/L Amount !');
			err++;
			document.getElementById("hl_amount").focus();

			$('#ac_amount_err').html('Enter On A/c Amount !');
			err++;
			document.getElementById("ac_amount").focus();

		}
		else
		{
			$('#hl_amount_err').html('');
			$('#ac_amount_err').html('');
		}

		
		if(err>0){
			return false;
		}
		else{
			return true;
		}
	}
	</script>

			<script>
				var cash_hand_loan_paid_from_company_add_radio = document.getElementById("cash_hand_loan_paid_from_company_add_radio");
				var hand_ln_cash_paid_from_cmy_label = document.getElementById("hand_ln_cash_paid_from_cmy_label");
				var hand_ln_cash_paid_from_cmy_tbox = document.getElementById("hand_ln_cash_paid_from_cmy_tbox");
				var hand_ln_cash_paid_from_detail_cmy_tbox = document.getElementById("hand_ln_cash_paid_from_detail_cmy_tbox");

				function cash_hd_ln_pdfrm_cmy_add_radio()
				{
					if (cash_hand_loan_paid_from_company_add_radio.checked)
					{
					    hand_ln_cash_paid_from_cmy_label.style.display = "block";
					    hand_ln_cash_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_cash_paid_from_detail_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				  		hand_ln_cash_paid_from_cmy_label.style.display = "none";
				  		hand_ln_cash_paid_from_cmy_tbox.style.display = "none";
				  		hand_ln_cash_paid_from_detail_cmy_tbox.style.display = "none";
				  	}
				};

				var cheque_hand_loan_paid_from_company_add_radio = document.getElementById("cheque_hand_loan_paid_from_company_add_radio");
				var hand_ln_cheque_paid_from_cmy = document.getElementById("hand_ln_cheque_paid_from_cmy");
				var hand_ln_cheque_amt_paid_from_cmy_tbox = document.getElementById("hand_ln_cheque_amt_paid_from_cmy_tbox");
				var hand_ln_cheque_no_paid_from_cmy_tbox = document.getElementById("hand_ln_cheque_no_paid_from_cmy_tbox");
				var hand_ln_cheque_com_bank_paid_from_cmy_tbox = document.getElementById("hand_ln_cheque_com_bank_paid_from_cmy_tbox");
				var hand_ln_cheque_par_bank_paid_from_cmy_tbox = document.getElementById("hand_ln_cheque_par_bank_paid_from_cmy_tbox");
				var hand_ln_cheque_detail_paid_from_cmy_tbox = document.getElementById("hand_ln_cheque_detail_paid_from_cmy_tbox");

				function cheque_hd_ln_pdfrm_cmy_add_radio()
				{
					if (cheque_hand_loan_paid_from_company_add_radio.checked)
					{
					    hand_ln_cheque_paid_from_cmy.style.display = "block";
					    hand_ln_cheque_amt_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_cheque_no_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_cheque_com_bank_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_cheque_par_bank_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_cheque_detail_paid_from_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				     	hand_ln_cheque_paid_from_cmy.style.display = "none";
					    hand_ln_cheque_amt_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_cheque_no_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_cheque_com_bank_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_cheque_par_bank_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_cheque_detail_paid_from_cmy_tbox.style.display = "none";
				  	}
				};

				var rtgs_hand_loan_paid_from_company_add_radio = document.getElementById("rtgs_hand_loan_paid_from_company_add_radio");
				var hand_ln_rtgs_paid_from_cmy = document.getElementById("hand_ln_rtgs_paid_from_cmy");
				var hand_ln_rtgs_amt_paid_from_cmy_tbox = document.getElementById("hand_ln_rtgs_amt_paid_from_cmy_tbox");
				var hand_ln_rtgs_ref_paid_from_cmy_tbox = document.getElementById("hand_ln_rtgs_ref_paid_from_cmy_tbox");
				var hand_ln_rtgs_com_bank_paid_from_cmy_tbox = document.getElementById("hand_ln_rtgs_com_bank_paid_from_cmy_tbox");
				var hand_ln_rtgs_par_bank_paid_from_cmy_tbox = document.getElementById("hand_ln_rtgs_par_bank_paid_from_cmy_tbox");
				var hand_ln_rtgs_detail_paid_from_cmy_tbox = document.getElementById("hand_ln_rtgs_detail_paid_from_cmy_tbox");

				function rtgs_hd_ln_pdfrm_cmy_add_radio()
				{
					if (rtgs_hand_loan_paid_from_company_add_radio.checked == true)
					{
					    hand_ln_rtgs_paid_from_cmy.style.display = "block";
					    hand_ln_rtgs_amt_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_rtgs_ref_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_rtgs_com_bank_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_rtgs_par_bank_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_rtgs_detail_paid_from_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				     	hand_ln_rtgs_paid_from_cmy.style.display = "none";
					    hand_ln_rtgs_amt_paid_from_cmy_tbox.style.display = "none";
					   	hand_ln_rtgs_ref_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_rtgs_com_bank_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_rtgs_par_bank_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_rtgs_detail_paid_from_cmy_tbox.style.display = "none";
				  	}
				};

				var upi_hand_loan_paid_from_company_add_radio = document.getElementById("upi_hand_loan_paid_from_company_add_radio");
				var hand_ln_upi_paid_from_cmy = document.getElementById("hand_ln_upi_paid_from_cmy");
				var hand_ln_upi_amt_paid_from_cmy_tbox = document.getElementById("hand_ln_upi_amt_paid_from_cmy_tbox");
				var hand_ln_upi_ref_paid_from_cmy_tbox = document.getElementById("hand_ln_upi_ref_paid_from_cmy_tbox");
				var hand_ln_upi_com_bank_paid_from_cmy_tbox = document.getElementById("hand_ln_upi_com_bank_paid_from_cmy_tbox");
				var hand_ln_upi_par_bank_paid_from_cmy_tbox = document.getElementById("hand_ln_upi_par_bank_paid_from_cmy_tbox");
				var hand_ln_upi_detail_paid_from_cmy_tbox = document.getElementById("hand_ln_upi_detail_paid_from_cmy_tbox");

				function upi_hd_ln_pdfrm_cmy_add_radio()
				{
					if (upi_hand_loan_paid_from_company_add_radio.checked == true)
					{
					    hand_ln_upi_paid_from_cmy.style.display = "block";
					    hand_ln_upi_amt_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_upi_ref_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_upi_com_bank_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_upi_par_bank_paid_from_cmy_tbox.style.display = "block";
					    hand_ln_upi_detail_paid_from_cmy_tbox.style.display = "block";
				  	} else 
				  	{
				     	hand_ln_upi_paid_from_cmy.style.display = "none";
					    hand_ln_upi_amt_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_upi_ref_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_upi_com_bank_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_upi_par_bank_paid_from_cmy_tbox.style.display = "none";
					    hand_ln_upi_detail_paid_from_cmy_tbox.style.display = "none";
				  	}
				};
			</script>
		<!-- Payment from Company hand loan End -->
		<!-- Paid from Party customer close Start -->
		<script>
			function cash_hand_loan_pdfrm_party_add_radio()
			{
				var cash_hd_loan_paid_from_party_add_radio = document.getElementById("cash_hd_loan_paid_from_party_add_radio");

				var hand_loan_cash_party_label = document.getElementById("hand_loan_cash_party_label");
				var hand_loan_cash_party_label_tbox = document.getElementById("hand_loan_cash_party_label_tbox");
				var hand_loan_cash_party_detail_tbox = document.getElementById("hand_loan_cash_party_detail_tbox");

				if (cash_hd_loan_paid_from_party_add_radio.checked)
				{
				    hand_loan_cash_party_label.style.display = "block";
				    hand_loan_cash_party_label_tbox.style.display = "block";
				    hand_loan_cash_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		hand_loan_cash_party_label.style.display = "none";
			  		hand_loan_cash_party_label_tbox.style.display = "none";
			  		hand_loan_cash_party_detail_tbox.style.display = "none";
			  	}
			};

			function cheque_hand_loan_pdfrm_party_add_radio()
			{
				var cheque_hd_loan_paid_from_party_add_radio = document.getElementById("cheque_hd_loan_paid_from_party_add_radio");

				var hand_loan_cheque_party_amt = document.getElementById("hand_loan_cheque_party_amt");
				var hand_loan_cheque_party_amt_tbox = document.getElementById("hand_loan_cheque_party_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var hand_loan_cheque_party_bank_tbox = document.getElementById("hand_loan_cheque_party_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var hand_loan_cheque_party_chq_no_tbox = document.getElementById("hand_loan_cheque_party_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var hand_loan_cheque_party_detail_tbox = document.getElementById("hand_loan_cheque_party_detail_tbox");

				if (cheque_hd_loan_paid_from_party_add_radio.checked)
				{
				    hand_loan_cheque_party_amt.style.display = "block";
				    hand_loan_cheque_party_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    hand_loan_cheque_party_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    hand_loan_cheque_party_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    hand_loan_cheque_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	hand_loan_cheque_party_amt.style.display = "none";
				    hand_loan_cheque_party_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    hand_loan_cheque_party_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    hand_loan_cheque_party_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    hand_loan_cheque_party_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_hand_loan_pdfrm_party_add_radio()
			{
				var rtgs_hd_loan_paid_from_party_add_radio = document.getElementById("rtgs_hd_loan_paid_from_party_add_radio");

				var hand_loan_rtgs_party_amt = document.getElementById("hand_loan_rtgs_party_amt");
				var hand_loan_rtgs_party_amt_tbox = document.getElementById("hand_loan_rtgs_party_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var hand_loan_rtgs_party_bank_tbox = document.getElementById("hand_loan_rtgs_party_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var hand_loan_rtgs_party_no_tbox = document.getElementById("hand_loan_rtgs_party_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var hand_loan_rtgs_party_detail_tbox = document.getElementById("hand_loan_rtgs_party_detail_tbox");

				if (rtgs_hd_loan_paid_from_party_add_radio.checked == true)
				{
				    hand_loan_rtgs_party_amt.style.display = "block";
				    hand_loan_rtgs_party_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    hand_loan_rtgs_party_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    hand_loan_rtgs_party_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    hand_loan_rtgs_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	hand_loan_rtgs_party_amt.style.display = "none";
				    hand_loan_rtgs_party_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    hand_loan_rtgs_party_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    hand_loan_rtgs_party_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    hand_loan_rtgs_party_detail_tbox.style.display = "none";
			  	}
			};

			function upi_hand_loan_pdfrm_party_add_radio()
			{
				var upi_hd_loan_paid_from_party_add_radio = document.getElementById("upi_hd_loan_paid_from_party_add_radio");

				var hand_loan_upi_party_amt = document.getElementById("hand_loan_upi_party_amt");
				var hand_loan_upi_party_amt_tbox = document.getElementById("hand_loan_upi_party_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var hand_loan_upi_party_trans_no_tbox = document.getElementById("hand_loan_upi_party_trans_no_tbox");
				var hand_loan_upi_party_bank_tbox = document.getElementById("hand_loan_upi_party_bank_tbox");
				var hand_loan_upi_party_detail_tbox = document.getElementById("hand_loan_upi_party_detail_tbox");

				if (upi_hd_loan_paid_from_party_add_radio.checked == true)
				{
				    hand_loan_upi_party_amt.style.display = "block";
				    hand_loan_upi_party_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    hand_loan_upi_party_trans_no_tbox.style.display = "block";
				    hand_loan_upi_party_bank_tbox.style.display = "block";
				    hand_loan_upi_party_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	hand_loan_upi_party_amt.style.display = "none";
				    hand_loan_upi_party_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    hand_loan_upi_party_trans_no_tbox.style.display = "none";
				    hand_loan_upi_party_bank_tbox.style.display = "none";
				    hand_loan_upi_party_detail_tbox.style.display = "none";
			  	}
			};

			var mcard_hand_loan_paid_from_party_add_radio = document.getElementById("mcard_hand_loan_paid_from_party_add_radio");
			var hand_ln_card_no_paid_from_pty = document.getElementById("hand_ln_card_no_paid_from_pty");
			var hand_ln_card_no_paid_from_pty_tbox = document.getElementById("hand_ln_card_no_paid_from_pty_tbox");
			var hand_ln_points_paid_from_pty = document.getElementById("hand_ln_points_paid_from_pty");
			// var hand_ln_redeem_paid_from_cmy = document.getElementById("hand_ln_redeem_paid_from_cmy");
			var hand_ln_redeem_paid_from_pty_tbox = document.getElementById("hand_ln_redeem_paid_from_pty_tbox");
			var hand_ln_mcard_detail_paid_from_pty_tbox = document.getElementById("hand_ln_mcard_detail_paid_from_pty_tbox");

			function mcard_hd_ln_pdfrm_party_add_radio()
			{
				if (mcard_hand_loan_paid_from_party_add_radio.checked == true)
				{
				    hand_ln_card_no_paid_from_pty.style.display = "block";
				    hand_ln_card_no_paid_from_pty_tbox.style.display = "block";
				    hand_ln_points_paid_from_pty.style.display = "block";
				    // hand_ln_redeem_paid_from_cmy.style.display = "block";
				    hand_ln_redeem_paid_from_pty_tbox.style.display = "block";
				    hand_ln_mcard_detail_paid_from_pty_tbox.style.display = "block";
			  	} else 
			  	{
			     	hand_ln_card_no_paid_from_pty.style.display = "none";
				    hand_ln_card_no_paid_from_pty_tbox.style.display = "none";
				    hand_ln_points_paid_from_pty.style.display = "none";
				    // hand_ln_redeem_paid_from_cmy.style.display = "none";
				    hand_ln_redeem_paid_from_pty_tbox.style.display = "none";
				    hand_ln_mcard_detail_paid_from_pty_tbox.style.display = "none";
			  	}
			};

			var chit_hand_loan_paid_from_party_add_radio = document.getElementById("chit_hand_loan_paid_from_party_add_radio");
			var hand_ln_sch_paid_from_pty = document.getElementById("hand_ln_sch_paid_from_pty");
			var hand_ln_sch_paid_from_pty_tbox = document.getElementById("hand_ln_sch_paid_from_pty_tbox");
			var hand_ln_avai_bal_paid_from_pty = document.getElementById("hand_ln_avai_bal_paid_from_pty");
			var hand_ln_redeem_amt_paid_from_pty_tbox = document.getElementById("hand_ln_redeem_amt_paid_from_pty_tbox");
			var hand_ln_redeem_detail_paid_from_pty_tbox = document.getElementById("hand_ln_redeem_detail_paid_from_pty_tbox");

			function chit_hd_ln_pdfrm_party_add_radio()
			{
				if (chit_hand_loan_paid_from_party_add_radio.checked == true)
				{
				    hand_ln_sch_paid_from_pty.style.display = "block";
				    hand_ln_sch_paid_from_pty_tbox.style.display = "block";
				    hand_ln_avai_bal_paid_from_pty.style.display = "block";
				    hand_ln_redeem_amt_paid_from_pty_tbox.style.display = "block";
				    hand_ln_redeem_detail_paid_from_pty_tbox.style.display = "block";
			  	} else 
			  	{
			     	hand_ln_sch_paid_from_pty.style.display = "none";
				    hand_ln_sch_paid_from_pty_tbox.style.display = "none";
				    hand_ln_avai_bal_paid_from_pty.style.display = "none";
				    hand_ln_redeem_amt_paid_from_pty_tbox.style.display = "none";
				    hand_ln_redeem_detail_paid_from_pty_tbox.style.display = "none";
			  	}
			};
		</script>
		<!-- Paid from Party customer close End -->
		<script>
			function change_mobile()
			{
				if(document.getElementById('pop_mobile_no_is_change').checked==true)
				{
					document.getElementById('div_change_mobile_no').style.display="block";
					// document.getElementById('div_verify_mobile_no').style.display="none";
					document.getElementById('generated_otp').style.display="none";
				}
				else
				{
					document.getElementById('div_change_mobile_no').style.display="none";
					// document.getElementById('div_verify_mobile_no').style.display="block";	
					// document.getElementById('generated_otp').style.display="none";
				}
			}
		</script>
		<!-- Received From Party in Total Charges Start -->
		<script>
			function cash_ln_recev_add_radio()
			{
				var cash_loan_received_add_radio = document.getElementById("cash_loan_received_add_radio");

				var cash_label = document.getElementById("cash_label");
				var cash_label_tbox = document.getElementById("cash_label_tbox");
				var cash_detail_tbox = document.getElementById("cash_detail_tbox");

				if (cash_loan_received_add_radio.checked)
				{
				    cash_label.style.display = "block";
				    cash_label_tbox.style.display = "block";
				    cash_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label.style.display = "none";
			  		cash_label_tbox.style.display = "none";
			  		cash_detail_tbox.style.display = "none";
			  	}
			};

			function cheque_ln_recev_add_radio()
			{
				var cheque_loan_received_add_radio = document.getElementById("cheque_loan_received_add_radio");

				var cheque_amt = document.getElementById("cheque_amt");
				var cheque_amt_tbox = document.getElementById("cheque_amt_tbox");
				// var cheque_bank = document.getElementById("cheque_bank");
				var cheque_bank_tbox = document.getElementById("cheque_bank_tbox");
				// var cheque_chq_no = document.getElementById("cheque_chq_no");
				var cheque_chq_no_tbox = document.getElementById("cheque_chq_no_tbox");
				// var cheque_detail = document.getElementById("cheque_detail");
				var cheque_detail_tbox = document.getElementById("cheque_detail_tbox");

				if (cheque_loan_received_add_radio.checked)
				{
				    cheque_amt.style.display = "block";
				    cheque_amt_tbox.style.display = "block";
				    // cheque_bank.style.display = "block";
				    cheque_bank_tbox.style.display = "block";
				    // cheque_chq_no.style.display = "block";
				    cheque_chq_no_tbox.style.display = "block";
				    // cheque_detail.style.display = "block";
				    cheque_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_amt.style.display = "none";
				    cheque_amt_tbox.style.display = "none";
				    // cheque_bank.style.display = "none";
				    cheque_bank_tbox.style.display = "none";
				    // cheque_chq_no.style.display = "none";
				    cheque_chq_no_tbox.style.display = "none";
				    // cheque_detail.style.display = "none";
				    cheque_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_ln_recev_add_radio()
			{
				var rtgs_loan_received_add_radio = document.getElementById("rtgs_loan_received_add_radio");

				var rtgs_amt = document.getElementById("rtgs_amt");
				var rtgs_amt_tbox = document.getElementById("rtgs_amt_tbox");
				// var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("rtgs_bank_tbox");
				// var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("rtgs_no_tbox");
				// var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("rtgs_detail_tbox");

				if (rtgs_loan_received_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    // rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    // rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    // rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    // rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    // rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    // rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			};

			function upi_ln_recev_add_radio()
			{
				var upi_loan_received_add_radio = document.getElementById("upi_loan_received_add_radio");

				var upi_amt = document.getElementById("upi_amt");
				var upi_amt_tbox = document.getElementById("upi_amt_tbox");
				// var upi_trans_no = document.getElementById("upi_trans_no");
				var upi_trans_no_tbox = document.getElementById("upi_trans_no_tbox");
				var upi_bank_tbox = document.getElementById("upi_bank_tbox");
				var upi_detail_tbox = document.getElementById("upi_detail_tbox");

				if (upi_loan_received_add_radio.checked == true)
				{
				    upi_amt.style.display = "block";
				    upi_amt_tbox.style.display = "block";
				    // upi_trans_no.style.display = "block";
				    upi_trans_no_tbox.style.display = "block";
				    upi_bank_tbox.style.display = "block";
				    upi_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_amt.style.display = "none";
				    upi_amt_tbox.style.display = "none";
				    // upi_trans_no.style.display = "none";
				    upi_trans_no_tbox.style.display = "none";
				    upi_bank_tbox.style.display = "none";
				    upi_detail_tbox.style.display = "none";
			  	}
			};
		</script>
		<!-- Received From Party in Total Charges End -->
		<!-- Payment Now From Party Start -->
		<script>
			function cash_ln_paynow_add_radio()
			{
				var cash_loan_paynow_add_radio = document.getElementById("cash_loan_paynow_add_radio");

				var cash_label_ln_pay = document.getElementById("cash_label_ln_pay");
				var cash_label_ln_pay_tbox = document.getElementById("cash_label_ln_pay_tbox");
				var cash_detail_ln_pay_tbox = document.getElementById("cash_detail_ln_pay_tbox");

				if (cash_loan_paynow_add_radio.checked)
				{
				    cash_label_ln_pay.style.display = "block";
				    cash_label_ln_pay_tbox.style.display = "block";
				    cash_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_label_ln_pay.style.display = "none";
			  		cash_label_ln_pay_tbox.style.display = "none";
			  		cash_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function cheque_ln_paynow_add_radio()
			{
				var cheque_loan_paynow_add_radio = document.getElementById("cheque_loan_paynow_add_radio");

				var cheque_label_ln_pay = document.getElementById("cheque_label_ln_pay");
				var cheque_amt_ln_pay_tbox = document.getElementById("cheque_amt_ln_pay_tbox");
				var cheque_no_ln_pay_tbox = document.getElementById("cheque_no_ln_pay_tbox");
				var cheque_com_bank_ln_pay_tbox = document.getElementById("cheque_com_bank_ln_pay_tbox");
				var cheque_par_bank_ln_pay_tbox = document.getElementById("cheque_par_bank_ln_pay_tbox");
				var cheque_detail_ln_pay_tbox = document.getElementById("cheque_detail_ln_pay_tbox");

				if (cheque_loan_paynow_add_radio.checked)
				{
				    cheque_label_ln_pay.style.display = "block";
				    cheque_amt_ln_pay_tbox.style.display = "block";
				    cheque_no_ln_pay_tbox.style.display = "block";
				    cheque_com_bank_ln_pay_tbox.style.display = "block";
				    cheque_par_bank_ln_pay_tbox.style.display = "block";
				    cheque_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_label_ln_pay.style.display = "none";
				    cheque_amt_ln_pay_tbox.style.display = "none";
				    cheque_no_ln_pay_tbox.style.display = "none";
				    cheque_com_bank_ln_pay_tbox.style.display = "none";
				    cheque_par_bank_ln_pay_tbox.style.display = "none";
				    cheque_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function rtgs_ln_paynow_add_radio()
			{
				var rtgs_loan_paynow_add_radio = document.getElementById("rtgs_loan_paynow_add_radio");

				var rtgs_label_ln_pay = document.getElementById("rtgs_label_ln_pay");
				var rtgs_amt_ln_pay_tbox = document.getElementById("rtgs_amt_ln_pay_tbox");
				var rtgs_ref_ln_pay_tbox = document.getElementById("rtgs_ref_ln_pay_tbox");
				var rtgs_com_bank_ln_pay_tbox = document.getElementById("rtgs_com_bank_ln_pay_tbox");
				var rtgs_par_bank_ln_pay_tbox = document.getElementById("rtgs_par_bank_ln_pay_tbox");
				var rtgs_detail_ln_pay_tbox = document.getElementById("rtgs_detail_ln_pay_tbox");

				if (rtgs_loan_paynow_add_radio.checked == true)
				{
				    rtgs_label_ln_pay.style.display = "block";
				    rtgs_amt_ln_pay_tbox.style.display = "block";
				    rtgs_ref_ln_pay_tbox.style.display = "block";
				    rtgs_com_bank_ln_pay_tbox.style.display = "block";
				    rtgs_par_bank_ln_pay_tbox.style.display = "block";
				    rtgs_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_label_ln_pay.style.display = "none";
				    rtgs_amt_ln_pay_tbox.style.display = "none";
				   	rtgs_ref_ln_pay_tbox.style.display = "none";
				    rtgs_com_bank_ln_pay_tbox.style.display = "none";
				    rtgs_par_bank_ln_pay_tbox.style.display = "none";
				    rtgs_detail_ln_pay_tbox.style.display = "none";
			  	}
			};

			function upi_ln_paynow_add_radio()
			{
				var upi_loan_paynow_add_radio = document.getElementById("upi_loan_paynow_add_radio");

				var upi_label_ln_pay = document.getElementById("upi_label_ln_pay");
				var upi_amt_ln_pay_tbox = document.getElementById("upi_amt_ln_pay_tbox");
				var upi_ref_ln_pay_tbox = document.getElementById("upi_ref_ln_pay_tbox");
				var upi_com_bank_ln_pay_tbox = document.getElementById("upi_com_bank_ln_pay_tbox");
				var upi_par_bank_ln_pay_tbox = document.getElementById("upi_par_bank_ln_pay_tbox");
				var upi_detail_ln_pay_tbox = document.getElementById("upi_detail_ln_pay_tbox");

				if (upi_loan_paynow_add_radio.checked == true)
				{
				    upi_label_ln_pay.style.display = "block";
				    upi_amt_ln_pay_tbox.style.display = "block";
				    upi_ref_ln_pay_tbox.style.display = "block";
				    upi_com_bank_ln_pay_tbox.style.display = "block";
				    upi_par_bank_ln_pay_tbox.style.display = "block";
				    upi_detail_ln_pay_tbox.style.display = "block";
			  	} else 
			  	{
			     	upi_label_ln_pay.style.display = "none";
				    upi_amt_ln_pay_tbox.style.display = "none";
				    upi_ref_ln_pay_tbox.style.display = "none";
				    upi_com_bank_ln_pay_tbox.style.display = "none";
				    upi_par_bank_ln_pay_tbox.style.display = "none";
				    upi_detail_ln_pay_tbox.style.display = "none";
			  	}
			};
		</script>
		<!-- Payment Now From Party End -->
	<script>
	      $("#kt_datatable_dom_positioning").kendoTooltip({
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
		$("#kt_datatable_dom_positioning").DataTable({
			// "ordering": false,
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
			$("#view_payment_his_hand_loan").DataTable({
				// "ordering": false,
				 "aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
			$('#view_payment_his_hand_loan').wrap('<div class="dataTables_scroll" />');
	</script>
	<script>
			$("#hand_loan_his").DataTable({
				"ordering": false,
				 // "aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
			// $('#hand_loan_his').wrap('<div class="dataTables_scroll" />');
	</script>
	<script>
			$("#kt_datatable_dom_positioning_edit_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
	</script>
	<script>
			$("#kt_datatable_dom_positioning_view_loan").DataTable({
				// "ordering": false,
				"aaSorting":[],
				 "language": {
				  "lengthMenu": "Show _MENU_",
				 },
				 "dom":
				  "<'row'" +
				  ">" +

				  "<'table-responsive'tr>" +

				  "<'row'" +
				  ">"
				 
				});
	</script>
	<script>
			$("#kt_datepicker_From").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_To").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_new_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_edit_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
			$("#kt_datepicker_view_loan_date").flatpickr({
				dateFormat: "d-m-Y",
			});
	</script>
	</body>
	<!--end::Body-->
	

</html>