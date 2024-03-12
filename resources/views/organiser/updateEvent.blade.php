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

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update events</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100"> --}}
    <!-- Main modal -->
    <div class="flex items-center justify-center min-h-screen">

        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow bg-gray-100">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                    <h1 class="text-2xl font-semibold">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-gray-600 from-orange-600">
                            Update Event
                        </span>
                    </h1> 
                </div>
                @foreach($events as $event)
                <form class="p-4 md:p-5 bg-gray-100" action="{{ route('updateEvents.edit', $event->id) }}" method="post">
                    @csrf                    
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <input type="hidden" name="organiser_id" value="{{ $event->organiser_id}}">
                            <div class="col-span-2">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 text-black">Title</label>
                                <input type="text" name="title" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="" required="" value="{{ $event->title }}">
                            </div>
                            <div class="col-span-2">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 text-black">Description</label>
                                <textarea name="description" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="" required="">{{ $event->description }}</textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 text-black">Date</label>
                                <input type="date" name="date" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="" required="" value="{{ $event->date }}">
                            </div>
                            <div class="col-span-2">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 text-black">Location</label>
                                <input type="text" name="location" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="" required="" value="{{ $event->location }}">
                            </div>
                            <div class="col-span-2">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 text-black">Available seats</label>
                                <input type="number" name="available_seats" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="" required="" value="{{ $event->available_seats }}">
                            </div>
                            <div class="col-span-2">
                                <label for="acceptance" class="block mb-2 text-sm font-medium text-gray-900 text-black">Type of acceptance</label>
                                <select id="acceptance" name="acceptance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                    <option selected disabled>Select Acceptance</option>
                                    <option value="Automatic acceptance" {{ $event->acceptance === 'Automatic acceptance' ? 'selected' : '' }}>Automatic acceptance</option>
                                    <option value="Manual acceptance" {{ $event->acceptance === 'Manual acceptance' ? 'selected' : '' }}>Manual acceptance</option>
                                </select>
                            </div>
                            <div class="col-span-2">
                                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 text-black">Type of category</label>
                                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" required>
                                    <option selected disabled>Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $event->category_id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>{{ $event->categories->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                    <button type="submit" name="updateEvents" class="block mx-auto w-full focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-gray-300 hover:bg-orange-600 focus:ring-orange-600 hover:text-white">
                        Update
                    </button>
                    
                </form>
                @endforeach
            </div>
        </div>
</div>
{{-- </body>
</html> --}}

</x-app-layout>