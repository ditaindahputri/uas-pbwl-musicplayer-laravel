@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Edit Data Track</h3>
	<form action="{{ url('/track/'.$track->track_id) }}" method="POST" role="form" enctype="multipart/form-data">
         <input name="_method" type="hidden" value="PATCH">
		@csrf

		<div class="form-group">
                <label>Track Name</label>
                <input type="text" name="track_name" class="form-control @error('track_name')
                is-invalid @enderror" value="{{ $track->track_name }}" autofocus>
                @error('track_name')

                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

		<div class="form-group">
                
                <label>Album Name</label>
                <select name="track_id_album" class="form-control @error('track_id_album')
                is-invalid @enderror"  autofocus>

                 <option value="{{ $track->album_id }}">{{ $track->album_name }}</option>
                    @foreach($album as $item)
                    <option value="{{ $item->album_id }}">{{ $item->album_name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label>Duration</label>
                <input type="number" name="track_time" class="form-control @error('track_time')
                is-invalid @enderror" value="{{ $track->track_time }}" autofocus>
                @error('track_time')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label></label>
                <input type="file" name="track_file" class="@error('track_file')
                is-invalid @enderror" value="{{ $track->track_file }}" autofocus>
                @error('track_file')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

			<button type="submit" class="btn btn-success">Update</button>
			
		</table>
	</form>
</div>
@endsection

