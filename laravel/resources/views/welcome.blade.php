
@extends('layouts.master')

@section('content')

    <section class="container g-py-100">
        <div class="row justify-content-center">
            <form method="get">
                <div class="form-group row g-mb-25">
                    <label for="example-text-input" class="col-2 col-form-label">Time Zone:</label>
                    <div class="col-8">
                        <select class="form-control select2" id="zone" name="timezone">
                                @if($selectedTZ !=null)
                                    <option selected value="{{ $selectedTZ}}">{{ $selectedTZ}}</option>
                                @else
                                    <option selected value="{{session()->get('timezone')}}">{{ session()->get('timezone')}}</option>
                                @endif

                                @foreach($timezone as $k=>$v)
                                    <option value="{{ $k }}">{{$k}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </div>
            </form>
            {!! $calendar->calendar() !!}
        </div>
    </section>

@endsection