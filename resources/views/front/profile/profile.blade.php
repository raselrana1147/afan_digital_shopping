@extends('layouts.app')
@section('title','Ecommerce | Change Password')
@section('ecommerce_css')
	<style>
		

	</style>
@endsection

@section('ecommerce')
<div class="container">
			<div class="track-order-page">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-header header-title bg-header">
						       <h4>Menu List</h4>
							</div>
						  <div class="card-body">

						 	@include('front.profile.sidebar')

						  </div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="card">
						<div class="card-header header-title bg-header">
					       <h4>Update profile</h4>
						</div>
						  <div class="card-body">
								<div class="row">
									<div class="col-md-12">

										<form id="update_profile" class="register-form outer-top-xs" role="form" method="post" data-action="{{ route('customer.profile_update') }}" enctype="multipart/form-data">
											@csrf
											<input type="hidden" name="id" value="{{$user->id}}">
											<div class="row pb-4">
											 <div class="offset-4">
											    <div class="text-center">
											       <img id="profile_image_path" src="{{$user->avatar !=null ? asset('assets/frontend/image/profile/'.$user->avatar) : asset('assets/backend/image/'.default_image())}}"  class="profile_image" alt="customer image"><br>
											       <button type="button" class="btn btn-primary btn-sm upload_button" role="button"><i class="fa fa-upload"></i>Upload</button>
											    </div>
											    <input type="file" id="image_path" name="avatar" class="get_image" style="display: none">
											 </div>
											</div>
											<div class="form-group">
												<label class="info-title">Name</label>
												<input type="text" class="form-control unicase-form-control text-input" name="name" value="{{$user->name}}" >
												<span class="valids error_name" style="color: red;"></span>
											</div>

											<div class="form-group">
												<label class="info-title">Email</label>
												<input type="text" class="form-control unicase-form-control text-input" name="name" value="{{$user->email}}" readonly="">
												
											</div>

											<div class="form-group">
												<label class="info-title">Phone</label>
												<input type="text" class="form-control unicase-form-control text-input" name="name" value="{{$user->phone}}" readonly="">
												
											</div>
										

											<div class="form-group">
												<label class="info-title">Address</label>
												<textarea class="form-control unicase-form-control text-input" name="address">{{$user->address}}</textarea>
											</div>
											<button type="submit" class="btn-upper btn btn-primary checkout-page-button submit_button">
												Save Changes

											</button>
										</form>
										</div>			
									</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
</div>
@endsection
@section('ecommerce_js')
   <script src="{{ asset('assets/frontend/style/js/profile.js') }}"></script>


@endsection
