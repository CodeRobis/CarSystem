@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("Add new course") }}</div>
                    <div class="card-body">
                       <form method="post" action="{{ route("courses.store") }}">
                           @csrf
                           <div class="mb-3">
                               <label class="form-label">{{ __("Name:") }}</label>
                               <input class="form-control" name="name" type="text" value="" required>
                           </div>

                           <button class="btn btn-success"> {{ __("Add") }}</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
