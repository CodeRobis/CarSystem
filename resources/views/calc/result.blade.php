@extends('layouts.calc')

@section('content')
    <div class="col-md-6">
        <div  class="card">
            <div class="card-header">
                Skaičiavimo aplikacija
            </div>
            <div class="card-body">
                Rezultatas: {{ $result }}
                <hr>
                <a  href="{{ route("form") }}" class="btn btn-info">Gryžti atgal</a>
            </div>
        </div>
    </div>

@endsection




