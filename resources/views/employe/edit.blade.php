@extends('adminlte::page')
@section('content')
<br />
<!--form-->
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><b>Add New Employee</b></h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('employe.update', $employe->id) }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="firstName" class="form-control" value="{{$employe->firstName}}">
                            </div>
                            <div class="col">
                                <input type="text" name="lastName" class="form-control" value="{{$employe->lastName}}">
                            </div>
                        </div>
                        <div class="col">
                                <input type="hidden" name="company_id" class="form-control" value="{{$employe->company_id}}">
                            </div>
                    </div>
                    <div class="form-group">
                        <select id="inputState" name="company_id" class="form-control text-uppercase">
                            <option selected>--Select Company--</option>
                            @foreach($companies as $id => $comp)
                                <option value="{{ $comp->id }}"
                                    {{ old('company_id') == $id ? 'selected' : '' }}>
                                    {{ $comp->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="email" class="form-control" value="{{$employe->email}}">
                            </div>
                            <div class="col">
                                <input type="text" name="phonenumber" class="form-control" value="{{$employe->phonenumber}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
