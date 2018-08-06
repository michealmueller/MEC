@extends('layouts.master')

@section('content')

    <section class="container g-py-50 g-px-75--sm g-pb-170--md">
        <div class="row justify-content-center">
            @include('shared.errors')
            <form action="/profile" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="mb-4">
                    <div class="input-group">
                        <div class="row justify-content-center">
                            <div class="profile-header-container">
                                <div class="profile-header-img">
                                    <img class="rounded-circle"
                                         @if($data['user']->avatar)
                                            src="/storage/app/avatars/{{ $data['user']->avatar }}"
                                         @else
                                            src="/assets/img-temp/100x100/img3.jpg"
                                         @endif
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. dimensions should be less then 100x100.</small>
                    </div>
                </div>
                <label>Organization Name:</label>
                <div class="mb-4">
                    <div class="input-group">
                        <input class="form-control" type="text" name="org_name"
                                @if($data['user']->org_name)
                                    value="{{ $data['user']->org_name }}"
                                @endif
                        >
                    </div>
                </div>
                <div class="mb-4">
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection