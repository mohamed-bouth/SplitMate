<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <h2 class="text-2xl font-black text-white">Manage Users 👥</h2>

                <form action="{{ route('admin.users') }}" method="GET" class="w-full md:w-96">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Search by name or email..." 
                               class="w-full bg-[#1e1f22] border border-gray-800 rounded-2xl py-3 px-5 pl-12 text-gray-300 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none transition-all">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-[#1e1f22] border border-gray-800 rounded-3xl overflow-hidden shadow-2xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-[#131416] text-gray-500 text-xs uppercase font-black">
                            <tr>
                                <th class="px-6 py-4">Full Name</th>
                                <th class="px-6 py-4">Email Address</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Join Date</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse($users as $user)
                            <tr class="hover:bg-[#131416]/50 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-indigo-400 font-bold border border-gray-700">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <span class="text-white font-semibold">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400 text-sm">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    @if($user->is_banned)
                                        <span class="px-3 py-1 bg-red-500/10 text-red-500 text-[10px] font-black rounded-lg border border-red-500/20 uppercase">Banned</span>
                                    @else
                                        <span class="px-3 py-1 bg-green-500/10 text-green-400 text-[10px] font-black rounded-lg border border-green-500/20 uppercase">Active</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-right">
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.toggle-ban', $user->id) }}" method="POST">
                                            @csrf
                                            @if($user->is_active == 0)
                                                <button type="submit" class="bg-green-600 hover:bg-green-500 text-white text-xs font-bold py-2 px-4 rounded-xl transition-all shadow-lg shadow-green-900/20">
                                                    Unban User
                                                </button>
                                            @else
                                                <button type="submit" class="bg-red-600/10 hover:bg-red-600 text-red-500 hover:text-white border border-red-600/20 text-xs font-bold py-2 px-4 rounded-xl transition-all">
                                                    Ban User
                                                </button>
                                            @endif
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-600 italic">You (Admin)</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    No users found matching your search.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $users->appends(['search' => request('search')])->links() }}
            </div>

        </div>
    </div>
</x-app-layout>