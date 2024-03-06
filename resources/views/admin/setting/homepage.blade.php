@extends('admin.setting.index')

@section('admin.setting.breadcrumbs')
    {{ Breadcrumbs::render('front-end-setting') }}
@endsection

@section('admin.setting.layout')
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.setting.homepage-update') }}">
                     @csrf
                     <fieldset class="setting-fieldset">
                        <legend class="setting-legend">{{ __('Front-end-Enable-Disable') }}</legend>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group" id="">
                                     <label class="control-label" for="defaultUnchecked">{{__('Front-end-Enable-Disable ')}}</label>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="front_end_enable_disable" {{ setting('front_end_enable_disable') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                         </label>
                                     </div>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="front_end_enable_disable" {{ setting('front_end_enable_disable') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                         </label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group" id="">
                                     <label class="control-label" for="defaultUnchecked">{{__('Visitor Agreement ')}}</label>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="visitor_agreement" {{ setting('visitor_agreement') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                         </label>
                                     </div>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="visitor_agreement" {{ setting('visitor_agreement') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                    </fieldset>

                    <fieldset class="setting-fieldset">
                        <legend class="setting-legend">{{ __('Welcome Screen Setting') }}</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="summernote" name="welcome_screen" id="comment">{{setting('welcome_screen')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="setting-fieldset">
                        <legend class="setting-legend">{{ __('Terms & condition Setting') }}</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="summernote" name="terms_condition" id="terms_condition">{{setting('terms_condition')}}</textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                     <div class="row">
                         <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <span>{{ __('Update Front-end Setting') }}</span>
                            </button>
                         </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
@endsection
