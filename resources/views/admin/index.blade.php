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

        <div class="px-2 w-4/5 overflow-hidden">
            <!-- Content -->
            <div class="flex flex-wrap mb-2">
                <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
                    <div class="bg-green-600 border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pl-1 pr-4"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                            <div class="flex-1 text-right">
                                <h5 class="text-white">Benutzer</h5>
                                <h3 class="text-white text-3xl">{{ $userCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
                    <div class="bg-blue-600 border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pl-1 pr-4"><i class="fas fa-list fa-2x fa-fw fa-inverse"></i></div>
                            <div class="flex-1 text-right">
                                <h5 class="text-white">Sportarten</h5>
                                <h3 class="text-white text-3xl">{{ $sportsCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pr-3 xl:pl-1">
                    <div class="bg-orange-600 border rounded shadow p-2">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pl-1 pr-4"><i class="fas fa-calendar-day fa-2x fa-fw fa-inverse"></i></div>
                            <div class="flex-1 text-right pr-1">
                                <h5 class="text-white">Events</h5>
                                <h3 class="text-white text-3xl">{{ $eventsCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
