@extends('template.main')

@section('title')
Intive Panel - Slider
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
					<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Slider</h4>
				</div>
			</div>
		</div>
		<!-- /page header -->

		<!-- Content area -->
		<div class="content">

			<!-- /basic tables title -->
			<a class="btn btn-primary content-group" href="{{ url('home/slider/create') }}">Buat Slider Baru</a>

			<!-- Basic datatable -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">List Slider</h5>
					<div class="heading-elements">
						<ul class="icons-list">
	                		<li><a data-action="collapse"></a></li>
	                		<li><a data-action="reload"></a></li>
	                		<li><a data-action="close"></a></li>
	                	</ul>
	            	</div>
				</div>

				<table class="table datatable-basic" id="basic">
					<thead>
						<tr>
							<th width="1%">No</th>
							<th>Image</th>
							<th>Judul</th>
							<th class="text-center">Edit</th>
							<th class="text-center">Hapus</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($data as $index => $row)
						<tr>
							<td>{!! ++$index !!}</td>
							<td><img src="{{ asset($row['slider_img']) }}" class="img img-responsive"></td>
							<td>{!! $row['slider_name'] !!}</td>
							<td class="text-center">
								<a href="{{ url('home/slider') }}/{!! base64_encode($row['id']) !!}/edit" class="btn btn-primary btn-sm">Edit<i class="icon-pencil position-right"></i></a>
							</td>
							<td class="text-center">
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_modal{!! $row['id'] !!}">Hapus<i class="icon-trash position-right"></i></button>
							</td>
						</tr>

						<!-- Primary modal -->
						<div id="delete_modal{!! $row['id'] !!}" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header bg-primary">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h6 class="modal-title">Hapus Data</h6>
									</div>

									<div class="modal-body">
										<p>Apakah Anda Yakin Akan Menghapus <b>Banner</b> ?</p>
									</div>

									<div class="modal-footer">
										{!! Form::open(array('method' => 'DELETE', 'route' => ['slider.destroy', base64_encode($row['id'])])) !!}
                                            {!! Form::submit("Hapus", array('class' => 'btn btn-danger')) !!}
                                        {!! Form::close() !!}
										<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /primary modal -->
					@endforeach
					</tbody>
				</table>
			</div>
			<!-- /basic datatable -->

		</div>
		<!-- /content area -->

	</div>
	<!-- /main content -->
@stop

@section('script')
<!-- Theme JS files -->
<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
<!-- /theme JS files -->
@stop