@extends('layout')



@section('content')



    @include('users.menu')

    @include('users.addUser')

    <div class="container">

        <h1>User Table  </h1>

        <table class="table">
            <thead class = "thead-inverse">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>E-Mail</th>
                <th><button type="button" class="btn btn-sm pull-right" data-toggle="modal" data-target="#exampleModal" id="newUser">
                        +
                    </button> </th>
            </tr>
            </thead>
            <tbody id="show">
            </tbody>
        </table>

    </div>



@endsection
