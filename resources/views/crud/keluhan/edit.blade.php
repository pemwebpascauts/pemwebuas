@extends('layouts.app') 
 
@section('content')
 
<div class="panel panel-info">
	<div class="panel-heading">
		<center>
		<h1>
		Edit Data
		</h1>
		</center>
	</div>
	<div class="panel-body">
		<a href="{{ URL('keluhan') }}" class="btn btn-raised btn-danger pull-left">Kembali</a>
		{{-- part alert --}}
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
		<div class="row">
			<div class="col-md-12"><hr>
				<div class="col-md-2"></div>
				<div class="col-md-8">
				{{-- form membawa id untuk di jadikan parameter ketika update data, biasanya di buat menjadi input type="hidden" --}}
					<form class="form-horizontal" action="{{ URL('keluhan/update/'. $showById->id_keluhan) }}" method="POST">
					{{ csrf_field() }}
					  <fieldset>
					    <legend>ISILAH FORM BERIKUT SESUAI HASIL PENGAMATAN ANDA</legend>
						    <div class="form-group label-floating">
								@if ($showById->jenis_keluhan == 1)
									@php
										$radio1 = 'checked';
										$radio2 = '';
										$radio3 = '';
										$radio4 = '';
									@endphp
								@elseif ($showById->jenis_keluhan == 2)
									@php
										$radio1 = '';
										$radio2 = 'checked';
										$radio3 = '';
										$radio4 = '';
									@endphp
								@elseif ($showById->jenis_keluhan == 3)
									@php
										$radio1 = '';
										$radio2 = '';
										$radio3 = 'checked';
										$radio4 = '';
									@endphp
								@elseif ($showById->jenis_keluhan == 4)
									@php
										$radio1 = '';
										$radio2 = '';
										$radio3 = '';
										$radio4 = 'checked';
									@endphp
								@endif
								<label class="control-label" for="focusedInput2">Tentukan Jenis Aduan:</label><br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="1" {{ $radio1 }}> Kependidikan <br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="2" {{ $radio2 }}> Fasilitas <br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="3" {{ $radio3 }}> Lingkungan <br>
								<input class="radio-inline" type="radio" name="jenis_keluhan" value="4" {{ $radio4 }}> Lainnya
							</div>
							
							<div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Isi Aduan:</label><br>
							  <textarea class="form-control" rows="5" id="focusedInput2" type="text" name="isi_keluhan">{{ $showById->isi_keluhan }}</textarea>
							  <p class="help-block">Masukkan isi aduan anda.</p>
							</div>
							
							<div class="form-group label-floating">
							  <label class="control-label" for="focusedInput2">Identitas Diri:</label><br>
							  
							  @if ($showById->keanoniman == 1)
								  @php
									$cekbok = 'checked'
								  @endphp
							  @else
								  @php
									$cekbok = ''
								  @endphp
							  @endif
							  
							  <input class="checkbox-inline" id="focusedInput2" type="checkbox" name="anonim" value="1" {{ $cekbok }}> Kirim Secara Anonim </input>
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