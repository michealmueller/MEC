@extends('layouts.master')

@section('content')

    <section class="container g-py-100">
        <div class="row justify-content-center">
            {!! $calendar->calendar() !!}
        </div>
    </section>

@endsection

@section('js')
    {!! $calendar->script() !!}
@endsection