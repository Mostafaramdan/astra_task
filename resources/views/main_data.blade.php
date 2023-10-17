@extends('welcome')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $record)
    <tr>
        <td>{{$record->id}}</td>
        <td>{{$record->description}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $records->links('pagination::bootstrap-5') !!}
@endsection
