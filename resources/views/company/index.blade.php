@extends('adminlte::page')
@section('content')
<!--delete -->
<div class="modal fade" id="deleteOrder" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body w-100 text-center ">
                <form method="DELETE" enctype="multipart/form-data"
                    action="{{ route('company.destroy') }}">
                    @csrf
                    <div class="text-center"><h2><i class="fas fa-bullhorn"></i> {{ trans('sentence.attention')}}</h2></div>
                    <div class="dropdown-divider"></div>
                    <div><h3>{{ trans('sentence.tag_1')}}</h3></div>
                    <input type="hidden" name="id" id="id" value="">
                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">{{ trans('sentence.cancel')}}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('sentence.delete')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--delete -->
<br />
<a class="btn btn-app" href="/company/create">
    <span class="badge bg-primary">{{ $companies->count('id') }}</span>
    <i class="fas fa-building"></i>
    <b>{{ trans('sentence.tag_2')}}</b>
</a>
<div class="dropdown-divider"></div>
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><b>{{ trans('sentence.tag_3')}}</b></h3>
    </div>
    <div class="card-body">
        <table class="table table-sm text-left table-hover">
            <thead>
                <tr>
                    <th scope="col">{{ trans('sentence.name')}}</th>
                    <th scope="col">{{ trans('sentence.email')}}</th>
                    <th scope="col">{{ trans('sentence.logo')}}</th>
                    <th scope="col">{{ trans('sentence.website')}}</th>
                    <th scope="col">{{ trans('sentence.option')}}</th>
                </tr>
            </thead>
            @if(!empty($companies) && $companies->count())
            @foreach($companies as $key => $comp)
                <tbody>
                    <tr class="table-row" data-did=" {{ $comp->id ?? '' }}">
                        <td>{{ $comp->name }}</td>
                        <td>{{ $comp->email }}</td>
                        <td>{{ $comp->logo }}</td>
                        <td>{{ $comp->website }}</td>
                        <td><button type="submit" data-did="{{$comp->id}}" data-toggle="modal" data-target="#deleteOrder" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash"></i>{{ trans('sentence.delete')}}</button></span></td>
                    </tr>
                </tbody>
            @endforeach
            @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
            @endif
        </table>
        {!! $companies->links() !!}
    </div>
</div>
</div>
</div>
</div>
@endsection
