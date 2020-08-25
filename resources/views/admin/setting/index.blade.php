@extends('layouts.app')
@section('page_name') Setting @endsection
@section('section_header') Setting @endsection
@section('breadcrumb')
    <div class="breadcrumb-item"><a href="/">Home</a>
    </div>
    <div class="breadcrumb-item active">Setting</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Jump To</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Email</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="tab-content no-padding" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                    <form method="post" enctype="multipart/form-data" action="{{route('settings.store')}}" >
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>General Settings</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                                <div class="form-group row align-items-center">
                                    <label for="site_title" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input class="form-control" id="site_title" name="site_title" type="text">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="site_logo" class="custom-file-input" id="site_logo">
                                            <label class="custom-file-label" for="site_logo">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB(32 x 32) & PNG only</div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="site_favicon" class="custom-file-input" id="site_favicon">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB & ICO only <small>You may use converter
                                                <a href="https://favicon.io/favicon-converter/">favicon.io</a></small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" type="submit" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                    <form id="mail-form" method="post">
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>Email Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Your Mail Address</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="site_title" class="form-control" id="site-title">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="form-control-label col-sm-3 mt-3 text-md-right">Google Analytics Code</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control codeeditor" name="google_analytics_code"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>


        </div>
    </div>
@endsection
@section('script')
{{--    {!! $generalValidator->selector('#generalForm') !!}--}}
{{--    {!! $passValidator->selector('#passForm') !!}--}}
@endsection
