@extends('admin.layouts.master')

@section('main-content')

	<section class="section">
        <div class="section-header">
            <h1>{{ __('Pre-registers') }}</h1>
            {{ Breadcrumbs::render('pre-registers/show') }}
        </div>

        <div class="section-body">
        	<div class="row">
	   			<div class="col-4 col-md-4 col-lg-4">
			    	<div class="card">
					    <div class="card-body card-profile">
					        <img class="profile-user-img img-responsive img-circle" src="{{ $preregister->visitor->images }}" alt="User profile picture">
					        <h3 class="text-center">{{ $preregister->visitor->name }}</h3>
					        <p class="text-center">
					        	{{__('Pre-register')}}
					        </p>
					    </div>
					    <!-- /.box-body -->
					</div>
				</div>
	   			<div class="col-8 col-md-8 col-lg-8">
			    	<div class="card">
			    		<div class="card-body">
			    			<div class="profile-desc">
			    				<div class="single-profile">
			    					<p><b>{{ __('First Name') }}: </b> {{ $preregister->visitor->first_name}}</p>
			    				</div>
			    				<div class="single-profile">
			    					<p><b>{{ __('Last Name') }}: </b> {{ $preregister->visitor->last_name}}</p>
			    				</div>
			    				<div class="single-profile">
			    					<p><b>{{ __('Email') }}: </b> {{ $preregister->visitor->email}}</p>
			    				</div>
			    				<div class="single-profile">
			    					<p><b>{{ __('Phone') }}: </b> {{ $preregister->visitor->phone}}</p>
			    				</div>
                                <div class="single-profile">
			    					<p><b>{{ __('Employee') }}: </b> {{ $preregister->employee->user->name}}</p>
			    				</div>
			    				<div class="single-profile">
			    					<p><b>{{ __('Expected Date') }}: </b> {{$preregister->expected_date }}</p>
			    				</div>
                                <div class="single-profile">
			    					<p><b>{{ __('Expected Time') }}: </b> {{ date('h:i A', strtotime($preregister->expected_time))}}</p>
			    				</div>
                                <div class="single-profile">
                                    <p><b>{{ __('Address') }}: </b> {{ $preregister->visitor->address}}</p>
                                </div>
                                <div class="single-full-profile">
                                    <p><b>{{ __('Comments') }}: </b> {{ $preregister->comment}}</p>
                                </div>
                                <div class="single-profile">
                                    <p><b>{{ __('Status') }}: </b> {{ $preregister->visitor->my_status}}</p>
                                </div>
			    			</div>
			    		</div>
			    	</div>
				</div>
        	</div>
        </div>
    </section>

@endsection
