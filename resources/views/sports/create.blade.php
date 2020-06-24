@extends('layouts.app')

@section('breadcrumbs')

<nav class="bg-gray-900 px-4rounded font-sans w-full">
    <ol class="list-reset flex text-gray-600">
        <li><a href="{{ route('home') }}" class="text-blue font-thin">{{ __('Home') }}</a></li>
        <li><span class="mx-2">/</span></li>
        <li><a href="{{ route('admin.index') }}" class="text-blue font-thin">{{ __('Administration') }}</a></li>
        <li><span class="mx-2">/</span></li>
        <li><a href="{{ route('admin.sports.index') }}" class="text-blue font-thin">{{ __('Sportarten') }}</a></li>
        <li><span class="mx-2">/</span></li>
        <li class="text-gray-500">{{ __('Neue Sportart') }}</li>
    </ol>
</nav>

@endsection

@section('content')

<div class="flex flex-wrap -mx-2 overflow-hidden">

    <div class="my-2 px-2 w-1/5 overflow-hidden">
        <!-- Column Content -->
        @include('admin._menu')
    </div>

    <div class = "my-2 px-2 w-4/5 overflow-hidden">
        <!-- Column Content -->
        @if ($errors->any())
        <div class = "flex flex-col bg-red-400 px-8 py-3 mx-auto mb-4 rounded-lg shadow-lg">
            @foreach ($errors->all() as $error)
            <div class = "text-gray-200 font-medium">
                {{ __($error) }}
            </div>
            @endforeach
        </div>
        @endif


        <div class = "flex flex-col bg-white px-8 py-6 mx-auto mb-2 rounded-lg shadow-lg">

            <div class = "text-lg text-gray-900 font-medium uppercase">
                {{ __('Neue Sportart') }}
            </div>
            <div class = "flex justify-between items-center mt-4">
                <form class = "w-full" action = "{{ route('admin.sports.store') }}" method = "POST">

                    @csrf

                    <div class = "flex flex-wrap -mx-3 mb-6">
                        <div class = "w-full px-3">
                            <label class = "block uppercase tracking-wide text-gray-900 text-xs font-bold mb-2" for = "name">
                                {{ __('Name') }}
                            </label>
                            <input
                                class = "appearance-none block w-full bg-white text-gray-900 border border-gray-900 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 focus:border-gray-500"
                                id = "name"
                                type = "text"
                                name = "name"
                                value = {{ old('name') }}
                            >
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-900 text-xs font-bold mb-2" for="_sport_id">
                                {{ __('Farbe *') }}
                            </label>
                            <select
                                class="appearance-none block w-full bg-white text-gray-900 border border-gray-900 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-100 focus:border-gray-500"
                                name="color"
                            >
                                @foreach ($colors as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class = "md:flex md:items-center">
                        <div class = "md:w-1/3">
                            <button class = "shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                {{ __('Speichern') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
