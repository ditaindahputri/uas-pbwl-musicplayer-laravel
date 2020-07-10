@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Data Album</h3>
    <form action="{{ url("/album/{$album->album_id}") }}"  method="POST" role="form">
        <input name="_method" type="hidden" value="PATCH">
        @csrf

        <div class="form-group">
                <label>Artist Name</label>
                <select name="album_photo_id" class="form-control">
                    <option value="{{ $album->artist_id }}">{{ $album->artist_name }}</option>
                    @foreach($artist as $item)
                    <option value="{{ $item->artst_id }}">{{ $item->artist_name }}</option>
                    @endforeach

                </select>
        </div>


            <div class="form-group">
                <label>Album Name</label>
                <input type="text" name="album_name" class="form-control @error('album_name')
                is-invalid @enderror" value="{{ $album->album_name }}" autofocus>
                @error('album_name')

                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            
        </table>
    </form>
</div>
@endsection


