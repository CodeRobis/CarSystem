@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.coursesList") }}</div>
                    <div class="card-body">
                        <a href="{{ route('courses.create') }}" class="btn btn-success float-end">Pridėti</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pavadinimas</th>
                                    <th>Studentai</th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>žirkė :{{ $course->name }}</td>
                                <td>
                                    @foreach($course->students as $student)
                                            {{ $student->name }} {{ $student->surname }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('courses.edit', $course->id) }}">Redaguoti</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route("courses.destroy", $course->id) }}">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-danger">Ištrinti</button>
                                    </form>
                                </td>

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
