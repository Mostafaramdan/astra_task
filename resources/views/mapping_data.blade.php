@extends('welcome')
@section('content')
<a href="{{ route('mapping_data.create') }}" class="btn btn-success btn-block">import Data</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">description</th>
      <th scope="col">main_data_id</th>
      <th scope="col">reason</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $record)
    <tr>
        <td>{{$record->id}}</td>
        <td>{{$record->description}}</td>
        <td>{{$record->main_data_id}}</td>
        <td>{{$record->reason}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $records->links('pagination::bootstrap-5') !!}
@endsection
