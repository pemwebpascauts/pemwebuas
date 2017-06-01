@extends('layouts.app')
 
@section('content')
 
<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		Daftar Aduan Anda
		</h1>
		</center>
	</div>
	<div class="panel-body">
		<a href="{{ URL('keluhan/create') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
		{{-- alert --}}
		
			{{-- Cek, jika sessionnya ada maka tampilkan alertnya, jika tidak ada maka tidak ditampilkan alertnya --}}
		
		@if (Session::has('after_update'))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-{{ Session::get('after_update.alert') }}">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>{{ Session::get('after_update.title') }}</strong>
					  <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_update.text-1') }}</a> {{ Session::get('after_update.text-2') }}
					</div>
				</div>
			</div>
		@endif
		{{-- end part alert --}}
		<table class="table table-bordered table-hover ">
			<thead>
				<tr>
					<th>No.</th>
					<th>Jenis Keluhan</th>
					<th>Isi Keluhan</th>
					<th>Status Keluhan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@php
					$no = 1;
					$notombol = '';
					$nodelete = '';
				@endphp
				{{-- loop all keluhan --}}
				@foreach ($keluhans as $keluhan)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $keluhan->jeniskeluhan->jenis_keluhan }}</td>
						<td>{{ $keluhan->isi_keluhan }}</td>
						<td>{{ $keluhan->statuskeluhan->status_keluhan }}</td>
						<td>
							<center>
								
								<a type="{{ $notombol }}" href="{{ URL('keluhan/show') }}/{{ $keluhan->id_keluhan }}" class="btn btn-sm btn-raised btn-info" style="{{ $notombol }}">Edit</a>
								
								
								<a href="{{ URL('keluhan/destroy') }}/{{ $keluhan->id_keluhan }}" class="btn btn-sm btn-raised btn-danger" style="{{ $nodelete }}">Hapus</a>
							</center>
						</td>
					</tr>
				@endforeach
				{{-- // end loop --}}
			</tbody>
		</table>
	</div>
</div>
 
@stop