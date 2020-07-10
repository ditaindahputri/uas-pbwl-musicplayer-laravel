@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Add Data Album</h3>
	<form action="{{ route('album.store') }}" method="POST" role="form">
		@csrf


		<div class="form-group">
                
                <label>Artist Name</label>
                <select name="album_artist_id" class="form-control @error('album_artist_id')
                is-invalid @enderror"  autofocus>
                    <option value=""></option>
                    @foreach($rows as $row)
                    <option value="{{ $row->artist_id }}">{{ $row->artist_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Album Name</label>
                <input type="text" name="album_name" class="form-control @error('album_name')
                is-invalid @enderror" value="{{ old('album_name') }}" autofocus>
                @error('album_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

			<button type="submit" class="btn btn-success">Save</button>
			
		</table>
	</form>
</div>
@endsection