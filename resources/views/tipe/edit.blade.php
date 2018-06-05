@extends('layouts.admin')
@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<div class="panel panel-primary">
			<div class="panel-heading">MUSEUM</div>
					<div class="panel-heading">Edit Data Tipe
						<div class="panel-title pull-right">
							<a href="{{route('tipe.index')}}">Kembali</a>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{route('tipe.update', $tipes->id)}}" method="post">
							<input type="hidden" name="_method" value="PATCH">
							{{csrf_field()}}
							<div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
								<label class="control-label">Name</label>
								<input type="text" name="name" class="form-control" value="{{$tipes->name}}" required>
								@if ($errors->has('name'))
									<span class="help-blocks">
										<strong>{{$errors->first('name')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group {{$errors->has('merk_id') ? 'has-error' : ''}}">
								<label class="control-label">Merk</label>
								<select class="form-control" name="merk_id">
									<option>Pilih Merk</option>
									@foreach($merks as $data)
									<option value="{{$data->id}}" {{ $selectedMerk == $data->id  ?  'selected="selected"' : ''}}>{{ $data->name}</option>
									@endforeach
								</select>
								@if ($errors->has('merk_id'))
									<span class="help-blocks">
										<strong>{{$errors->first('merk_id')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group">
								<button class="btn btn-primary" type="submit">Edit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection