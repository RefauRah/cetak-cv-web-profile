@extends('user.template.base')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<form action="{{ route('awards.update',$awards->id) }}" method="post" id="form-awards" enctype="multipart/form-data" class="form-horizontal">
<div class="card">
    <div class="card-header text-center">
        <strong>AWARDS</strong>
    </div>
    <div class="card-body card-block" id="awards">
       {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="awards-input" class=" form-control-label">Awards</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="awards-input" name="award" value="{{ $awards->award }}" placeholder="Awards" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="descr-input" class=" form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="description_award" id="descr" rows="3" placeholder="Content..." class="form-control">{{ $awards->description_award }}</textarea>
                </div>
            </div>
        
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <a href="{{ url('user/awards') }}" class="btn btn-success btn-sm">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
</div>
</form>

@endsection