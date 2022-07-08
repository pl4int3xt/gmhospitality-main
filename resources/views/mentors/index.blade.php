@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mentors') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card p-4">
                        @if (session('mssg'))
                            <div class="alert alert-success" role="alert">
                                {{ session('mssg') }}
                            </div>
                        @endif

                        <div class="container text-end">
                            <a href="#" class="btn btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#mentor-reg-modal">Add</a>
                        </div><br>


                        <!-- search form -->
                        <div class="container">
                            <form action="{{ route('mentors.search') }}" method="get">
                                <input class="form-control" type="text" name="search" placeholder="search here ....."><br>
                                <button type="submit" class="btn btn-success rounded-pill">Search</button>
                            </form>
                        </div><br>

                        <!-- mentors table -->

                        <div class="container table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone number</th>
                                        <th>Mentees</th>
                                        <th>Department</th>
                                        <th>School</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mentors as $mentor)
                                        <tr>
                                            <td>{{ $mentor->name }}</td>
                                            <td>{{ $mentor->phone_number }}</td>
                                            <td>{{ $mentor->mentees }}</td>
                                            <td>{{ $mentor->department }}</td>
                                            <td>{{ $mentor->school }}</td>
                                            <td>
                                                <a href="{{ url('/mentors_edit/'.$mentor->id) }}" class="btn btn-success rounded-pill">Edit</a><br>
                                                <a href="{{ url('/mentors_destroy/'.$mentor->id)}}"class="btn btn-danger rounded-pill">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $mentors->onEachSide(1)->links() }}
                        </div>

                        <!-- registration modal -->

                        <div class="modal fade" id="mentor-reg-modal" aria-labelledby="modal-title" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Mentor registration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('mentors.store') }}" method="post">
                                            @csrf
                                            <label for="name" class="form-label">Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" required="True">

                                            <label for="phone_number" class="form-label">Phone Number:</label>
                                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required="True">

                                            <label for="mentees" class="form-label">Mentees:</label>
                                            <input type="text" class="form-control" id="mentees" name="mentees" required="True">

                                            <label for="department" class="form-label">Department:</label>
                                            <select id="department" class="form-select" name="department" required="True">
                                                <option value="hospitality">Hospitality</option>
                                                <option value="media">Media</option>
                                            </select>

                                            <label for="school" class="form-label">School:</label>
                                            <input type="text" class="form-control" id="school" name="school" required="True">

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success rounded-pill">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection