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

    <!-- Container for demo purpose -->
<div class="container my-10 mx-auto md:px-6">
    <!-- Section: Design Block -->
    <section class="mb-32 text-center">
      <div class="grid lg:grid-cols-3 lg:gap-x-12">
        <div class="mb-16 lg:mb-0">
          <div
            class="block h-full rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
            <div class="flex justify-center">
              <div class="-mt-8 inline-block rounded-full bg-primary-100 p-4 text-primary shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                  stroke="currentColor" class="h-7 w-7">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                </svg>
              </div>
            </div>
            <div class="p-6">
              @foreach($events as $event)
                <h3 class="mb-4 text-xl font-bold text-primary dark:text-primary-400">
                    The event details for <span class="mb-4 text-2xl font-bold text-primary dark:text-primary-400 text-yellow-500">{{ $event->title }}</span> are as follows
                </h3>
                {{-- <h5 class="mb-4 text-lg font-medium">Total reservations for the event <span class="mb-4 text-lg font-medium text-blue-500">{{ $totalReservations }}</span></h5>
                <p class="text-neutral-500 dark:text-neutral-300">
                    Out of these, <span class="text-red-500 dark:text-neutral-300">{{ $confirmedReservations }}</span> have been confirmed.
                </p> --}}
                <h5 class="mb-4 text-lg font-medium">Total reservations for the event
                  <span class="mb-4 text-lg font-medium text-blue-500">{{ $event->reservations()->count() }}</span>
                </h5>
                <p class="text-neutral-500 dark:text-neutral-300">
                    Out of these,
                    <span class="text-red-500 dark:text-neutral-300">{{ $event->reservations()->where('status', 'Confirmed')->count() }}</span>
                    have been confirmed.
                </p>
              @endforeach  
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Design Block -->
  </div>
  <!-- Container for demo purpose -->
</x-app-layout>