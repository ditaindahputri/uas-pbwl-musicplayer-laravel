@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Add Data Played</h3>
	<form action="{{ route('played.store') }}" method="POST" role="form">
		@csrf


		<div class="form-group">
                
                <label>Track Name</label>
                <select name="play_id_track" class="form-control @error('Play_id_track')
                is-invalid @enderror"  autofocus>
                    <option value=""></option>
                    @foreach($rows as $row)
                    <option value="{{ $row->track_id}}">{{ $row->track_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" name="play_date" class="form-control @error('play_date')
                is-invalid @enderror" value="{{ old('album_name') }}" autofocus>
                @error('play_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

			<button type="submit" class="btn btn-success">Save</button>
			
		</table>
	</form>
</div>
@endsection