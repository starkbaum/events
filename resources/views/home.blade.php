@extends('layouts.app')

@section('content')

<div class="flex flex-wrap -mx-2 overflow-hidden">

    <div class="my-2 px-2 w-1/5 overflow-hidden">
        <!-- Column Content -->
        <div class="bg-white text-gray-800 shadow w-52 rounded">
            <ul class="list-reset">
                <li >
                    <a href="{{ route('home') }}" class="block p-4 text-grey-darker font-hairline border-teal-500 border-l-8 tracking-wide">
                        {{ __('Alle') }}
                    </a>
                </li>
                @foreach ($sports as $sport)
                <li >
                    <a href="{{ route('sports.show', $sport) }}" class="block p-4 text-grey-darker font-hairline border-{{ $sport->color }}-500 border-l-8 tracking-wide">
                        {{ __($sport->name) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="my-2 px-2 w-4/5 overflow-hidden">
        <!-- Column Content -->

        @foreach ($events as $event)
        <div class="lg:flex shadow rounded-lg mb-4">
            <div class="bg-{{ $event->sport->color }}-600 rounded-lg lg:w-2/12 py-4 block h-full shadow-inner">
                <div class="text-center tracking-wide">
                    <div class="text-white font-bold text-4xl ">{{ $event->getDay() }}</div>
                    <div class="text-white font-normal text-2xl">{{ $event->getMonth() }}</div>
                </div>
            </div>
            <div class="w-full  lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
                <div class="flex flex-row lg:justify-start justify-center">
                    <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                        <i class="far fa-clock"></i> {{ $event->getFormattedDate() }}
                    </div>
                    <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                        {{ __('Organisator') }}: {{ $event->organizer }}
                    </div>
                </div>
                <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2">
                    {{ $event->title }}
                </div>
                <div class="text-gray-600 font-medium text-sm pt-1 text-center lg:text-left px-2">
                    {{ $event->sport->name }}
                </div>
                <div class="text-gray-600 font-medium text-sm pt-1 text-center lg:text-left px-2">
                    <a href="http://maps.google.com/?q={{ $event->location }}" target="_blank">
                        {{ $event->location }}
                    </a>
                </div>
            </div>
            <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                <a href="{{ $event->buy_ticket }}">
                    <span class="tracking-wider text-gray-600 bg-gray-200 px-2 text-sm rounded leading-loose mx-2 font-semibold">
                        {{ __('Tickets kaufen') }}
                    </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
