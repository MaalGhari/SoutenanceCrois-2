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
    <title>Update categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100"> --}}
    <!-- Main modal -->
    <div class="flex items-center justify-center min-h-screen">

        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow  bg-gray-100">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                    <h1 class="text-2xl font-semibold">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-gray-600 from-orange-600">
                            Update Category
                        </span>
                    </h1> 
                </div>
                @foreach($categories as $category)
                <form class="p-4 md:p-5 bg-gray-100" action="{{ route('updateCategories.edit', $category->id) }}" method="post">
                    @csrf                    
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            {{-- <input type="hidden" name="entreprise_id" value="{{ $category->organiser_id}}"> --}}
                            <div class="col-span-2">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 text-black">Name</label>
                                <input type="text" name="name" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500" placeholder="" required="" value="{{ $category->name }}">
                            </div>
                        </div>
                    
                    <button type="submit" name="updateCategories" class="block mx-auto w-full focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-gray-300 hover:bg-orange-600 focus:ring-orange-600 hover:text-white">
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