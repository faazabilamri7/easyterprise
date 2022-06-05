@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.purchaseReturn.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.purchase-returns.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="id_order_id">{{ trans('cruds.purchaseReturn.fields.id_order') }}</label>
                            <select class="form-control select2" name="id_order_id" id="id_order_id">
                                @foreach($id_orders as $id => $entry)
                                    <option value="{{ $id }}" {{ old('id_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseReturn.fields.id_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_purchase_return">{{ trans('cruds.purchaseReturn.fields.date_purchase_return') }}</label>
                            <input class="form-control date" type="text" name="date_purchase_return" id="date_purchase_return" value="{{ old('date_purchase_return') }}">
                            @if($errors->has('date_purchase_return'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_purchase_return') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseReturn.fields.date_purchase_return_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.purchaseReturn.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseReturn.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection