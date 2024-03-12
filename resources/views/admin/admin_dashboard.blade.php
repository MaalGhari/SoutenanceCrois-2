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

  <div class="container mx-auto mt-10 flex justify-center space-x-8">
    <!-- First Stats Container -->
    <div
        class="w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-orange-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">Users</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">Total</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalUsers }}</p>
    </div>

    <!-- Second Stats Container -->
    <div
        class="w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-green-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">Categories</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">Total</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalCategories }}</p>
    </div>

    <!-- Third Stats Container for EVENTS -->
    <div
        class="w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-yellow-500 flex items-center justify-between">
            <p class="mr-0 text-white text-lg pl-5">Events</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">Total</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalEvents }}</p>
    </div>

    <!-- Fourth Stats Container for RESERVATIONS -->
    <div
        class="w-72 bg-white max-w-xs rounded-md overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-105 cursor-pointer">
        <div class="h-20 bg-indigo-500 flex items-center justify-between"> 
            <p class="mr-0 text-white text-lg pl-5">Reservations</p>
        </div>
        <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
            <p class="text-gray-500">Total</p>
        </div>
        <p class="py-4 text-3xl ml-5 font-bold">{{ $totalReservations }}</p>
    </div>
</div>

</x-app-layout>  