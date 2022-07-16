@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    {{ __('Update Mentors') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/mentors_update/'.$mentor->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $mentor->name }}">

                        <label for="phone_number" class="form-label">Phone Number:</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required="True" value="{{ $mentor->phone_number }}">

                        <label for="mentees" class="form-label">Mentees:</label>
                        <textarea class="form-control" name="mentees" id="mentees" cols="30" rows="3">{{ $mentor->mentees }}</textarea>

                        <label for="department" class="form-label">Department:</label>

                        <select id="department" class="form-select" name="department" required="True" value="{{ $mentor->department }}">

                            <option selected disabled hidden>{{ $mentor->department}}</option>

                        @foreach($departments as $department)
                        
                            <option value="{{ $department->value }}">{{ $department->name }}</option>
                            
                        @endforeach
                        
                        </select>

                        <label for="school" class="form-label">School:</label>
                        <input type="text" class="form-control" id="school" name="school" required="True" value="{{ $mentor->school }}">

                        <div class="modal-footer">
                            <a href="{{ url('mentors_index') }}" class="btn btn-success rounded-pill">close</a>
                            <button type="submit" class="btn btn-success rounded-pill">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection