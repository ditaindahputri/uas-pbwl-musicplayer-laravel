@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Add Data Track</h3>
	<form action="{{ route('track.store') }}" method="POST" role="form" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
                <label>Track Name</label>
                <input type="text" name="track_name" class="form-control @error('track_name')
                is-invalid @enderror" value="{{ old('track_name') }}" autofocus>
                @error('track_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

		<div class="form-group">
                
                <label>Album Name</label>
                <select name="track_id_album" class="form-control @error('track_id_album')
                is-invalid @enderror"  autofocus>
                    <option value=""></option>
                    @foreach($rows as $row)
                    <option value="{{ $row->album_id }}">{{ $row->album_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Duration</label>
                <input type="number" name="track_time" class="form-control @error('track_time')
                is-invalid @enderror" value="{{ old('track_time') }}" autofocus>
                @error('track_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label></label>
                <input type="file" name="track_file" class="@error('track_file')
                is-invalid @enderror" value="{{ old('track_file') }}" autofocus>
                @error('track_file')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

			<button type="submit" class="btn btn-success">Save</button>
			
		</table>
	</form>
</div>
@endsection

