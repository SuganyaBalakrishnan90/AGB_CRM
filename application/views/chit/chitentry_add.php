<?php $this->load->view("common"); ?>
<!-- <link href="<?php echo base_url();?>assets/jquery.autocomplete.css" rel="stylesheet" type="text/css" /> -->
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
				width: 400px !important;
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
				<?php $this->load->view("sidebar"); ?>
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php $this->load->view("header"); ?>
				<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">New Chit
									<!--begin::Separator-->
									<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Party &emsp;-</span>
										<span>&emsp;All</span>
									</label> -->
									<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
									<label class="d-flex align-items-center text-primary fw-bold my-1 fs-5">
										<span>Status &emsp;-</span>
										<span>&emsp;All</span>
									</label> -->
									<!-- <span class="h-20px border-gray-400 border-start ms-3 mx-2"></span>
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
									<div class="card card-xxl-stretch mb-5 mb-xl-8">
											<!--begin::Card body-->
											<div class="card-body py-4">
											<!--end::Heading-->
											<form method="POST" autocomplete="off" action="<?php echo base_url(); ?>Chit_entry/chit_entry_save" enctype="multipart/form-data" onsubmit="return new_chit_entry_validation();">
											<div class="row">
												<div class="col-lg-6">
													<div class="row">
														<label class="col-lg-2 col-form-label required fw-semibold fs-6">Date</label>
														<div class="col-lg-4 fv-row">
															<div class="d-flex align-items-center">
																<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
																<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
																		<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
																		<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
																		<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<input class="form-control form-control-solid ps-12" name="chit_date" placeholder="Date"  id="kt_daterangepicker_chit_entry_add_date" value="<?php echo date("d-m-Y"); ?>" />
																	<?php 
																	$date_format  = $this->db->query("SELECT * FROM general_settings  ")->row();
																	$format= $date_format->date_format;
																	//echo date("$format", strtotime($lotentrylist['lot_date']));
																	?>	
																	</div>
															<span class="fv-plugins-message-container invalid-feedback text-danger" id="date_err"></span>
															<div class="fv-plugins-message-container invalid-feedback" id="date_err"></div>
														</div>
														<label class="col-lg-2 col-form-label required fw-semibold fs-6">Party</label>
														<div class="col-lg-4 fv-row fv-plugins-icon-container">
															<input type="text" name="party_name" id="party_name" class="form-control form-control-lg form-control-solid" placeholder="Party Name">
															<input type="hidden" name="party_id_hidden" id="party_id_hidden" value="">
															<div class="fv-plugins-message-container invalid-feedback" id="party_id_err"></div>
														</div>
														<!-- <label class="col-lg-2 col-form-label fw-semibold fs-6">Company</label>
														<div class="col-lg-10 fv-row fv-plugins-icon-container">
															<select class="form-select form-select-solid select2-hidden-accessible" name="" id="" data-control="select2" data-hide-search="true" data-select2-id="select2-data-108-ic64" tabindex="-1" aria-hidden="true" data-kt-initialized="1">	
																<option value="" data-select2-id="select2-data-110-n1od">Select</option>
																<option value="1">AGB - Main Branch Sayalkudi</option>
																<option value="2">AGB - Main Pernali Branch</option>
															</select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-109-dh4r" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2--container" aria-controls="select2--container"><span class="select2-selection__rendered" id="select2--container" role="textbox" aria-readonly="true" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
														</div> -->
														<label class="col-lg-6 col-form-label fw-bold fs-6" id="red" ><i class="fa fa-address-card fs-6" aria-hidden="true" name="membership_card_no"  title="Card No"></i>
															  <span id="membership_card_no">XXXX-XXXX-XXXX</span> 
															 <span id="verify_icon"></span>
														</label>
														<label class="col-lg-2 col-form-label fw-bold fs-6" name="card_type" id="card_type"></label>
														<label class="col-lg-2 col-form-label fw-bold fs-6" name="" id=""><i class="fa-solid fa-coins fs-6" title="Points"></i>&nbsp;<span id="membership_card_points">XXX</span></label>
													</div>
													<div class="row">
														<div class="col-lg-4" id="new_membership" style="display:none;">
															<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_new_membership">New Membership</button>
														</div>
														<div class="col-lg-4" id="verify_membership" style="display:none;">
															<a href="javascript:;" class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_membership_card">Verify</a>
														</div>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="row">
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="lab_name" >
															<i class="fa fa-user fs-6" aria-hidden="true" title="Last Name"></i>&nbsp;&nbsp;<span id="lab_name">C/o XXXX</span></label>
														<label class="col-lg-12 col-form-label fw-bold fs-6" name="address">
															<i class="fa-solid fa-location-dot fs-6" aria-hidden="true" title="Address"></i>&nbsp;&nbsp;<span id="address">No, street, city</span></label>
														<label class="col-lg-5 col-form-label fw-bold fs-6" name="mobile">
																<i class="fas fa-mobile-android-alt fs-6" aria-hidden="true" title="Mobile"></i>&nbsp;&nbsp;<span id="mobile">XXXXXXXXXXX</span>
															</label>
														<div class="col-lg-2" id="kt_mobile_modal" style="display:none;"> 
															<span data-bs-toggle="modal" data-bs-target="#kt_modal_change_mobile"><!-- <i class="fas fa-square-check" data-bs-toggle="modal" data-bs-target="#kt_modal_verify_no" ></i> --><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 505 505" xml:space="preserve" height="35" width="35">
															<circle style="fill:#FFD05B;" cx="252.5" cy="252.5" r="252.5"></circle>
															<path style="fill:#324A5E;" d="M316,416.7H119c-4.7,0-8.4-3.8-8.4-8.4V96.7c0-4.7,3.8-8.4,8.4-8.4h197c4.7,0,8.4,3.8,8.4,8.4v311.6
																C324.5,412.9,320.7,416.7,316,416.7z"></path>
															<rect x="131" y="128.6" style="fill:#54C0EB;" width="173.1" height="228.6"></rect>
															<path style="fill:#ACB3BA;" d="M238.8,111.8h-42.5c-2.4,0-4.3-1.9-4.3-4.3l0,0c0-2.4,1.9-4.3,4.3-4.3h42.5c2.4,0,4.3,1.9,4.3,4.3
																l0,0C243.1,109.9,241.2,111.8,238.8,111.8z"></path>
															<circle style="fill:#2B3B4E;" cx="278.4" cy="109.3" r="9.7"></circle>
															<circle style="fill:#ACB3BA;" cx="217.5" cy="385.6" r="17.4"></circle>
															<path style="fill:#FF7058;" d="M372,309H220.8c-12.3,0-22.3-10-22.3-22.3v-93.6c0-12.3,10-22.3,22.3-22.3h151.3
																c12.3,0,22.3,10,22.3,22.3v93.6C394.4,299,384.4,309,372,309z"></path>
															<path style="fill:#F1543F;" d="M387.9,302.4c-4,4.1-9.7,6.6-15.9,6.6H220.8c-6.2,0-11.9-2.6-15.9-6.6l62.5-62.5l29-29l29,29
																L387.9,302.4z"></path>
															<path style="fill:#E6E9EE;" d="M387.9,177.4l-62.5,62.5l-13.2,13.2c-8.7,8.7-22.9,8.7-31.7,0l-13.2-13.2l-62.5-62.5
																c4-4.1,9.7-6.6,15.9-6.6h151.2C378.2,170.8,383.9,173.3,387.9,177.4z"></path>
															</svg></span>
														</div>
														<label class="col-lg-4 col-form-label fw-bold fs-6" name="rating"><span id="rating"></span></label>
													</div>
												</div>
												<div class="col-lg-2 fv-row">
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(assets/media/svg/avatars/blank.svg)">
														<div class="image-input-wrapper"  style="background-image: url(<?php echo base_url();?>assets/images/party.jpg)"id="party_photo" name="party_photo">
														</div>
													</div>
												</div>
												
											</div>
											<div class="row">
												<label class="col-lg-2 col-form-label required fw-semibold fs-6">Collection type</label>
												<div class="col-lg-2" >
													<select class="form-select form-select-solid" onchange="chit_coll_type();" id="collection_type"  name="collection_type" data-control="select2"
														data-hide-search="true">
														<option value="">Select Type</option>
														<option value="1">Daily</option>
														<option value="2">Weekly</option>
														<option value="3">Monthly</option>
													</select>
													<div class="fv-plugins-message-container invalid-feedback" id="collection_type_err"></div>
												</div>
												<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="day_lab" style="display:none;">Collection Day</label>
												<div class="col-lg-2" id="collection_day" style="display:none;">
													<select class=" form-select form-select-solid" name="collec_day" id="collec_day" data-control="select2"
														data-hide-search="true">
														<option value="">Select Day</option>
														<option value="1">Sunday</option>
														<option value="2">Monday</option>
														<option value="3">Tuesday</option>
														<option value="4">Wednesday</option>
														<option value="5">Thursday</option>
														<option value="6">Friday</option>
														<option value="7">Saturday</option>
													</select>
													<div class="fv-plugins-message-container invalid-feedback" id="collection_day_err"></div>
												</div>
											<label class="col-lg-2 col-form-label required fw-semibold fs-6" id="date_lab" style="display:none;">Collection Date</label>
												<div class="col-lg-2" id="collection_date" style="display:none;">
													<div class="d-flex align-items-center">
														<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor"></path>
															<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor"></path>
															<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor"></path>
														</svg>
														</span>
														<input class="form-control form-control-solid ps-12" name="collec_date" placeholder="Date"  id="kt_daterangepicker_collec_date" value="" />
														<?php 
															$date_for  = $this->db->query("SELECT * FROM general_settings")->row();
															$format= $date_for->date_format;
															//echo date("$format", strtotime($lotentrylist['lot_date']));
														?>
													</div>
													<span class="fv-plugins-message-container invalid-feedback text-danger" id="collec_date_err"></span>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-2 col-form-label required fw-semibold fs-6">Chit Amount</label>
												<div class="col-lg-2" >
												    <input type="text" id="chit_amount" name="chit_amount" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="cash_on()">
													<div class="fv-plugins-message-container invalid-feedback" id="chit_amount_err"></div>
												</div>
											</div>
											<div class="row">
												<label class="col-lg-1 col-form-label required fw-semibold fs-6" id="scheme_lab" name="scheme_lab">Scheme</label>
												<div class="col-lg-5 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class=" form-check-input" name="scheme_type" type="radio" value="1" id="scheme_type" onclick="sel_cash(0)">
														</label>
														<label class=" col-form-label fw-semibold fs-6">Selvamagal</label>
													</div>
												</div>
												<div class="col-lg-6 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
													<div class="d-flex align-items-center mt-1">
														<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
															<input class="form-check-input" name="scheme_type" type="radio" value="2" id="scheme_type"  onclick="sel_cash(1)">
														</label>
														<label class="col-form-label fw-semibold fs-6">Thangamagal</label>
													</div>
												</div>
											</div>
											
											<div class="row">
												<div class="col-lg-6">
													<div class="row" id="sel_cash" style="display:none;">
														<label class="col-lg-2 col-form-label fw-semibold fs-6" id="sch_sel_cash_lab">Cash</label>
														<div class="col-lg-3" id="sch_sel_cash_tbox">
															<input type="text" name="sm_cash_box" id="cash_tbox" class="form-control form-control-lg form-control-solid" placeholder="Amount">
															<div class="fv-plugins-message-container invalid-feedback" id="cash_tbox_err"></div>
														</div>
													</div>
												</div>
												<div class="col-lg-6" id="thanga_cash" style="display:none;">
													<div class="row">
														<div class="col-lg-6" >
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="scheme_type" type="radio" value="2" id="sch_thg_cash_radio_id"  onclick="thanga_cash(0)">
																</label>
																<label class=" col-form-label fw-semibold fs-6">Cash</label>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="d-flex align-items-center mt-1">
																<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																	<input class="form-check-input" name="scheme_type" type="radio" value="3" id="sch_thg_gd_radio_id" onclick="thanga_cash(1)">
																</label>
																<label class="col-form-label fw-semibold fs-6">Gold</label>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-12" id="thang_cash" style="display:none;">
															<div class="row">
																<label class="col-lg-2 col-form-label fw-semibold fs-6" id="sch_thg_cash_ch_lab">Cash</label>
																<div class="col-lg-3" id="sch_thg_cash_ch_tbox" >
																	<input type="text" id="cash_tbox" name="tm_cash_box" class="form-control form-control-lg form-control-solid" placeholder="Amount">
																	<div class="fv-plugins-message-container invalid-feedback"></div>
																</div>
															</div>
														</div>
														<div class="col-12" id="thang_gold" style="display:none;">
														<div class="row">
															<label class="col-lg-2 col-form-label fw-semibold fs-6" id="sch_thg_gold_gd_lab">Gold</label>
															<div class="col-lg-3" id="sch_thg_gold_gd_tbox">
																<input type="text" id="gold_tbox" name="tm_gold_box" class="form-control form-control-lg form-control-solid" placeholder="Amount" onkeyup="cash_on()">
																
																
																<div class="fv-plugins-message-container invalid-feedback"></div>
															</div>
															<label class="col-lg-3 col-form-label fw-semibold fs-6" id="net_wt_lab">Net Wgt(gms)</label>
															<input type="hidden" name="current_gold_rate" id="current_gold_rate"  value="<?php echo $current_rate->GOLDRATE; ?>">
															<input type="hidden" name="net_gm_lab1" id="net_gm_lab1" value="0">
															<label class="col-lg-2 col-form-label fw-bold fs-4" id="net_gm_lab" name="net_gm_lab">
															
															</label>
														</div>
													</div>
												</div>
											</div>
												<div class="row">
													<label class="col-form-label fw-bold fs-5">Party Payment Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="cash_val" type="checkbox" value="Cash" id="cash_add_radio" onclick="cash_sl_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6 me-5">Cash</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="bank_val" type="checkbox" value="Bank" id="cheque_add_radio" onclick="cheque_sl_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">Bank</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="rtgs_val" type="checkbox" value="RTGS" id="rtgs_add_radio" onclick="rtgs_ln_recev_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">RTGS</label>
														</div>
													</div>
													<div class="col-lg-2 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
														<div class="d-flex align-items-center mt-1">
															<label class="form-check form-check-inline form-check-solid me-5 is-invalid">
																<input class="form-check-input" name="upi_val" type="checkbox" value="UPI" id="upi_add_radio" onclick="upi_sl_add_radio()">
															</label>
															<label class="col-form-label fw-semibold fs-6">UPI</label>
														</div>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_sl_label" style="display: none;">Cash</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_sl_tbox" style="display: none;">
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" name="cash_amt" id="cash_amt" value="0">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cash_sl_detai_label" style="display: none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cash_sl_detai_tbox" style="display: none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="cash_details" id="cash_details"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_amt_label" style="display: none;">Bank</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_amt_tbox" style="display: none;">
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Amount" value="0" name="bank_amt" id="cheque_amt">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_bk_label" style="display: none;">Name</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_bk_tbox" style="display: none;">
														<select class="form-select form-select-solid" data-control="select2" data-placeholder="Select Bank" name="bank_name" id="cheque_bank" data-hide-search="true">
														<option value="">Select</option>
															<?php
																$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																foreach ($bnk_det as $blist) {
																?>
																<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
																<?php
																}
															?>
														</select>
														<span class="m-form__help text-danger" id="cheque_bank_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_cqno_label" style="display: none;">Cheque no</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_cqno_tbox" style="display: none;">
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Cheque Number" name="cheque_no" id="cheque_no" >
														<span class="m-form__help text-danger" id="cheque_no_err"></span>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="cheque_sl_detail_label" style="display: none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="cheque_sl_detail_tbox" style="display: none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="bank_details" id="cash_details"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_amt" style="display:none;">RTGS</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_amt_tbox" style="display:none;">
														<input type="text" name="rtgs_amt" id="rtgs_amt" class="form-control form-control-lg form-control-solid" value="0" placeholder="Amount">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display:none;">RTGS No</label> -->
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_bank" style="display: none;">Name</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_bank_tbox" style="display:none;">
														<select class="form-select form-select-solid" data-control="select2" id="rtgs_bank" name="rtgs_name" data-placeholder="Select Bank" data-hide-search="true">
														<option value="">Select</option>
															<?php
																$bnk_det=$this->db->query("select * from BANKS where ACTIVE='Y'")->result_array();
																foreach ($bnk_det as $blist) {
																?>
																<option value="<?php echo $blist['SNO'];?>"><?php echo $blist['BANKNAME'];?></option>
																<?php
																}
															?>
														</select>
														<span class="m-form__help text-danger" id="cheque_bank_err"></span>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_no" style="display: none;">Trans No</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_no_tbox" style="display:none;">
														<input type="text" name="rtgs_no" id="rtgs_no" class="form-control form-control-lg form-control-solid" placeholder="Trans/Ref Number" oninput="this.value = this.value.replace(/[^A-Za-z/0-9.]/g, '').replace(/(\..*)\./g, '$1');">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<!-- <label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display:none;">Details</label> -->
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="rtgs_detail" style="display: none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="rtgs_detail_tbox" style="display:none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="rtgs_details" id="cash_details"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_sl_amt_label" style="display: none;">UPI</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_sl_amt_tbox" style="display: none;">
														<input type="text" class="form-control form-control-lg form-control-solid" value="0" placeholder="Amount" name="upi_amt" id="upi_amt">
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_sl_trno_label" style="display: none;">Trans No</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_sl_trno_tbox" style="display: none;">
														<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Transaction No" name="upi_no" id="upi_trans_no">
														<span class="m-form__help text-danger" id="upi_trans_no_err"></span>
														<div class="fv-plugins-message-container invalid-feedback"></div>
													</div>
													<label class="col-lg-1 col-form-label fw-semibold fs-6" id="upi_sl_detail_label" style="display: none;">Details</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container" id="upi_sl_detail_tbox" style="display: none;">
														<textarea class="form-control form-control-solid" rows="1" placeholder="Details" name="upi_details" id="upi_details"></textarea>
													</div>
												</div>
												<div class="row">
													<label class="col-lg-2 col-form-label fw-semibold fs-6">Customer Rating</label>
													<div class="col-lg-2">
														<select class="form-select form-select-solid" id="cus_rating" name="cus_rating" data-control="select2"
															data-hide-search="true">
															<option value="">Select Rating</option>
															<option value="1">Good</option>
															<option value="2">Average</option>
															<option value="3">Bad</option>
														</select>
														<div class="fv-plugins-message-container invalid-feedback" id="cus_rating_err"></div>
													</div>
													<label class="col-lg-2 col-form-label fw-semibold fs-6">M.Points Add</label>
													<div class="col-lg-2 fv-row fv-plugins-icon-container">
														<input type="text" name="m_points_ad" id="m_points_ad" value="0" placeholder="Membership Point" class="form-control form-control-lg1 form-control-solid" value="">
														<div class="fv-plugins-message-container invalid-feedback" id="m_points_ad_err"></div>
													</div>
												</div>
												<div class="d-flex justify-content-end mt-4">
													<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
													<button type="submit" class="btn btn-primary" id="save_changes_add_product">New Chit</button>
												</div>
											</div>
											<!--end::Table-->
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
					<?php $this->load->view("footer"); ?>
				
				<!--end::Wrapper-->
				</div>
				<!--end::Page-->
			</div>
			<!--end::Root-->
		</div>
		<div class="modal fade" id="kt_modal_new_membership" tabindex="-1" aria-hidden="true">
			<!--begin::Modal dialog-->
			<div class="modal-dialog modal-s">
				<!--begin::Modal content-->
				<div class="modal-content rounded">
					<!--begin::Modal header-->
					<div class="modal-header justify-content-end border-0 pb-0">
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
							<span class="svg-icon svg-icon-1">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
										transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
										fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<!--begin::Modal body-->
					<div class="modal-body pt-0 pb-15 px-5 px-xl-20">
						<!--begin::Heading-->
						<div class="mb-5 text-center">
							<h1 class="mb-3">New Membership</h1>
						</div>
						<!--end::Heading-->
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Party</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="#" class="form-control form-control-lg1 form-control-solid"
									placeholder="Party Name">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Type</label>
							<div class="col-lg-8">
								<select class="form-select form-select-solid" data-control="select2"
									data-hide-search="true">
									<option value="0">Select Type</option>
									<option value="1">Silver</option>
									<option value="2">Gold</option>
									<option value="3">Platinum</option>
								</select>
							</div>
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Card No</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="#" class="form-control form-control-lg1 form-control-solid"
									placeholder="Scan Here..">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
							<!--end::Col-->
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Expiry Date</label>
							<div class="col-lg-8 fv-row">
								<div class="d-flex align-items-center">
									<span class="svg-icon position-absolute ms-4 svg-icon-2 dt">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path opacity="0.3"
												d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
												fill="currentColor" />
											<path
												d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
												fill="currentColor" />
											<path
												d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
												fill="currentColor" />
										</svg>
									</span>
									<input class="form-control form-control-solid ps-12" name="" placeholder="Date"
										id="kt_datepicker_new_loan_date" value="<?php echo date("Y-m-d"); ?>" />
								</div>
							</div>
						</div>
						<div class="row">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Add Points</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" name="#" class="form-control form-control-lg1 form-control-solid"
									placeholder="Points">
							</div>
							<!--end::Col-->

							<!--End::Actions-->

						</div>
						<!--butt-->
						<div class="d-flex justify-content-center mt-13">
							<button type="reset" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary" id="save_changes_add_product">New Membership</button>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!-- </form> -->
		</div>

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
							<label class="col-lg-12 col-form-label fw-bold fs-5"><i class="fa fa-address-card fs-5" aria-hidden="true" title="Card No"></i>&emsp; <span id="pop_member_card"></span>
							</label>
							<label class="col-lg-4 col-form-label fw-bold fs-6" name="pop_card_type" id="pop_card_type" ></label>
							<label class="col-lg-4 col-form-label fw-bold fs-5" name="" id=""><i class="fa-solid fa-coins fs-5" title="Points"></i>&emsp;<span id="pop_member_points"></span></label>
						</div>
						<div class="row">
							<label class="col-lg-4 col-form-label fw-semibold fs-6">Scan Here</label>
							<div class="col-lg-8 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" id="scan_he" name="scan_he" placeholder="Scan Here" >
								<div class="fv-plugins-message-container invalid-feedback text-danger" style="display:none;" id="scan_he_err">Error</div>
							</div>
						</div>
						<div class="row">
						<div class="col-lg-3"></div>
							<label class="col-lg-5 col-form-label fw-bold fs-6 text-end" name="" id="" >
								 <span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white; display:none;" id="not_match">Not Matched...</span> 
								 <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;" id="verifying">Verifying...</span>
								<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px; display:none;" id="matched">Matched...</span>
							</label>
							<div class="col-lg-4 d-flex justify-content-end">
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" id="verify_button">Verify</button>
							</div>
						</div>
						<div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
		<div class="modal fade" id="kt_modal_change_mobile" tabindex="-1" aria-hidden="true">
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
							<div class="row">

							<label class="col-lg-6 col-form-label fw-semibold fs-6">OTP from Customer</label>
							<div class="col-lg-6 fv-row fv-plugins-icon-container">
								<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter code" name="check_otp" id="check_otp">
								<div class="fv-plugins-message-container invalid-feedback"></div>
							</div>
						<!-- </div>
						<div class="row"> -->
						<!-- <div class="row"> -->
							<div class="d-flex justify-content-center">
								<label class="col-form-label fw-bold fs-6 text-center" name="status" id="status" >
									<span style="background-color:#f1416c;border-radius: 8px;padding: 5px 15px 5px 15px;color: white; display: none;" id="mb_err"> Not Matched...</span>
									<span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;display: none;"  id="mb_success">Verified</span>
									<!-- <span style="background-color:#50cd89;border-radius: 8px;padding: 5px 15px 5px 15px;">Matched...</span> -->
								</label>
							</div>
						<!-- </div> -->
						<div class="row">
							<div class="col-lg-12 d-flex justify-content-center">
								<button type="reset" id="cancel_btn" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button>
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="generate_otp();" id="generate_btn">Send OTP to Verify</button>
								<button class="btn btn-sm btn-outline btn-outline-solid btn-outline-warning btn-active-light-primary me-2" onclick="check_mobile();" id="verify_btn" style="display: none;">Verify</button>
							</div>
							</div>
						</div>
						<!-- <div class="d-flex justify-content-end mt-6 px-9">
							<button type="reset" class="btn btn-secondary me-3" data-bs-dismiss="modal">Cancel</button> -->
							<!-- <button class="btn btn-primary">Ok</button> -->
						<!-- </div> -->
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - view payment-->
		</div>
	</div>
		<?php $this->load->view("script"); ?>
		<input type="hidden" id="baseurl" value="<?php echo base_url(); ?>">
		<script src="<?php echo base_url();?>assets/jquery.autocomplete.js"></script>
		<!-- <script src="js/products-list.js"></script> -->
		<!-- Flash Data Script::Start -->
		<script>													
                    $(document).ready( function() {
        document.getElementById("pop_up_success").click()
        });
        </script>
		<!-- Flash Data Script::End -->
		<!-- Sales list day fillter start -->

	<script>
	function cash_on()
		{
		
			var req_cash = $('#current_gold_rate').val();
			var proc_cash = $('#gold_tbox').val();
			
			var sub = proc_cash / req_cash ;
			
			$('#net_gm_lab').html(sub.toFixed(3));
			$('#net_gm_lab1').val(sub.toFixed(3));
			
		}
		function first_nm_party()
		{
			var p_fname = $('#party_name').val();
			var p_lname = $('#lab_name').val();
			var p_city = $('#city').val();
			var p_area = $('#area').val();
			var p_mob = $('#mobile').val();
			var p_addr = $('#address').val();
			if(p_fname == "")	
			{
				//alert("if");
				$('#party_name').val("");
				$('#lab_name').val("");
				$('#city').val("");
				$('#area').val("");
				$('#mobile').val("");
				$('#address').val("");
			}
			// document.getElementById('btn_verify_popup').style.display="none";
		}

		var baseurl = $("#baseurl").val();
		 

	        $("#party_name").autocomplete({ 
	                valueKey:'title',
	                source:[{
	                url:baseurl+'Chit_entry/userList?query=%QUERY%',
	                type:'remote',
	                ajax:{
	                  dataType : 'json',
	                }
	            }]}).on('selected.xdsoft',function(e,suggestion,ui){ 
	                $("#party_name").val(suggestion.firstname);
	                $('#party_id_hidden').val(suggestion.id);
					// $('#party_photo').val(suggestion.party_photo);
	                
	            
	                $("#lab_name").html(suggestion.lastname);
	                if(suggestion.rating==1){
	                	r='<i class="fa-solid fa-star" style="color:red;"></i>&nbsp;Bad';	
	                }
	                else if(suggestion.rating==2){
	                	r='<i class="fa-solid fa-star" style="color:#ffc700;"></i>&nbsp;Average';	
	                }
	                else if(suggestion.rating==3){
	                	r='<i class="fa-solid fa-star" style="color:#50cd89;"></i>&nbsp;Good';	
	                }
	                else{
	                	r='<i class="fa-solid fa-star" style="color:#d2d4dc;"></i>&nbsp;-';	
	                }
	                $("#rating").html(r);
	                $("#address").html(suggestion.address);
	                $("#mobile").html(suggestion.phone);
	                $("#pop_mobile_no").html(suggestion.phone);
					$("#membership_card_no").html(suggestion.member_id);
					if(suggestion.member_id != '')
					{
						$("#verify_icon").html('<i class="fas fa-times-circle fs-5" style="color:red;"></i>');
					}
					$("#pop_member_card").html(suggestion.member_id);
					$("#membership_card_points").html(suggestion.member_points);
					$("#pop_member_points").html(suggestion.member_points);
					if(suggestion.phone == '')
					{
						document.getElementById('kt_mobile_modal').style.display = "none";
					}
					else{
						document.getElementById('kt_mobile_modal').style.display = "block";
					}
					if (suggestion.member_id == '') 
					{
						document.getElementById('new_membership').style.display = "block";
						document.getElementById('verify_membership').style.display = "none";
					}
					else
					{
						document.getElementById('new_membership').style.display = "none";
						document.getElementById('verify_membership').style.display = "block";
					}
					var mid = suggestion.member_id;
					var pid= $("#party_id_hidden").val();
					$.ajax({
					type: "POST",
					url: baseurl+'Chit_entry/get_photo3',
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
						url: baseurl+'Chit_entry/get_card_type',
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
						$(document).ready(function(){
						$("#verify_button").click(function(){
							var scan = document.getElementById("scan_he").value;
							// var card = document.getElementById("pop_member_card");
							// alert(scan)
							// alert(card)
							if (scan != '') 
							{
								if (scan == mid) 
								{
									// alert(1)
									document.getElementById("not_match").style.display="none";
									document.getElementById("matched").style.display="block";
									document.getElementById("verifying").style.display="none";
									$("#verify_icon").html('<i class="fas fa-check-circle fs-5" style="color:#03A013;"></i>');
									document.getElementById("verify_membership").style.display="none";
								}
								else
								{
									// alert(2)
									document.getElementById("not_match").style.display="block";
									document.getElementById("matched").style.display="none";
									document.getElementById("verifying").style.display="none";
									$("#verify_icon").html('<i class="fas fa-times-circle fs-5" style="color:red;"></i>');
									document.getElementById("verify_membership").style.display="block";
									
								}
							}
							else
							{
								// alert(2)
								document.getElementById("scan_he_err").style.display="block";
							}
						});
						});
						
				});
			</script>
			<script>
			
			</script>
			<script>
				function chit_coll_type()
				{
					
					var collection_type = document.getElementById("collection_type").value;
					// alert(collection_type);
					var collection_day = document.getElementById("collection_day");
					var day_lab = document.getElementById("day_lab");
					var date_lab = document.getElementById("date_lab");
					var collection_date = document.getElementById("collection_date");
					
					if(collection_type=='2')
					{
						collection_day.style.display="block";
						day_lab.style.display="block";
						date_lab.style.display="none";
						collection_date.style.display="none";
					}
					else if(collection_type=='3')
					{
						collection_day.style.display="none";
						day_lab.style.display="none";
						date_lab.style.display="block";
						collection_date.style.display="block";
					}
					else
					{
						collection_day.style.display="none";
						day_lab.style.display="none";
						date_lab.style.display="none";
						collection_date.style.display="none";
					}
				}
			</script>


		<script>

		

			function new_chit_entry_validation(){
				// alert("hi");
				var err = 0;
				var chit_date = $('#kt_daterangepicker_chit_entry_add_date').val();
				var party_name = $('#party_name').val();
				var chit_amount = $('#chit_amount').val();
				var collection_type = $('#collection_type').val();
				// var collec_day = $('#collec_day').val();
				// var collection_date = $('#kt_daterangepicker_collec_date').val();
				// var cus_rating = $("#cus_rating").val();
				// var m_points_ad = $("#m_points_ad").val();
				// // alert(party_name);
				if(chit_date.trim()==''){
					$('#date_err').html('Date is required!');
					err++;
				}else{
					$('#date_err').html('');
				}
				if(party_name.trim()==''){
					$('#party_id_err').html('Party Name is required!');
					err++;
				}else{
					$('#party_id_err').html('');
				}
				if(chit_amount.trim()==''){
					$('#chit_amount_err').html('Chit Amount is required!');
					err++;
				}else{
					$('#chit_amount_err').html('');
				}
				if(collection_type.trim()==''){
					$('#collection_type_err').html('Collection Type is required!');
					err++;
				}else{
					$('#collection_type_err').html('');
				}
				// if(collec_day.trim()==''){
				// 	$('#collection_day_err').html('Collection Day is required!');
				// 	err++;
				// }else{
				// 	$('#collection_day_err').html('');
				// }
				// if(collection_date.trim()==''){
				// 	$('#collec_date_err').html('Collection Date is required!');
				// 	err++;
				// }else{
				// 	$('#collec_date_err').html('');
				// }
				// if(cus_rating.trim()==''){
				// 	$('#cus_rating_err').html('Customer Rating is required!');
				// 	err++;
				// }else{
				// 	$('#cus_rating_err').html('');
				// }
				// if(m_points_ad.trim()==''){
				// 	$('#m_points_ad_err').html('Membership Point is required!');
				// 	err++;
				// }else{
				// 	$('#m_points_ad_err').html('');
				// }
				
				// alert(err);	
				if(err>0){ return false; }else{ return true; }


			}

			function sel_cash(id){
				if(id == 0) {
					document.getElementById('sel_cash').style.display="block";
					document.getElementById('thanga_cash').style.display="none";
					
				}else if(id == 1){
						document.getElementById('sel_cash').style.display="none";
						document.getElementById('thanga_cash').style.display="block";
							
				}

			}

			function thanga_cash(id){
				if(id == 0) {
					document.getElementById('thang_cash').style.display="block";
					document.getElementById('thang_gold').style.display="none";
					
				}else if(id == 1){
					document.getElementById('thang_cash').style.display="none";
					document.getElementById('thang_gold').style.display="block";
							
				}
			}



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
					document.getElementById('generated_otp').style.display="none";
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
						document.getElementById('verify_btn').style.display="none";
						document.getElementById('cancel_btn').style.display="none";
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
				document.getElementById("generate_btn").style.display="none";
				document.getElementById("verify_btn").style.display="block";

			}
			function date_fill_sales_list()
			{
				var dt_fill_sales_list = document.getElementById('dt_fill_sales_list').value;
				var today_dt_sales_list = document.getElementById('today_dt_sales_list');
				var week_from_dt_sales_list = document.getElementById('week_from_dt_sales_list');
				var week_to_dt_sales_list = document.getElementById('week_to_dt_sales_list');
				var monthly_dt_sales_list = document.getElementById('monthly_dt_sales_list');
				var from_dt_sales_list = document.getElementById('from_dt_sales_list');
				var to_dt_sales_list = document.getElementById('to_dt_sales_list');
				var from_date_fillter_sales_list = document.getElementById('from_date_fillter_sales_list');
				var to_date_fillter_sales_list = document.getElementById('to_date_fillter_sales_list');

				if (dt_fill_sales_list == "today") 
				{
					today_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#today_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else if (dt_fill_sales_list == "week")
				{
					today_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "block";
					week_to_dt_sales_list.style.display = "block";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";

					var curr = new Date; // get current date
					var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
					var last = first + 6; // last day is the first day + 6

					var firstday = new Date(curr.setDate(first)).toISOString().slice(0,10);
					firstday = firstday.split("-").reverse().join("-");
					var lastday = new Date(curr.setDate(last)).toISOString().slice(0,10);
					lastday = lastday.split("-").reverse().join("-");
					$('#week_from_date_fillter_sales_list').val(firstday);
					$('#week_to_date_fillter_sales_list').val(lastday);
					
				}
				else if (dt_fill_sales_list == "monthly")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "block";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
					$("#monthly_date_fillter_sales_list").flatpickr({
								dateFormat: "m-Y",
							});
				}
				else if (dt_fill_sales_list == "custom_date")
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "block";
					to_dt_sales_list.style.display = "block";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";

					$("#from_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
					$("#to_date_fillter_sales_list").flatpickr({
								dateFormat: "d-m-Y",
							});
				}
				else
				{
					today_dt_sales_list.style.display = "none";
					monthly_dt_sales_list.style.display = "none";
					from_dt_sales_list.style.display = "none";
					to_dt_sales_list.style.display = "none";
					week_from_dt_sales_list.style.display = "none";
					week_to_dt_sales_list.style.display = "none";
				}
			}
		</script>
		<!-- Sales list day fillter end -->
		<script>
			function itm_ty()
			{
				var item_type = document.getElementById("item_type").value;

				var lot_gold = document.getElementById("lot_gold");
				var lot_silver = document.getElementById("lot_silver");
				if (item_type == "") 
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "none";
				}
				else if (item_type == "gold") 
				{
					lot_gold.style.display = "block";
					lot_silver.style.display = "none";
				}
				else
				{
					lot_gold.style.display = "none";
					lot_silver.style.display = "block";
				}

			};
			function itm_ty_edit()
			{
				var item_type_edit = document.getElementById("item_type_edit").value;

				var lot_gold_edit = document.getElementById("lot_gold_edit");
				var lot_silver_edit = document.getElementById("lot_silver_edit");
				if (item_type_edit == "") 
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "none";
				}
				else if (item_type_edit == "gold") 
				{
					lot_gold_edit.style.display = "block";
					lot_silver_edit.style.display = "none";
				}
				else
				{
					lot_gold_edit.style.display = "none";
					lot_silver_edit.style.display = "block";
				}

			};
			function itm_ty_view()
			{
				var item_type_view = document.getElementById("item_type_view").value;

				var lot_gold_view = document.getElementById("lot_gold_view");
				var lot_silver_view = document.getElementById("lot_silver_view");
				if (item_type_view == "") 
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "none";
				}
				else if (item_type_view == "gold") 
				{
					lot_gold_view.style.display = "block";
					lot_silver_view.style.display = "none";
				}
				else
				{
					lot_gold_view.style.display = "none";
					lot_silver_view.style.display = "block";
				}

			};
		</script>
		<script>

			function cash_sl_add_radio()
			{
				var cash_add_radio = document.getElementById("cash_add_radio");

				var cash_sl_label = document.getElementById("cash_sl_label");
				var cash_sl_tbox = document.getElementById("cash_sl_tbox");
				var cash_sl_detai_label = document.getElementById("cash_sl_detai_label");
				var cash_sl_detai_tbox = document.getElementById("cash_sl_detai_tbox");

				if (cash_add_radio.checked == true)
				{
				    cash_sl_label.style.display = "block";
				    cash_sl_tbox.style.display = "block";
				    cash_sl_detai_label.style.display = "block";
				    cash_sl_detai_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_sl_label.style.display = "none";
				    cash_sl_tbox.style.display = "none";
				    cash_sl_detai_label.style.display = "none";
				    cash_sl_detai_tbox.style.display = "none";
			  	}
			};

			function cheque_sl_add_radio()
			{
				var cheque_add_radio = document.getElementById("cheque_add_radio");

				var cheque_sl_amt_label = document.getElementById("cheque_sl_amt_label");
				var cheque_sl_amt_tbox = document.getElementById("cheque_sl_amt_tbox");
				var cheque_sl_bk_label = document.getElementById("cheque_sl_bk_label");
				var cheque_sl_bk_tbox = document.getElementById("cheque_sl_bk_tbox");
				var cheque_sl_cqno_label = document.getElementById("cheque_sl_cqno_label");
				var cheque_sl_cqno_tbox = document.getElementById("cheque_sl_cqno_tbox");
				var cheque_sl_detail_label = document.getElementById("cheque_sl_detail_label");
				var cheque_sl_detail_tbox = document.getElementById("cheque_sl_detail_tbox");

				if (cheque_add_radio.checked == true)
				{
				    cheque_sl_amt_label.style.display = "block";
				    cheque_sl_amt_tbox.style.display = "block";
				    cheque_sl_bk_label.style.display = "block";
				    cheque_sl_bk_tbox.style.display = "block";
				    cheque_sl_cqno_label.style.display = "block";
				    cheque_sl_cqno_tbox.style.display = "block";
				    cheque_sl_detail_label.style.display = "block";
				    cheque_sl_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		cheque_sl_amt_label.style.display = "none";
				    cheque_sl_amt_tbox.style.display = "none";
				    cheque_sl_bk_label.style.display = "none";
				    cheque_sl_bk_tbox.style.display = "none";
				    cheque_sl_cqno_label.style.display = "none";
				    cheque_sl_cqno_tbox.style.display = "none";
				    cheque_sl_detail_label.style.display = "none";
				    cheque_sl_detail_tbox.style.display = "none";
			  	}
			};

			function rtgs_ln_recev_add_radio()
			{
				var rtgs_add_radio = document.getElementById("rtgs_add_radio");

				var rtgs_amt = document.getElementById("rtgs_amt");
				var rtgs_amt_tbox = document.getElementById("rtgs_amt_tbox");
				var rtgs_bank = document.getElementById("rtgs_bank");
				var rtgs_bank_tbox = document.getElementById("rtgs_bank_tbox");
				var rtgs_no = document.getElementById("rtgs_no");
				var rtgs_no_tbox = document.getElementById("rtgs_no_tbox");
				var rtgs_detail = document.getElementById("rtgs_detail");
				var rtgs_detail_tbox = document.getElementById("rtgs_detail_tbox");

				if (rtgs_add_radio.checked == true)
				{
				    rtgs_amt.style.display = "block";
				    rtgs_amt_tbox.style.display = "block";
				    rtgs_bank.style.display = "block";
				    rtgs_bank_tbox.style.display = "block";
				    rtgs_no.style.display = "block";
				    rtgs_no_tbox.style.display = "block";
				    rtgs_detail.style.display = "block";
				    rtgs_detail_tbox.style.display = "block";
			  	} else 
			  	{
			     	rtgs_amt.style.display = "none";
				    rtgs_amt_tbox.style.display = "none";
				    rtgs_bank.style.display = "none";
				    rtgs_bank_tbox.style.display = "none";
				    rtgs_no.style.display = "none";
				    rtgs_no_tbox.style.display = "none";
				    rtgs_detail.style.display = "none";
				    rtgs_detail_tbox.style.display = "none";
			  	}
			};

			function upi_sl_add_radio()
			{
				var upi_add_radio = document.getElementById("upi_add_radio");

				var upi_sl_amt_label = document.getElementById("upi_sl_amt_label");
				var upi_sl_amt_tbox = document.getElementById("upi_sl_amt_tbox");
				var upi_sl_trno_label = document.getElementById("upi_sl_trno_label");
				var upi_sl_trno_tbox = document.getElementById("upi_sl_trno_tbox");
				var upi_sl_detail_label = document.getElementById("upi_sl_detail_label");
				var upi_sl_detail_tbox = document.getElementById("upi_sl_detail_tbox");;

				if (upi_add_radio.checked == true)
				{
				    upi_sl_amt_label.style.display = "block";
				    upi_sl_amt_tbox.style.display = "block";
				    upi_sl_trno_label.style.display = "block";
				    upi_sl_trno_tbox.style.display = "block";
				    upi_sl_detail_label.style.display = "block";
				    upi_sl_detail_tbox.style.display = "block";
			  	} else 
			  	{
			  		upi_sl_amt_label.style.display = "none";
				    upi_sl_amt_tbox.style.display = "none";
				    upi_sl_trno_label.style.display = "none";
				    upi_sl_trno_tbox.style.display = "none";
				    upi_sl_detail_label.style.display = "none";
				    upi_sl_detail_tbox.style.display = "none";
			  	}
			};

			function cash_lt_ey_radio()
			{
				var cash_lot_entry_radio = document.getElementById("cash_lot_entry_radio");

				var cash_lt_ey_label = document.getElementById("cash_lt_ey_label");
				var cash_lt_ey_tbox = document.getElementById("cash_lt_ey_tbox");

				if (cash_lot_entry_radio.checked == true)
				{
				    cash_lt_ey_label.style.display = "block";
				    cash_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label.style.display = "none";
				    cash_lt_ey_tbox.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio()
			{
				var cheque_lot_entry_radio = document.getElementById("cheque_lot_entry_radio");

				var cheque_lt_ey_label = document.getElementById("cheque_lt_ey_label");
				var cheque_lt_ey_tbox = document.getElementById("cheque_lt_ey_tbox");

				if (cheque_lot_entry_radio.checked == true)
				{
				    cheque_lt_ey_label.style.display = "block";
				    cheque_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label.style.display = "none";
			     	cheque_lt_ey_tbox.style.display = "none";
			  	}
			};
			function cash_tm_cr_radio()
			{
				var cash_tm_create_radio = document.getElementById("cash_tm_create_radio");

				var thangamagal_cr_gd_tbox = document.getElementById("thangamagal_cr_gd_tbox");
				// var thangamagal_cr_gd_tbox = document.getElementById("thangamagal_cr_gd_tbox");

				if (cash_tm_cr_radio.checcked == true) 
				{
					thangamagal_cr_gd_tbox.style.display = "block";
					// thangamagal_cr_gd_tbox.style.display = "block";
				}else
				{
					thangamagal_cr_gd_tbox.style.display = "none";
					// thangamagal_cr_gd_tbox.style.display = "none";
				}
			}
			function gold_tm_cr_radio()
			{
				var gold_tm_create_radio = document.getElementById("gold_tm_create_radio");

				// var thangamagal_cr_ca_tbox = document.getElementById("thangamagal_cr_ca_tbox");
				var thangamagal_cr_ca_tbox = document.getElementById("thangamagal_cr_ca_tbox");

				if (gold_tm_cr_radio.checcked == true) 
				{
					// thangamagal_cr_ca_tbox.style.display = "block";
					thangamagal_cr_ca_tbox.style.display = "block";
				}else
				{
					// thangamagal_cr_ca_tbox.style.display = "none";
					thangamagal_cr_ca_tbox.style.display = "none";
				}
			}

			
			function thangamagal_cr_radio()
			{
				var thangamagal_create_radio = document.getElementById("thangamagal_create_radio");

				var thangamagal_cr_ca_radio = document.getElementById("thangamagal_cr_ca_radio");
				var thangamagal_cr_gd_radio = document.getElementById("thangamagal_cr_gd_radio");
				var thangamagal_cr_ca_label = document.getElementById("thangamagal_cr_ca_label");
				var thangamagal_cr_ca_tbox = document.getElementById("thangamagal_cr_ca_tbox");
				var thangamagal_cr_gd_label = document.getElementById("thangamagal_cr_gd_label");
				var thangamagal_cr_gd_tbox = document.getElementById("thangamagal_cr_gd_tbox");
				var net_wt_lab = document.getElementById("net_wt_lab");
				var net_gm_lab = document.getElementById("net_gm_lab");

				if (thangamagal_create_radio.checked == true)
				{
					thangamagal_cr_ca_radio.style.display = "block";
					thangamagal_cr_gd_radio.style.display = "block";
				    thangamagal_cr_ca_label.style.display = "block";
				    thangamagal_cr_ca_tbox.style.display = "block";
				    thangamagal_cr_gd_label.style.display = "block";
				    thangamagal_cr_gd_tbox.style.display = "block";
				    net_wt_lab.style.display = "block";
				    net_gm_lab.style.display = "block";
			  	} else 
			  	{
					thangamagal_cr_ca_radio.style.display = "none";
			  		thangamagal_cr_gd_radio.style.display = "none";
			     	thangamagal_cr_ca_label.style.display = "none";
				    thangamagal_cr_ca_tbox.style.display = "none";
				    thangamagal_cr_gd_label.style.display = "none";
				    thangamagal_cr_gd_tbox.style.display = "none";
				    net_wt_lab.style.display = "none";
				    net_gm_lab.style.display = "none";
			  	}
			};
			function selvamagal_dp_radio()
			{
				var selvamagal_deposit_radio = document.getElementById("selvamagal_deposit_radio");

				var selvamagal_dp_ca_label = document.getElementById("selvamagal_dp_ca_label");
				var selvamagal_dp_ca_tbox = document.getElementById("selvamagal_dp_ca_tbox");

				if (selvamagal_deposit_radio.checked == true)
				{
				    selvamagal_dp_ca_label.style.display = "block";
				    selvamagal_dp_ca_tbox.style.display = "block";
			  	} else 
			  	{
			     	selvamagal_dp_ca_label.style.display = "none";
			     	selvamagal_dp_ca_tbox.style.display = "none";
			  	}
			};
			function thangamagal_dp_radio()
			{
				var thangamagal_deposit_radio = document.getElementById("thangamagal_deposit_radio");

				var thangamagal_dp_ca_label = document.getElementById("thangamagal_dp_ca_label");
				var thangamagal_dp_ca_tbox = document.getElementById("thangamagal_dp_ca_tbox");
				var thangamagal_dp_gd_label = document.getElementById("thangamagal_dp_gd_label");
				var thangamagal_dp_gd_tbox = document.getElementById("thangamagal_dp_gd_tbox");

				if (thangamagal_deposit_radio.checked == true)
				{
				    thangamagal_dp_ca_label.style.display = "block";
				    thangamagal_dp_ca_tbox.style.display = "block";
				    thangamagal_dp_gd_label.style.display = "block";
				    thangamagal_dp_gd_tbox.style.display = "block";
			  	} else 
			  	{
			     	thangamagal_dp_ca_label.style.display = "none";
				    thangamagal_dp_ca_tbox.style.display = "none";
				    thangamagal_dp_gd_label.style.display = "none";
				    thangamagal_dp_gd_tbox.style.display = "none";
			  	}
			};
			function selvamagal_wd_radio()
			{
				var selvamagal_withdraw_radio = document.getElementById("selvamagal_withdraw_radio");

				var selvamagal_wd_ca_label = document.getElementById("selvamagal_wd_ca_label");
				var selvamagal_wd_ca_tbox = document.getElementById("selvamagal_wd_ca_tbox");

				if (selvamagal_withdraw_radio.checked == true)
				{
				    selvamagal_wd_ca_label.style.display = "block";
				    selvamagal_wd_ca_tbox.style.display = "block";
			  	} else 
			  	{
			     	selvamagal_wd_ca_label.style.display = "none";
			     	selvamagal_wd_ca_tbox.style.display = "none";
			  	}
			};
			function thangamagal_wd_radio()
			{
				var thangamagal_withdraw_radio = document.getElementById("thangamagal_withdraw_radio");

				var thangamagal_wd_ca_label = document.getElementById("thangamagal_wd_ca_label");
				var thangamagal_wd_ca_tbox = document.getElementById("thangamagal_wd_ca_tbox");
				var thangamagal_wd_gd_label = document.getElementById("thangamagal_wd_gd_label");
				var thangamagal_wd_gd_tbox = document.getElementById("thangamagal_wd_gd_tbox");

				if (thangamagal_withdraw_radio.checked == true)
				{
				    thangamagal_wd_ca_label.style.display = "block";
				    thangamagal_wd_ca_tbox.style.display = "block";
				    thangamagal_wd_gd_label.style.display = "block";
				    thangamagal_wd_gd_tbox.style.display = "block";
			  	} else 
			  	{
			     	thangamagal_wd_ca_label.style.display = "none";
				    thangamagal_wd_ca_tbox.style.display = "none";
				    thangamagal_wd_gd_label.style.display = "none";
				    thangamagal_wd_gd_tbox.style.display = "none";
			  	}
			};
			function rtgs_lt_ey_radio()
			{
				var rtgs_lot_entry_radio = document.getElementById("rtgs_lot_entry_radio");

				var rtgs_lt_ey_check = document.getElementById("rtgs_lt_ey_check");
				var rtgs_lt_ey_label = document.getElementById("rtgs_lt_ey_label");
				var rtgs_lt_ey_tbox = document.getElementById("rtgs_lt_ey_tbox");
				var bank_lt_ey_check = document.getElementById("bank_lt_ey_check");
				var bank_lt_ey_label = document.getElementById("bank_lt_ey_label");
				var bank_lt_ey_tbox = document.getElementById("bank_lt_ey_tbox");

				if (rtgs_lot_entry_radio.checked == true)
				{
				    rtgs_lt_ey_check.style.display = "block";
					rtgs_lt_ey_label.style.display = "block";
				    rtgs_lt_ey_tbox.style.display = "block";
					bank_lt_ey_check.style.display = "block";
				    bank_lt_ey_label.style.display = "block";
				    bank_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
					rtgs_lt_ey_label.style.display = "none";
			     	rtgs_lt_ey_check.style.display = "none";
			     	rtgs_lt_ey_tbox.style.display = "none";
					bank_lt_ey_check.style.display = "none";
			     	bank_lt_ey_label.style.display = "none";
			     	bank_lt_ey_tbox.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio()
			{
				var metal_lot_entry_radio = document.getElementById("metal_lot_entry_radio");

				var metal_lt_ey_label = document.getElementById("metal_lt_ey_label");
				var metal_lt_ey_tbox = document.getElementById("metal_lt_ey_tbox");
				var purity_lt_ey_label = document.getElementById("purity_lt_ey_label");
				var purity_lt_ey_tbox = document.getElementById("purity_lt_ey_tbox");
				var rate_lt_ey_label = document.getElementById("rate_lt_ey_label");
				var rate_lt_ey_tbox = document.getElementById("rate_lt_ey_tbox");
				var mtamt_lt_ey_label = document.getElementById("mtamt_lt_ey_label");
				var mtamt_lt_ey_tbox = document.getElementById("mtamt_lt_ey_tbox");

				if (metal_lot_entry_radio.checked == true)
				{
				    metal_lt_ey_label.style.display = "block";
			     	metal_lt_ey_tbox.style.display = "block";
			     	purity_lt_ey_label.style.display = "block";
			     	purity_lt_ey_tbox.style.display = "block";

			     	rate_lt_ey_label.style.display = "block";
			     	rate_lt_ey_tbox.style.display = "block";
			     	mtamt_lt_ey_label.style.display = "block";
			     	mtamt_lt_ey_tbox.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label.style.display = "none";
			     	metal_lt_ey_tbox.style.display = "none";
			     	purity_lt_ey_label.style.display = "none";
			     	purity_lt_ey_tbox.style.display = "none";

			     	rate_lt_ey_label.style.display = "none";
			     	rate_lt_ey_tbox.style.display = "none";
			     	mtamt_lt_ey_label.style.display = "none";
			     	mtamt_lt_ey_tbox.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_edit()
			{
				var cash_lot_entry_radio_edit = document.getElementById("cash_lot_entry_radio_edit");

				var cash_lt_ey_label_edit = document.getElementById("cash_lt_ey_label_edit");
				var cash_lt_ey_tbox_edit = document.getElementById("cash_lt_ey_tbox_edit");

				if (cash_lot_entry_radio_edit.checked == true)
				{
				    cash_lt_ey_label_edit.style.display = "block";
				    cash_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_edit.style.display = "none";
				    cash_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_edit()
			{
				var cheque_lot_entry_radio_edit = document.getElementById("cheque_lot_entry_radio_edit");

				var cheque_lt_ey_label_edit = document.getElementById("cheque_lt_ey_label_edit");
				var cheque_lt_ey_tbox_edit = document.getElementById("cheque_lt_ey_tbox_edit");

				if (cheque_lot_entry_radio_edit.checked == true)
				{
				    cheque_lt_ey_label_edit.style.display = "block";
				    cheque_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_edit.style.display = "none";
			     	cheque_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_edit()
			{
				var rtgs_lot_entry_radio_edit = document.getElementById("rtgs_lot_entry_radio_edit");

				var rtgs_lt_ey_label_edit = document.getElementById("rtgs_lt_ey_label_edit");
				var rtgs_lt_ey_tbox_edit = document.getElementById("rtgs_lt_ey_tbox_edit");
				var bank_lt_ey_label_edit = document.getElementById("bank_lt_ey_label_edit");
				var bank_lt_ey_tbox_edit = document.getElementById("bank_lt_ey_tbox_edit");

				if (rtgs_lot_entry_radio_edit.checked == true)
				{
				    rtgs_lt_ey_label_edit.style.display = "block";
				    rtgs_lt_ey_tbox_edit.style.display = "block";
				    bank_lt_ey_label_edit.style.display = "block";
				    bank_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_edit.style.display = "none";
			     	rtgs_lt_ey_tbox_edit.style.display = "none";
			     	bank_lt_ey_label_edit.style.display = "none";
			     	bank_lt_ey_tbox_edit.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_edit()
			{
				var metal_lot_entry_radio_edit = document.getElementById("metal_lot_entry_radio_edit");

				var metal_lt_ey_label_edit = document.getElementById("metal_lt_ey_label_edit");
				var metal_lt_ey_tbox_edit = document.getElementById("metal_lt_ey_tbox_edit");
				var purity_lt_ey_label_edit = document.getElementById("purity_lt_ey_label_edit");
				var purity_lt_ey_tbox_edit = document.getElementById("purity_lt_ey_tbox_edit");
				var rate_lt_ey_label_edit = document.getElementById("rate_lt_ey_label_edit");
				var rate_lt_ey_tbox_edit = document.getElementById("rate_lt_ey_tbox_edit");
				var mtamt_lt_ey_label_edit = document.getElementById("mtamt_lt_ey_label_edit");
				var mtamt_lt_ey_tbox_edit = document.getElementById("mtamt_lt_ey_tbox_edit");

				if (metal_lot_entry_radio_edit.checked == true)
				{
				    metal_lt_ey_label_edit.style.display = "block";
			     	metal_lt_ey_tbox_edit.style.display = "block";
			     	purity_lt_ey_label_edit.style.display = "block";
			     	purity_lt_ey_tbox_edit.style.display = "block";

			     	rate_lt_ey_label_edit.style.display = "block";
			     	rate_lt_ey_tbox_edit.style.display = "block";
			     	mtamt_lt_ey_label_edit.style.display = "block";
			     	mtamt_lt_ey_tbox_edit.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_edit.style.display = "none";
			     	metal_lt_ey_tbox_edit.style.display = "none";
			     	purity_lt_ey_label_edit.style.display = "none";
			     	purity_lt_ey_tbox_edit.style.display = "none";

			     	rate_lt_ey_label_edit.style.display = "none";
			     	rate_lt_ey_tbox_edit.style.display = "none";
			     	mtamt_lt_ey_label_edit.style.display = "none";
			     	mtamt_lt_ey_tbox_edit.style.display = "none";
			  	}
			};
		</script>
		<script>
			function cash_lt_ey_radio_view()
			{
				var cash_lot_entry_radio_view = document.getElementById("cash_lot_entry_radio_view");

				var cash_lt_ey_label_view = document.getElementById("cash_lt_ey_label_view");
				var cash_lt_ey_tbox_view = document.getElementById("cash_lt_ey_tbox_view");

				if (cash_lot_entry_radio_view.checked == true)
				{
				    cash_lt_ey_label_view.style.display = "block";
				    cash_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			  		cash_lt_ey_label_view.style.display = "none";
				    cash_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function cheque_lt_ey_radio_view()
			{
				var cheque_lot_entry_radio_view = document.getElementById("cheque_lot_entry_radio_view");

				var cheque_lt_ey_label_view = document.getElementById("cheque_lt_ey_label_view");
				var cheque_lt_ey_tbox_view = document.getElementById("cheque_lt_ey_tbox_view");

				if (cheque_lot_entry_radio_view.checked == true)
				{
				    cheque_lt_ey_label_view.style.display = "block";
				    cheque_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	cheque_lt_ey_label_view.style.display = "none";
			     	cheque_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function rtgs_lt_ey_radio_view()
			{
				var rtgs_lot_entry_radio_view = document.getElementById("rtgs_lot_entry_radio_view");

				var rtgs_lt_ey_label_view = document.getElementById("rtgs_lt_ey_label_view");
				var rtgs_lt_ey_tbox_view = document.getElementById("rtgs_lt_ey_tbox_view");
				var bank_lt_ey_label_view = document.getElementById("bank_lt_ey_label_view");
				var bank_lt_ey_tbox_view = document.getElementById("bank_lt_ey_tbox_view");

				if (rtgs_lot_entry_radio_view.checked == true)
				{
				    rtgs_lt_ey_label_view.style.display = "block";
				    rtgs_lt_ey_tbox_view.style.display = "block";
				    bank_lt_ey_label_view.style.display = "block";
				    bank_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	rtgs_lt_ey_label_view.style.display = "none";
			     	rtgs_lt_ey_tbox_view.style.display = "none";
			     	bank_lt_ey_label_view.style.display = "none";
			     	bank_lt_ey_tbox_view.style.display = "none";
			  	}
			};

			function metal_lt_ey_radio_view()
			{
				var metal_lot_entry_radio_view = document.getElementById("metal_lot_entry_radio_view");

				var metal_lt_ey_label_view = document.getElementById("metal_lt_ey_label_view");
				var metal_lt_ey_tbox_view = document.getElementById("metal_lt_ey_tbox_view");
				var purity_lt_ey_label_view = document.getElementById("purity_lt_ey_label_view");
				var purity_lt_ey_tbox_view = document.getElementById("purity_lt_ey_tbox_view");
				var rate_lt_ey_label_view = document.getElementById("rate_lt_ey_label_view");
				var rate_lt_ey_tbox_view = document.getElementById("rate_lt_ey_tbox_view");
				var mtamt_lt_ey_label_view = document.getElementById("mtamt_lt_ey_label_view");
				var mtamt_lt_ey_tbox_view = document.getElementById("mtamt_lt_ey_tbox_view");

				if (metal_lot_entry_radio_view.checked == true)
				{
				    metal_lt_ey_label_view.style.display = "block";
			     	metal_lt_ey_tbox_view.style.display = "block";
			     	purity_lt_ey_label_view.style.display = "block";
			     	purity_lt_ey_tbox_view.style.display = "block";

			     	rate_lt_ey_label_view.style.display = "block";
			     	rate_lt_ey_tbox_view.style.display = "block";
			     	mtamt_lt_ey_label_view.style.display = "block";
			     	mtamt_lt_ey_tbox_view.style.display = "block";
			  	} else 
			  	{
			     	metal_lt_ey_label_view.style.display = "none";
			     	metal_lt_ey_tbox_view.style.display = "none";
			     	purity_lt_ey_label_view.style.display = "none";
			     	purity_lt_ey_tbox_view.style.display = "none";

			     	rate_lt_ey_label_view.style.display = "none";
			     	rate_lt_ey_tbox_view.style.display = "none";
			     	mtamt_lt_ey_label_view.style.display = "none";
			     	mtamt_lt_ey_tbox_view.style.display = "none";
			  	}
			};
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_add').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_edit').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_edit').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>
			$('#kt_docs_repeater_basic_silver_view').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
			$('#kt_docs_repeater_basic_gold_view').repeater({
			    initEmpty: false,

			    defaultValues: {
			        'text-input': 'foo'
			    },

			    show: function () {
			        $(this).slideDown();
			    },

			    hide: function (deleteElement) {
			        $(this).slideUp(deleteElement);
			    }
			});
		</script>
		<script>

				$("#kt_daterangepicker_lot_entry_from").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_to").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_chit_entry_add_date").flatpickr({
								// dateFormat: "<?php// echo $format; ?>",
								dateFormat: "d-m-Y",
								maxDate: "today",
							});
				$("#kt_daterangepicker_collec_date").flatpickr({
								dateFormat: "d-m-Y",
							});
							
				$("#kt_daterangepicker_lot_entry_edit_date").flatpickr({
								dateFormat: "d-m-Y",
							});
				$("#kt_daterangepicker_lot_entry_view_date").flatpickr({
								dateFormat: "d-m-Y",
							});

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
	</body>
	<!--end::Body-->
</html>

