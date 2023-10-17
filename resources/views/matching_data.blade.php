@extends('welcome')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Match Data
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('matching_data_match') }}">
            <label for="column" class="form-label">choose column which you want to match:</label>
                <select class="form-select" id="column" name="column" required>
                    <option value="X">X</option>
                    <option value="Y">Y</option>
                    <option value="Z">Z</option>
                </select>
                <button type="submit" class="btn btn-primary">Match</button>
            </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
