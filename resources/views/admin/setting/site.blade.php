@extends('admin.setting.index')

@section('admin.setting.breadcrumbs')
{{ Breadcrumbs::render('site-setting') }}
@endsection

@section('admin.setting.layout')
<div class="col-md-9">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.setting.site-update') }}"
                enctype="multipart/form-data">
                @csrf
                <fieldset class="setting-fieldset">
                    <legend class="setting-legend">{{ __('General Setting') }}</legend>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_name">{{ __('levels.site_name') }}</label>
                                <span class="text-danger">*</span>
                                <input name="site_name" id="site_name" type="text"
                                    class="form-control @error('site_name') is-invalid @enderror"
                                    value="{{ old('site_name', setting('site_name')) }}">
                                @error('site_name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label
                                    for="site_phone_number">{{ __('Site Phone Number') }}</label>
                                <span class="text-danger">*</span>
                                <input name="site_phone_number" id="site_phone_number" type="text"

                                    class="form-control @error('site_phone_number') is-invalid @enderror"
                                    value="{{ old('site_phone_number', setting('site_phone_number')) }}">
                                @error('site_phone_number')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="site_footer">{{ __('levels.site_footer') }}</label> <span
                                    class="text-danger">*</span>
                                <input name="site_footer" id="site_footer"
                                    class="form-control @error('site_footer') is-invalid @enderror"
                                    value="{{ old('site_footer', setting('site_footer')) }}">
                                @error('site_footer')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="site_address">{{ __('Site Address') }}</label> <span
                                    class="text-danger">*</span>
                                <textarea name="site_address" id="site_address" cols="30" rows="3"
                                          class="form-control small-textarea-height @error('site_address') is-invalid @enderror">{{ old('site_address', setting('site_address')) }}</textarea>
                                @error('site_address')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customFile">{{ __('levels.site_logo') }}</label>
                                <div class="custom-file">
                                    <input name="site_logo" type="file"
                                        class="file-upload-input custom-file-input @error('site_logo') is-invalid @enderror"
                                        id="customFile" onchange="readURL(this);">
                                    <label class="custom-file-label" for="customFile">{{ __('Choose
                                                                    file') }}</label>
                                </div>
                                @error('site_logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                                @if(setting('site_logo'))
                                <img class="img-thumbnail image-width mt-4 mb-3" id="previewImage"
                                    src="{{ asset('images/'.setting('site_logo')) }}"
                                    alt="{{ __('visitor pass Logo') }}" />
                                @else
                                <img class="img-thumbnail image-width mt-4 mb-3" id="previewImage"
                                    src="{{ asset('images/site_logo.png') }}" alt="{{ __('Visitor pass Logo') }}" />
                                @endif
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="site_email">{{ __('levels.site_email') }}</label> <span
                                    class="text-danger">*</span>
                                <input name="site_email" id="site_email"
                                    class="form-control @error('site_email') is-invalid @enderror"
                                    value="{{ old('site_email', setting('site_email')) }}">
                                @error('site_email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="timezone">{{ __('levels.timezone') }}</label> <span
                                    class="text-danger">*</span>
                                <?php
                                        $className = 'form-control';
                                        if($errors->first('timezone')) {
                                            $className = 'form-control is-invalid';
                                        }
                                        echo Timezonelist::create('timezone', setting('timezone') , ['class'=> $className]); ?>
                                @error('timezone')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="site_description">{{ __('levels.description') }}</label> <span
                                    class="text-danger">*</span>
                                <textarea name="site_description" id="site_description" cols="30" rows="3"
                                    class="form-control small-textarea-height @error('site_description') is-invalid @enderror">{{ old('site_description', setting('site_description')) }}</textarea>
                                @error('site_description')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="form-group col-md-6">
                        <button class="btn btn-primary">
                            <span>{{ __('Update Site Setting') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
