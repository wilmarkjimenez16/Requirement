@extends('welcome')

@section('content')
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" title="Add Employees">Add</button>
        </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                    </tr>
                </thead>
                <tbody>
                @if(count($employees) > 0)
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td><a href="{{ $employee->path() }}" class=" btn btn-info float-right">View</a><td>
                    </tr>
                    @endforeach
                @else
                    <tr><td colspan="3"><small>No data yet.</small></td></tr>
                @endif
                </tbody>
            </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form action="/" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                            <label for="Id">Company</label>
                            <select id="Id" class="form-control" name="company">
                                <option>...</option>
                                @if(count($companies) > 0)
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('company')
                            <small class="text-danger"><strong>{{$message}}</strong></small>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                                @error('name')
                                <small class="text-danger"><strong>{{$message}}</strong></small>
                                @enderror
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