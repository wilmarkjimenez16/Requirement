@extends('welcome')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ $employee->path() }}/edit" class="btn btn-success float-left">Edit</a>
        <button class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal" title="Delete Employee">Delete</button>
    </div>

    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name"><strong>Name</strong></label>
                <p id="name">{{ $employee->name }}</p>
            </div>
            <div class="form-group col-md-6">
                <label for="company"><strong>Company</strong></label>
                <p id="company">{{ $employee->company->name }}</p>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="{{ $employee->path() }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <p>Do you really want to delete this?</p>
                            </div>
                            <div class="row justify-content-md-center"></div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>


</div>
@endsection