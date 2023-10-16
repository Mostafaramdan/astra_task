@extends('welcome')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">description</th>
      <th scope="col">table_1_id</th>
      <th scope="col">reason</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $record)
    <tr>
        <td>{{$record->id}}</td>
        <td>{{$record->description}}</td>
        <td>{{$record->table_1_id}}</td>
        <td>{{$record->reason}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $records->links('pagination::bootstrap-5') !!}
@endsection
