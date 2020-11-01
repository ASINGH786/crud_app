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
                <form action="{{route('student.create')}} " method="post">
                    <table class="table-auto">
                        <thead class="table-dark">
                        <tr>
                            <th class="border w-1/2 px-4 py-2">Student ID</th>
                            <th class="border w-1/2 px-4 py-2">First Name</th>
                            <th class="border w-1/2 px-4 py-2">Last Name</th>
                            <th class="border w-1/2 px-4 py-2">Course</th>
                            <th class="border w-1/2 px-4 py-2">Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($student as $stud)
                            <tr >
                                <td class="border px-4 py-2">{{ $stud->student_id }}</td>
                                <td class="border px-4 py-2">{{ $stud->firstName }}</td>
                                <td class="border px-4 py-2">{{ $stud->lastName }}</td>
                                <td class="border px-4 py-2">{{ $stud->course }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{route('student.destroy', $stud->id)}}" method="post">

                                        <a href="{{ route('student.edit', $stud->id) }}" class="btn btn-sm btn-primary">Edit</a><br>
                                        <a href="{{ route('student.show', $stud->id) }}" class="btn btn-sm btn-info">Show</a><br>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
                <div class="w-full p-6">

                    <p class="text-gray-700">
                        <a class="btn btn-primary" href="{{ route('student.create') }}" >
                            <i class="fas fa-backward "></i>>>Add New Student<<</a>
                    </p>

                </div>
            </section>
        </div>
    </main>
@endsection
