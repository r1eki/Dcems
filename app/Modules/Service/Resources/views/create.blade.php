@extends('template.main')

@section('title')
Intive Panel - Layanan
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
					<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Layanan</h4>
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
					{!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'route' => 'services.store', 'files' => true]) !!}
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Buat Baru</h5>
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
									<label class="col-lg-3 control-label">Nama Layanan : </label>
									<div class="col-lg-9">
										<input type="text" class="form-control" placeholder="Masukkan Nama Layanan" name="i_nama">
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Deskripsi Layanan : </label>
									<div class="col-lg-9">
										<textarea name="keterangan" id="editor-full" rows="4" cols="4">
											
										</textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-lg-3 control-label">Icon :</label>
									<div class="col-lg-9">
										<input type="file" class="file-styled" name="image">
										<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
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
	<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/editor_ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
@stop