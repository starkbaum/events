@extends('layouts.app')

@section('breadcrumbs')

<nav class="bg-gray-900 px-4rounded font-sans w-full">
    <ol class="list-reset flex text-gray-600">
        <li><a href="{{ route('home') }}" class="text-blue font-thin">{{ __('Home') }}</a></li>
        <li><span class="mx-2">/</span></li>
        <li><a href="{{ route('admin.index') }}" class="text-blue font-thin">{{ __('Administration') }}</a></li>
        <li><span class="mx-2">/</span></li>
        <li class="text-gray-500">{{ __('Events') }}</li>
    </ol>
</nav>

@endsection

@section('content')

<div class="flex flex-wrap -mx-2 overflow-hidden">

    <div class="my-2 px-2 w-1/5 overflow-hidden">
        <!-- Column Content -->
        @include('admin._menu')
    </div>

    <div class="my-2 px-2 w-4/5 overflow-hidden">
        <!-- Column Content -->
        <a href="{{ route('admin.events.create') }}" class="">
            <div class="px-4 py-1 rounded-full w-40 focus:outline-none bg-green-500 text-white shadow mb-4 text-center">
                {{ __('Neues Event') }}
            </div>
        </a>
        <div>
            <div class="shadow overflow-hidden rounded border-b border-white mb-4">
                <table class="min-w-full bg-white">
                <thead class="bg-teal-500 text-white">
                    <tr>
                    <th class="w-1/10 text-left py-3 px-4 uppercase font-semibold text-sm">{{ __('ID') }}</th>
                    <th class="w-4/10 text-left py-3 px-4 uppercase font-semibold text-sm">{{ __('Titel') }}</th>
                    <th class="w-4/10 text-left py-3 px-4 uppercase font-semibold text-sm">{{ __('Ort') }}</th>
                    <th class="w-4/10 text-left py-3 px-4 uppercase font-semibold text-sm">{{ __('Datum') }}</th>
                    <th class="w-4/10 text-left py-3 px-4 uppercase font-semibold text-sm">{{ __('Organisator') }}</th>
                    <th class="w-4/10 text-left py-3 px-4 uppercase font-semibold text-sm">{{ __('Sport') }}</th>
                    <th class="w-1/10 text-center py-3 px-4 uppercase font-semibold text-sm">{{ __('Aktionen') }}</td>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                @foreach ($events as $event)
                    <tr class="hover:bg-gray-200">
                    <td class="w-1/10 text-left py-3 px-4">{{ $event->id }}</td>
                    <td class="w-4/10 text-left py-3 px-4">{{ $event->title }}</td>
                    <td class="w-4/10 text-left py-3 px-4">{{ $event->location }}</td>
                    <td class="w-4/10 text-left py-3 px-4">{{ $event->getFormattedDate() }}</td>
                    <td class="w-4/10 text-left py-3 px-4">{{ $event->organizer }}</td>
                    <td class="w-4/10 text-left py-3 px-4 text-{{ $event->sport->color }}-600">{{ $event->sport->name }}</td>
                    <td class="w-1/10 text-center py-3 px-4">
                        <a class="hover:text-teal-500 mr-1" href="{{ route('admin.events.edit', $event->id) }}"><i class="far fa-edit"></i></a>
                        <a class="hover:text-red-600" href="{{ route('admin.events.delete', $event->id) }}"><i class="far fa-trash-alt"></i></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
