@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Edit Data Played</h3>
	<form action="{{ url('/played/'.$played->play_id) }}" method="POST" role="form" enctype="multipart/form-data">
        <input name="_method" type="hidden" value="PATCH">
		@csrf


		<div class="form-group">
                
                <label>Name Track</label>
                <select name="play_id_track" class="form-control @error('Play_id_track')
                is-invalid @enderror"  autofocus>
                    <option value=""></option>
                    @foreach($track as $row)
                    <option value="{{ $row->track_id}}">{{ $row->track_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="date" name="play_date" class="form-control @error('play_date')
                is-invalid @enderror" value="{{ $played->paly_date}}" autofocus>
                @error('play_date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

			<button type="submit" class="btn btn-success">Update</button>
			
		</table>
	</form>
</div>
@endsection