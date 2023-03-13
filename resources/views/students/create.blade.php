@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Studentu sąrašas</div>
                    <div class="card-body">
                       <form method="post" action="{{ route("students.save") }}">
                           @csrf
                           <div class="mb-3">
                               <label class="form-label">Vardas:</label>
                               <input class="form-control" name="name" type="text" value="" required>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">Pavardė:</label>
                               <input class="form-control" name="surname" type="text" value="" required>
                           </div>
                           <div class="mb-3">
                               <label class="form-label">Amžius:</label>
                               <input class="form-control" name="year" type="text" value="">
                           </div>
                           <button class="btn btn-success"> Pridėti</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
