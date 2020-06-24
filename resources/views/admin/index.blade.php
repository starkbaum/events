@extends('layouts.app')

@section('breadcrumbs')

<nav class="bg-gray-900 px-4rounded font-sans w-full">
    <ol class="list-reset flex text-gray-600">
        <li><a href="{{ route('home') }}" class="text-blue font-thin">Events</a></li>
        <li><span class="mx-2">/</span></li>
        <li class="text-gray-500">{{ __('Administration') }}</li>
    </ol>
</nav>

@endsection

@section('content')

<div class="container mx-auto">
    <div class="flex flex-wrap -mx-2 overflow-hidden">

        <div class="my-2 px-2 w-1/5 overflow-hidden">
            <!-- Content -->
            @include('admin._menu')
        </div>

        <div class="my-2 px-2 w-4/5 overflow-hidden">
            <!-- Content -->
        </div>
    </div>
</div>



@endsection
