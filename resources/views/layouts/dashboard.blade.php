@extends('layouts.app')

@section('content')
    @include('layouts.partials.navbar')

    <div class="flex min-h-screen max-w-container-max mx-auto">
        @yield('aside')
        <main class="flex-1 px-gutter py-8 overflow-hidden">
            @yield('page-content')
        </main>
    </div>
@endsection
