@extends('errors::minimal',['titleHeader'=>(($exception->getMessage()) ? $exception->getMessage() : __('string.404')),'code'=>''])

@section('message', (($exception->getMessage()) ? $exception->getMessage() : __('string.404')))
