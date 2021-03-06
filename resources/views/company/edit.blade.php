@extends('adminlte::page')
@section('content')
<br />
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ trans('sentence.tag_3')}}</h3>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('company.update', $companies->id) }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{$companies->name}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" value="{{$companies->email}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="website" class="form-control" value="{{$companies->website}}">
                    </div>
                    <div class="mb-3">
                        <img id="preview-image" src="{{ asset('images/'.$companies->logo) }}"
                            alt="preview image" value="{{$companies->logo}}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="logo"  value="{{$companies->logo}}" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary "><i class="fas fa-pen"></i>{{ trans('sentence.save')}}</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-8">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mt-4 mb-4">{{ trans('sentence.company')}}</h2>
                </div>
                @foreach($data_companies as $company)
                    <div class="col-md-6 col-lg-4">
                        <!-- Bootstrap 5 card box -->
                        <div class="card-box">
                            <div class="card-thumbnail">
                                <img src="{{ asset('images/'.$company->logo) }}" alt="">
                            </div>
                            <h3><a href="#" class="mt-2 text-danger">{{ $company->name }}</a></h3>
                            <div><small>Joint :
                                    {{ date('d-m-y', strtotime($company->created_at)) }}</small>
                            </div>
                            <p class="text-secondary">Company Short Description, Address, etc</p>
                            <a href="{{ url('company/edit', $company->id) }}"
                                class="btn btn-success btn-xs float-right"><i class="fas fa-pen"></i>
                                {{ trans('sentence.edit')}}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('#image').change(function () {

        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);

    });

</script>
<style>
    img {
        border: 1px solid #ddd;
        padding: 5px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }

    img:hover {
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
    }

    .card-box {
        border: 1px solid #ddd;
        padding: 20px;
        box-shadow: 0px 0px 10px 0px #c5c5c5;
        margin-bottom: 30px;
        float: left;
        border-radius: 10px;
    }

    .card-box .card-thumbnail {
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;
        transition: 1s;
    }

    .card-box .card-thumbnail:hover {
        transform: scale(1.2);
    }

    .card-box h3 a {
        font-size: 20px;
        text-decoration: none;
    }

</style>
@endsection
