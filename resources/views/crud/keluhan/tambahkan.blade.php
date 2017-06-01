@extends('layouts.app') 
 
@section('content')
 
<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		Tambah Data
		</h1>
		</center>
	</div>
	<div class="panel-body">
		<a href="{{ URL('keluhan') }}" class="btn btn-raised btn-danger pull-left">Kembali</a>
		{{-- part alert --}}
		@if (Session::has('after_save'))
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-{{ Session::get('after_save.alert') }}">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong>{{ Session::get('after_save.title') }}</strong>
					  <a href="javascript:void(0)" class="alert-link">{{ Session::get('after_save.text-1') }}</a> {{ Session::get('after_save.text-2') }}
					</div>
				</div>
			</div>
		@endif
		{{-- end part alert --}}
		<div class="row">
			<div class="col-md-12"><hr>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form class="form-horizontal" action="{{ URL('keluhan/store') }}" method="POST">
					{{ csrf_field() }}
					  <fieldset>
					    <legend>ISILAH FORM BERIKUT SESUAI HASIL PENGAMATAN ANDA</legend>
						    <div class="form-group label-floating">
								<label class="control-label" for="focusedInput2">Tentukan Jenis Aduan:</label><br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="1"> Kependidikan <br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="2"> Fasilitas <br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="3"> Lingkungan <br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="4"> Lainnya
							</div>
							
							<div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Isi Aduan:</label><br>
							  <textarea class="form-control" rows="5" id="focusedInput2" type="text" name="isi_keluhan"></textarea>
							  <p class="help-block">Masukkan isi aduan anda.</p>
							</div>
							
							<div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Identitas Diri:</label><br>
							  <input class="checkbox-inline" id="focusedInput2" type="checkbox" name="anonim" value="1"> Kirim Secara Anonim </input>
							</div>
							
							<div class="form-group">
						      <div class="col-md-12">
						        <button type="submit" class="btn btn-raised btn-primary pull-right">Submit</button>
						        <button type="reset" class="btn btn-raised btn-warning pull-right">Reset</button>
						      </div>
						    </div>
							
						</fieldset>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>
 
@stop