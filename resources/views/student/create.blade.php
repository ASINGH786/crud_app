@extends('layouts.app')
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @elseif($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <strong>
                        <h1>Student Manager</h1>
                    </strong>
                </header>
                <div class="w-full p-2">
                    <strong>
                        <h1 class="card-title">Enter the Details to add new Student:</h1>
                    </strong>
                </div>
                <div class="w-full p-6">
                    <form action="{{ route('student.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <strong>
                                <label>Student ID:</label>
                            </strong>
                            <input name="student_id" type="text" class="form-control"  placeholder="Enter Student ID">
                        </div>
                        <div class="form-group">
                            <strong>
                                <label>First Name:</label>
                            </strong>
                            <input name="firstName" type="text" class="form-control"  placeholder="Enter the first name">
                        </div>
                        <div class="form-group">
                            <strong>
                                <label>Last Name:</label>
                            </strong>
                            <input name="lastName" type="text" class="form-control"  placeholder="Enter last name">
                        </div>

                        <div class="form-group">
                            <strong>
                                <label>Course:</label>
                            </strong>
                            <input name="course" type="text" class="form-control"  placeholder="Enter Course name">
                        </div>
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </form>
                </div>

                <div class="w-full p-6">

                    <p class="text-gray-700">
                        <a class="btn btn-primary" href="{{ route('student.index') }}" >
                            <i class="fas fa-backward "></i>>>Go Back<<</a>
                    </p>

                </div>
            </section>
        </div>
    </main>
@endsection
