@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assetsHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assets-histories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection