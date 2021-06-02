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
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Update Blog</h1>
                <!--end::Title-->
            </div>

        </div>
        <!--end::Container-->
    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin:Form-->
                    <form id="kt_modal_new_target_form" class="form" action="{{route('admin.blog.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3"></h1>

                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Title</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter Blog Title" name="blog_title" value="{{$blog->title}}" />
                                @error('blog_title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-bold mb-2">Category</label>
                                <select id="searchitem" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select a Category" name="blog_category">
                                    <option value="">....Select Category...</option>
                                    @foreach($categores as $row)
                                    <option {{ $blog->id === $row->id ?'selected': ' '}} value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                @error('blog_category')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="required fs-6 fw-bold mb-2">Details</label>

                            <textarea class="form-control form-control-solid" id="editor1" rows="3" name="blog_details" placeholder="Type Target Details"></textarea>
                            @error('blog_details')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="required">Tags</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target priorty"></i>
                                </label>
                                <!--end::Label-->
                                <input class="form-control form-control-solid" id="tags" value="" name="blog_tags" />
                                @error('tags')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <!--end::Input group-->
                            <div class="d-flex flex-column mb-8 fv-row">
                                <div class="row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Thumbnail Image</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target priorty"></i>
                                    </label>
                                    <div id="thumbnail_img"></div>
                                </div>
                                @error('thumbnail_img')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                    <span class="indicator-label">Update</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
</div>
</div>

@endsection