@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.ownerstList") }}</div>
                    <div class="card-body">
                    <form action="{{ route('cars.index') }}" method="GET">
    <div class="form-group">
        <label for="owner">Owner:</label>
        <select name="owner" id="owner" class="form-control">
            <option value="">All</option>
            @foreach($owners as $owner)
                <option value="{{ $owner->id }}" {{ Request::get('owner') == $owner->id ? 'selected' : '' }}>{{ $owner->name }} {{ $owner->surname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="license_plate">License Plate:</label>
        <input type="text" name="license_plate" id="license_plate" class="form-control" value="{{ Request::get('license_plate') }}">
    </div>
    <div class="form-group">
        <label for="manufacturer">Manufacturer:</label>
        <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ Request::get('manufacturer') }}">
    </div>
    <div class="form-group">
        <label for="model">Model:</label>
        <input type="text" name="model" id="model" class="form-control" value="{{ Request::get('model') }}">
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th>License Plate</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Owner</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cars as $car)
    <tr>
        <td>{{ $car->license_plate }}</td>
        <td>{{ $car->manufacturer }}</td>
        <td>{{ $car->model }}</td>
        @if ($car->owner)
            <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
        @else
            <td>Unknown owner</td>
        @endif
    </tr>
@endforeach
</tbody>

</table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
