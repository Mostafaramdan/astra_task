@extends('welcome')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">x</th>
      <th scope="col">y</th>
      <th scope="col">z</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $record)
    <tr>
        <td>{{$record->id}}</td>
        <td>{{$record->x}}</td>
        <td>{{$record->y}}</td>
        <td>{{$record->z}}</td>
    </tr>
    @endforeach
  </tbody>
  {!! $records->links() !!}
</table>
{!! $records->links('pagination::bootstrap-5') !!}
@endsection
