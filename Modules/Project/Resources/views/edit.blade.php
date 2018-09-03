@extends('template.main')

@section('title')
Intive Panel - Portfolio
@stop

@section('style')

@stop

@section('content')
    <!-- Main content -->
	<div class="content-wrapper">

		<!-- Page header -->
		<div class="page-header page-header-default">
			<div class="page-header-content">
				<div class="page-title">
					<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Portfolio</h4>
				</div>
			</div>
		</div>
		<!-- /page header -->

		<!-- Content area -->
		<div class="content">

			<!-- Horizontal form options -->
			<div class="row">
				<div class="col-md-12">

					<!-- Basic layout-->
					{!! Form::model($project, ['method' => 'PATCH', 'class' => 'form-horizontal', 'route' => ['portfolio.update', base64_encode($project['id'])], 'files' => true]) !!}
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Edit Project</h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="form-group">
									<label class="col-lg-3 control-label">Pilih Layanan : </label>
									<div class="col-lg-9">
										<select class="select form-control" name="service">
											@foreach ($service as $row)
											<option value="{!! $row['id'] !!}" {!! ($project['service_id'] == $row['id']) ? 'selected' : '' !!}>{!! $row['service_name'] !!}</option>
											@endforeach
										</select>
									</div>
								</div>								

								<div class="form-group">
									<label class="col-lg-3 control-label">Judul Project : </label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Judul Project" name="i_nama" value="{!! $project['project_name'] !!}">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Image : </label>
									<div class="col-lg-9">
										<input type="file" class="file-styled" name="image">
										<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Gambar Sekarang : </label>
									<div class="col-lg-9">
										<img src="{{ asset($project['project_img']) }}" class="img img-responsive" style="width: 10%;">
									</div>
								</div>

								<div class="text-right">
									<button type="reset" class="btn btn-danger" onclick="history.go(-1);">Cancel<i class="icon-cross position-right"></i></button>
									<button type="submit" class="btn btn-primary">Submit<i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
					<!-- /basic layout -->

				</div>
			</div>
			<!-- /vertical form options -->

		</div>
		<!-- /content area -->

	</div>
	<!-- /main content -->
@stop

@section('script')
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switch.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/pages/form_select2.js') }}"></script>
	<!-- /theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/pages/form_checkboxes_radios.js') }}"></script>
@stop