<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Users</title>
    </head>
    <body>
        <div class="container mx-auto p-8">
            <div class="flex justify-between items-center mt-16">
                <h1 class="text-4xl font-bold">All Users</h1>
            </div>
    
            <table class="min-w-full leading-normal mt-16">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            #Id
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            E-mail Address
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Photo
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Role
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                {{ $user->id }}
                            </td>
                            <td class="text-gray-900 whitespace-no-wrap">
                                {{ $user->name }}
                            </td>
                            <td class="text-gray-900 whitespace-no-wrap">
                                {{ $user->email }}
                            </td>
                            <td class="flex-shrink-0 w-10 h-10">
                                <img src="{{ asset($user->photo) }}" alt="User picture"
                                    class="w-16 h-16 object-cover rounded-full">
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                @if ($user->role === 'admin')
                                    <span
                                        class="text-red-500 font-bold rounded-full bg-red-100 py-1 px-3">{{ $user->role }}</span>
                                @elseif ($user->role === 'organiser')
                                    <span
                                        class="text-green-500 font-bold rounded-full bg-green-100 py-1 px-3">{{ $user->role }}</span>
                                @elseif ($user->role === 'user')
                                    <span
                                        class="text-orange-500 font-bold rounded-full bg-orange-100 py-1 px-3">{{ $user->role }}</span>
                                @else
                                    {{ $user->role }}
                                @endif
                            </td>
                            <td>
                                @if ($user->role !== 'admin')
                                    <a href="{{ route('users.update', $user->id) }}"
                                        class="inline-block px-4 py-2 leading-none rounded {{ $user->is_banned ? 'bg-red-500 text-white hover:bg-red-600' : 'bg-green-500 text-white hover:bg-green-600' }}">
                                        {{ $user->is_banned ? 'Unban' : 'Ban' }}
                                    </a>
                                @endif
                            </td>
    
                        </tr>
                    @empty
                        <tr>
                            <td class="py-2 px-4" colspan="8">
                                <h1 class="text-center text-gray-500">No users to show</h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
    </html>

</x-app-layout>