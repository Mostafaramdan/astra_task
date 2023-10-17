<!-- resources/views/import-form.blade.php -->
@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Import Data</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="importData">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    import data
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="importData" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                    <form action="{{ route('import_mapping_data') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" accept=".csv" required>
                                        <button type="submit" class="btn btn-primary">Import Bulk Data</button>

                                    </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="createSingleData">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    create one item
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="createSingleData" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{ route('mapping_data.store') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description:</label>
                                                <input type="text" class="form-control" id="description" name="description" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="main_data_id" class="form-label">Table 1 ID Selector:</label>
                                                <div class="mb-3">
                                                    <select class="form-select" id="main_data_id" name="main_data_id" required>
                                                        @foreach($mainDataItems as $item)
                                                            <option value="{{ $item->id }}">{{ $item->description }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="reason" class="form-label">Condition/Reason Selector:</label>
                                                <div class="mb-3">
                                                    <select class="form-select" id="reason" name="match_column " required>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">create Data</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
