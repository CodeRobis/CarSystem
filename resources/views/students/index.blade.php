@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __("messages.studentstList") }}</div>
                    <div class="card-body">
                        @if (Auth::user()!=null)
                        <div class="clearfix">
                            <a href="{{ route('students.create') }}" class="btn btn-success float-end">Pridėti</a>
                        </div>
                        @endif
                        <form method="post" action="{{ route("students.search") }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input class="form-control" name="name" value="{{ $filter->name }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Metai</label>
                                <select class="form-select" name="year">
                                    <option value="" {{ ($filter->year==null)?'selected':'' }}></option>
                                    @for ($i=2015; $i<=2023; $i++)
                                        <option value="{{ $i }}" {{ ($filter->year==$i)?'selected':'' }}> {{ $i }}</option>
                                    @endfor

                                </select>
                            </div>
                            <button class="btn btn-info">Ieškoti</button>
                        </form>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Vardas</th>
                                    <th>Pavardė</th>
                                    <th>Metai</th>
                                    <th>Kursas</th>
                                    <th>Pazymai</th>
                                    <th>Veiksmai</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->surname }}</td>
                                <td>{{ $student->year }}</td>
                                <td>{{ $student->course->name }}</td>
                                <td>
                                    @foreach($student->grades as $grade)
                                        {{ $grade->grade }}
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('students.edit', $student->id) }}">Redaguoti</a>
                                    <a class="btn btn-danger" href="{{route('students.delete',$student->id)}}">Ištrinti</a>
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
