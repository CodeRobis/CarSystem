@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Studentu sąrašas</div>
                    <div class="card-body">
                       <form method="post" action="{{ route("courses.update", $course->id) }}">
                           @csrf
                           @method('put')
                           <div class="mb-3">
                               <label class="form-label">Pavadinimas:</label>
                               <input class="form-control" name="name" type="text" value="{{ $course->name }}" required>
                           </div>
                           <button class="btn btn-success"> Išsaugoti</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
