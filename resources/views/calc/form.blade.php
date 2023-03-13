@extends('layouts.calc')

@section('content')
    <div class="col-md-6">
        <div  class="card">
            <div class="card-header">
                Skaičiavimo aplikacija
            </div>
            <div class="card-body">
                <form method="post" action="{{ route("result") }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Įveskite x:</label>
                        <input type="text" class="form-control" name="x">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Įveskite y:</label>
                        <input type="text" class="form-control" name="y">
                    </div>
                    <button type="submit" class="btn btn-success">Skaičiuoti</button>
                </form>
            </div>
        </div>
    </div>

@endsection




