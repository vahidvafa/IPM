@extends('errors::minimal',['titleHeader'=>(($exception->getMessage()) ? $exception->getMessage() : __('string.404')),'code'=>''])
{{--@section('code', '404')--}}
@section('message', (($exception->getMessage()) ? $exception->getMessage() : __('string.404')))
