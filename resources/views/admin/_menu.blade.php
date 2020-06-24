
<div class="bg-white text-gray-800 shadow w-52 rounded">
    <ul class="list-reset">
        <li >
            <a href="{{ route('admin.index') }}" class="block p-4 text-grey-darker font-hairline border-teal-500 border-l-8 tracking-wide">
                {{ __('Dashboard') }}
            </a>
        </li>
        <li >
            <a href="{{ route('admin.events.index') }}" class="block p-4 text-grey-darker font-hairline border-teal-500 border-l-8 tracking-wide">
                {{ __('Events') }}
            </a>
        </li>
        <li >
            <a href="{{ route('admin.sports.index') }}" class="block p-4 text-grey-darker font-hairline border-teal-500 border-l-8 tracking-wide">
                {{ __('Sportarten') }}
            </a>
        </li>
    </ul>
</div>
