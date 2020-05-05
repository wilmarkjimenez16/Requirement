@extends('welcome')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ $employee->path() }}" class="btn btn-success">Back</a>
    </div>

    <div class="card-body">
        <form action="{{ $employee->path() }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name"><strong>Name</strong></label>
                    <input type="text" name="name" id="name" value="{{ $employee->name }}" class="form-control">
                    @error('name')
                    <small class="text-danger"><strong>{{$message}}</strong></small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="company"><strong>Company</strong></label>
                    <select name="company" id="company" class="form-control">
                        <option value="{{ $employee->company->id }}">{{ $employee->company->name }}</option>
                        @foreach ($companies as $company)
                            @if ($employee->company->id != $company->id)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection