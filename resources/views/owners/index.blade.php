@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.ownerstList") }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route("owners.search") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input class="form-control" name="name" value="{{ $filter->name }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input class="form-control" name="surname" value="{{ $filter->surname }}" >
                            </div>
                            <button class="btn btn-info">Ieškoti</button>
                        </form>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Vardas</th>
                                    <th>Pavardė</th>
                                    <th>Gimimo Metai</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                            <tr>
                                <td> {{ $owner->name }}</td>
                                <td>{{ $owner->surname }}</td>
                                <td>{{ $owner->year }}</td>
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
