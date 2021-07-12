@extends('adminlte::page')
@section('content')
<!--delete -->
<div class="modal fade" id="deleteOrder" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body w-100 text-center ">
                <form method="DELETE" enctype="multipart/form-data"
                    action="{{ route('employe.destroy') }}">
                    @csrf
                    <div class="text-center">
                        <h2><i class="fas fa-bullhorn"></i> Attention</h2>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div>
                        <h3>Are you sure to continue?</h3>
                    </div>
                    <input type="hidden" name="id" id="id" value="">
                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">No,
                        Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--delete -->
<br />
<a class="btn btn-app" href="/employe/create">
    <span class="badge bg-primary"></span>
    <i class="fas fa-users"></i>
    <b>Add Employee</b>
</a>
<div class="dropdown-divider"></div>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><b>Company Management</b></h3>
    </div>
    <div class="card-body">
        <table class="table table-sm text-left table-hover">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>

            @if(!empty($employes) && $employes->count())
                @foreach($employes as $key => $empl)

                    <tbody>
                        <tr class="table-row" data-did=" {{ $empl->id ?? '' }}">
                            <td>{{ $empl->firstName }}</td>
                            <td>{{ $empl->lastName }}</td>
                            <td>{{ $empl->company->name }}</td>
                            <td>{{ $empl->email }}</td>
                            <td>{{ $empl->phonenumber }}</td>
                            <td>
                                <button type="submit" data-did="{{$empl->id}}" data-toggle="modal" data-target="#deleteOrder"
                                    class="btn btn-outline-danger btn-xs"><i class="fa fa-trash"></i>
                                    Delete</button>
                                    <a href="{{ url('employe/edit', $empl->id) }}"
                                class="btn btn-outline-success btn-xs"><i class="fas fa-pen"></i>
                                Edit
                            </a>
                                </td>
                        </tr>
                    </tbody>

                @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </table>
        {!! $employes->links() !!}
    </div>
</div>
</div>
</div>
</div>
@endsection
