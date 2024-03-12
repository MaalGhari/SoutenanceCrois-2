<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div>        
        <div class="max-w-screen-xl mx-auto mt-5 p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($events as $event)
                    {{-- @php
                        $reservationsCount = \App\Models\Reservation::where('event_id', $event->id)->count();
                        $event->available_seats = $event->available_seats - $reservationsCount;
                        $totalAvailableSeats = $event->available_seats - $reservationsCount;
                    @endphp --}}
                    <div class="border border-gray-400 bg-white rounded p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <div class="flex items-center">
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                    </svg>+
                                    Members only
                                </p>
                            </div>
                            <div class="text-gray-900 font-bold text-xl mb-2 mt-5">{{$event->title}}</div>
                                <p class="text-gray-700 text-base">{{$event->description}}</p>
                                <div class="flex items-center text-gray-500 gap-2 mt-3">
                                    <p class="text-blue-900 text-base font-bold">{{$event->location}}</p>
                                    <span class="ml-32 leading-none text-gray-600"></span>
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-1 leading-none"> {{$event->date}}</span>
                                    
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img class="w-10 h-10 rounded-full mr-4" src="{{asset(''. $event->users->photo)}}" alt="Avatar of Jonathan Reinink">
                                <p class="text-green-600 font-bold leading-none">{{$event->users->name}}</p>
                            </div>    
                            <div class="text-sm mt-5">
                                <p class="text-red-600 text-left font-bold">{{$event->categories->name}}</p>
                            </div>
                            <div class="text-sm mt-1"> 
                                <p class="text-orange-400 text-bold text-right text-lg">{{ $event->available_seats }}</p>
                            </div>
                            @if(Auth::user()->role == 'user')
                                <div class="button-container">
                                    <form action="{{ route('apply', $event->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow mt-5">
                                            Reserve here!
                                        </button>
                                    </form>
                                
                                    <span class="button-spacing"></span>
                                
                                    <form action="{{ route('showTicket') }}" method="POST" class="inline-block">
                                        @csrf
                                        <input type="text" class = "hidden" value = "{{$event->id}}" name = "eventId">
                                        <button class="bg-white hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-900 rounded shadow mt-5">
                                            View ticket
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>