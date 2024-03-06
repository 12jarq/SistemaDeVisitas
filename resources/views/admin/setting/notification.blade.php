@extends('admin.setting.index')

@section('admin.setting.breadcrumbs')
    {{ Breadcrumbs::render('notification-setting') }}
@endsection

@section('admin.setting.layout')
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.setting.notification-update') }}">
                     @csrf
                     <fieldset class="setting-fieldset">
                        <legend class="setting-legend">{{ __('Notification Setting') }}</legend>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group" id="">
                                     <label class="control-label" for="defaultUnchecked">{{__('Email Notifications')}}</label>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_email" {{ setting('notifications_email') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                         </label>
                                     </div>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_email" {{ setting('notifications_email') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                         </label>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group" id="">
                                     <label class="" for="defaultUnchecked">{{__('SMS Notifications')}}</label>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_sms" {{ setting('notifications_sms') == true ? "checked":"" }} value="1">{{__('Enable')}}
                                         </label>
                                     </div>
                                     <div class="form-check">
                                         <label class="form-check-label">
                                             <input type="radio" class="form-check-input" name="notifications_sms" {{ setting('notifications_sms') == false ? "checked":"" }} value="0">{{__('Disable')}}
                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                    </fieldset>
                     <div class="row">
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <span>{{ __('Update Notification Setting') }}</span>
                            </button>
                        </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
@endsection
