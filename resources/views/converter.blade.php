@extends('layouts.app')

@section('content')
    <div class="container">
        <converter :currencies_str="{{ $currencies }}"></converter>
    </div>
@endsection