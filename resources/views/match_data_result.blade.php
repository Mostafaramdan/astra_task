@extends('welcome')
@section('content')
<a href="{{ route('import_data.store') }}?column={{$data->column}}" class="btn btn-success btn-block">
    import Data manually: You have {{ collect($data->data)->where('percentage',100)->count()  }} records matched
</a>
<table class="table table-bordered table-striped" >
  <thead>
    <tr>
      <th scope="col">Table 3 ID</th>
      <th scope="col">Data {{$data->column}}</th>
      <th scope="col">Table 2 ID</th>
      <th scope="col">Table 2 reason</th>
      <th scope="col">Table 1 ID</th>
      <th scope="col">Percentage</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data->data as $record)
    <tr>
        <td>{{$record['matching_table_id']}}</td>
        <td>{{$record['column_value']}}</td>
        <td>{{$record['mapping_table_id']}}</td>
        <td>{{$record['mapping_table_reason']}}</td>
        <td>{{$record['main_table_id']}}</td>
        <td>{{$record['percentage']}}%
            @if($record['percentage'] == 100) <button class="btn btn-success">Matched</button>
            @else <button class="btn btn-warning">semi Matched</button>
            @endif
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
