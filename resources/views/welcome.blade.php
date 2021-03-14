@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        {{ config('app.name') }}
    </div>
    <div class="description m-b-md">
        Sample users:<br/>
        Admin user: demo.admin@codecrew.us / password: admin<br/>
        Editor user: demo.editor@codecrew.us / password: editor<br/>
        Client user: demo.client@codecrew.us / password: client<br/>
    </div>
@endsection
