@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div col-12 col-md-12 col-lg-12>
            <h1 class="h3 mb-4 text-gray-800">ARTIST</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        	 <strong>Data Artist</strong>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
						<th>No.</th>
						<th>Artist Name</th>
						<th>Action</th>
					</tr>
					</thead>
					</tbody>
					@foreach($rows as $row)
					<tr>
						<td class="text-center">{{$loop -> iteration }}</td>
						<td class="text-center">{{ $row->artist_name }}</td>
						
						<td>

						<form action="{{ url('artist/' . $row->artist_id) }}" method="POST" class="text-center">
							<a href="{{ url('artist/' . $row->artist_id . '/edit') }}" class="btn btn-info btn-sm">Edit</a>
							<input name="_method" type="hidden" value="DELETE">
							@csrf
							<button class="btn btn-danger btn-sm">Hapus</button>
						</form>
						</td>

					</tr>
					@endforeach
					</tbody>
             </table>
         </div>
     </div>
 </div>
 		<div class="pull-right">
        	<a href="{{ url('artist/create') }}" class="btn btn-success btn-sm">
                  <i class="fa fa-plus"></i> Tambah Data
            </a>
        </div>
</div>

@endsection