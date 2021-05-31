@extends('layouts.backend')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
				<!--begin::Title-->
				<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard</h1>
				<!--end::Title-->
				<!--begin::Separator-->
				<span class="h-20px border-gray-200 border-start mx-4"></span>


			</div>

			<div class="d-flex align-items-center py-1">
				<!--begin::Wrapper-->
				<div class="me-4">

				</div>

			</div>
			<!--end::Actions-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container-fluid">
			<div class="row g-5 g-xl-10">
				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-white hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotone/Media/Equalizer.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
										<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
										<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
										<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
							<div class="text-inverse-white fw-bolder fs-2 mb-2 mt-5">500</div>
							<div class="fw-bold text-inverse-white fs-7">Total Products</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>
				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotone/Home/Building.svg-->
							<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000" />
										<rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1" />
										<path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
							<div class="text-inverse-dark fw-bolder fs-2 mb-2 mt-5">3000</div>
							<div class="fw-bold text-inverse-dark fs-7">Total Downloads</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>
				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->
							<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
								</svg>
							</span>
							<!--end::Svg Icon-->
							<div class="text-inverse-warning fw-bolder fs-2 mb-2 mt-5">50,00</div>
							<div class="fw-bold text-inverse-warning fs-7">Total Drafts</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>
				<div class="col-xl-3">
					<!--begin::Statistics Widget 5-->
					<a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotone/Shopping/Chart-pie.svg-->
							<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3" />
										<path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000" />
									</g>
								</svg>
							</span>
							<!--end::Svg Icon-->
							<div class="text-inverse-info fw-bolder fs-2 mb-2 mt-5">50,00</div>
							<div class="fw-bold text-inverse-info fs-7">Total Sale</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>
			</div>
			<!-- chart -->
			<div class="row g-5 g-xl-10">
				<div class="col-xl-12">
					<!--begin::Charts Widget 3-->
					<div class="card card-xl-stretch mb-xl-8">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder fs-3 mb-1">Total Resources Download</span>
								<span class="text-muted fw-bold fs-7">(1000) Downloads This Month</span>
							</h3>
							<!--begin::Toolbar-->
							<div class="card-toolbar" data-kt-buttons="true">
								<a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_3_year_btn">Year</a>
								<a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_3_month_btn">Month</a>
								<a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="kt_charts_widget_3_week_btn">Week</a>
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Chart-->
							<div id="kt_charts_widget_3_chart" style="height: 350px"></div>
							<!--end::Chart-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Charts Widget 3-->
				</div>
			</div>
			<!-- table -->
			<div class="row g-5 g-xl-8">
				<div class="row g-5 g-xl-8">
					<!--begin::Col-->
					<div class="col-xl-6">
						<!--begin::Tables Widget 1-->
						<div class="card card-xl-stretch mb-xl-8">
							<!--begin::Header-->
							<div class="card-header border-0 pt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label fw-bolder fs-3 mb-1">Top Downloaded File</span>
									<!-- <span class="text-muted fw-bold fs-7">Pending 10 tasks</span> -->
								</h3>
								<div class="card-toolbar">
									<!--begin::Menu-->
									<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
										<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
													<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
													<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
													<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</button>
								</div>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body py-3">
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
												<!--begin::Table head-->
												<thead>
													<tr class="fw-bolder text-muted">
														<th class="min-w-150px">File Name & Preview</th>
														<th class="min-w-100px text-end">Downloads</th>
													</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
													<tr>
														<td>
															<div class="d-flex align-items-center">
																<div class="symbol symbol-45px me-5">
																	<img src="{{asset('public/backend')}}/assets/media/avatars/150-11.jpg" alt="">
																</div>
																<div class="d-flex justify-content-start flex-column">
																	<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Home Banner</a>
																	<span class="text-muted fw-bold text-muted d-block fs-7">Premium File</span>
																</div>
															</div>
														</td>
														<td class="text-end">
														<span class="text-muted fw-bold">4600 </span>
														</td>
													</tr>
												</tbody>
												<!--end::Table body-->
											</table>
									<!--end::Table-->
								</div>
								<!--end::Table container-->
							</div>
						</div>
						<!--endW::Tables Widget 1-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-xl-6">
						<!--begin::Tables Widget 1-->
						<div class="card card-xl-stretch mb-xl-8">
							<!--begin::Header-->
							<div class="card-header border-0 pt-5">
								<h3 class="card-title align-items-start flex-column">
									<span class="card-label fw-bolder fs-3 mb-1">Top Downloaded Category</span>
									<!-- <span class="text-muted fw-bold fs-7">Pending 10 tasks</span> -->
								</h3>
								<div class="card-toolbar">
									<!--begin::Menu-->
									<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
										<!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
										<span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
													<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
													<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
													<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
												</g>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</button>
									<!--begin::Menu 1-->
								
									<!--end::Menu 1-->
									<!--end::Menu-->
								</div>
							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body py-3">
								<!--begin::Table container-->
								<div class="table-responsive">
									<!--begin::Table-->
									<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
												<!--begin::Table head-->
												<thead>
													<tr class="fw-bolder text-muted">
														<th class="min-w-150px">Category & Preview</th>
														<th class="min-w-100px text-end">Downloads</th>
													</tr>
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody>
													<tr>
														<td>
															<div class="d-flex align-items-center">
																<div class="symbol symbol-45px me-5">
																	<img src="{{asset('public/backend')}}/assets/media/avatars/150-11.jpg" alt="">
																</div>
																<div class="d-flex justify-content-start flex-column">
																	<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">UI Template</a>
																	<span class="text-muted fw-bold text-muted d-block fs-7">Premium File</span>
																</div>
															</div>
														</td>
														<td class="text-end">
														<span class="text-muted fw-bold">4600 </span>
														</td>
													</tr>
												</tbody>
												<!--end::Table body-->
											</table>
									<!--end::Table-->
								</div>
								<!--end::Table container-->
							</div>
						</div>
						<!--endW::Tables Widget 1-->
					</div>
					<!--end::Col-->
				</div>
			</div>

		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
@endsection