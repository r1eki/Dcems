@extends('template.main')

@section('title')
Intive Panel - Helpdesk
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
					<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Helpdesk</h4>
				</div>
			</div>
		</div>
		<!-- /page header -->

		<!-- Content area -->
		<div class="content">

			<!-- Basic datatable -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">List Helpdesk</h5>
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
							<th width="1%;">No</th>
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>No. Telp</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($data as $index => $row)
						<tr>
							<td>{!! ++$index !!}</td>
							<td>{!! $row['contact_name'] !!}</td>
							<td>{!! $row['contact_email'] !!}</td>
							<td>{!! $row['contact_phone'] !!}</td>
							<td>{!! $row['contact_content'] !!}</td>
						</tr>
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