@extends('errors::minimal',['titleHeader'=>(($exception->getMessage()) ? $exception->getMessage() : __('string.404')),'code'=>''])
{{--@section('code', '404')--}}
@section('message', (($exception->getMessage()) ? $exception->getMessage() : __('string.404')))

<div class="input-form col-md-12">
    <div class="row">
        <div class="col-12">
            <label>حوزه های تخصصی :</label>
        </div>
        <div class="col-12">
            <input type="text" name="specialized_basins"
                   value="{{(Session::get('type') == 4) ?request()->old('specialized_basins'):''}}"
                   size="40" aria-invalid="false"
                   placeholder="حوزه های تخصصی *" required>
            <img src="img/003-envelope.png" class="form-icon">
            @if (Session::get('type') == 4 && $errors->has('specialized_basins'))
                <div id="name-error" class="error text-danger pl-3" for="name"
                     style="display: block;">
                    <strong>{{ $errors->first('specialized_basins') }}</strong>
                </div>
            @endif
        </div>
    </div>
</div>
