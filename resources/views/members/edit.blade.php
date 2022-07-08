@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Update Members') }}
                </div>

                <div class="card-body">
                    <form action="{{ url('/members_update/'.$member->id) }}" method="post">
                        @csrf
                        @method("put")
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required="True" value="{{ $member->name }}">

                        <label for="phone_number" class="form-label">Phone Number:</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required="True" value="{{ $member->phone_number }}">

                        <label for="school" class="form-label">School:</label>
                        <input type="text" class="form-control" id="school" name="school" required="True" value="{{ $member->school }}">

                        <label for="mentor" class="form-label">Mentor:</label>
                        <input type="text" class="form-control" id="mentor" name="mentor" required="True" value="{{ $member->mentor }}">

                        <div class="modal-footer">
                            <a href="{{ url('members_index') }}" class="btn btn-success rounded-pill">close</a>
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
@endsection>