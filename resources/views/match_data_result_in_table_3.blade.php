@extends('welcome')
@section('content')
<h1> show the “matching” results between Table 3 columns; X, Y and Z—per row</h1>
<hr>
<br>
<table class="table table-bordered table-striped" >
  <thead>
    <tr>
      <th scope="col">Table 3 ID</th>
      <th scope="col">x</th>
      <th scope="col">y</th>
      <th scope="col">z</th>
      <th scope="col">Percentage</th>
    </tr>
  </thead>
  <tbody>
    @foreach($records as $record)
    <tr>
        <td>{{$record->id}}</td>
        <td>{{$record->x}}</td>
        <td>{{$record->y}}</td>
        <td>{{$record->z}}</td>
        <td>
            @if($record->matching_result == 2) <button class="btn btn-success">Full match (3 out of 3)</button>
            @elseif($record->matching_result == 1) <button class="btn btn-warning">2 out of 3 matching</button>
            @else <button class="btn btn-danger">No matching at all</button>
            @endif
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
