<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <h2 class="text-3xl font-black text-white mb-8">Admin Overview 🛡️</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                
                <div class="bg-[#1e1f22] border border-gray-800 rounded-2xl p-6 shadow-xl relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-500/10 rounded-xl">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-gray-400 font-medium text-sm">Total Registered Users</h3>
                    <p class="text-4xl font-black text-white mt-1">{{ number_format($usersCount) }}</p>
                    <div class="absolute bottom-0 left-0 h-1 w-full bg-blue-500"></div>
                </div>

                <div class="bg-[#1e1f22] border border-gray-800 rounded-2xl p-6 shadow-xl relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-purple-500/10 rounded-xl">
                            <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-gray-400 font-medium text-sm">Active Apartments</h3>
                    <p class="text-4xl font-black text-white mt-1">{{ number_format($activeApartments) }}</p>
                    <div class="absolute bottom-0 left-0 h-1 w-full bg-purple-500"></div>
                </div>

                <div class="bg-[#1e1f22] border border-gray-800 rounded-2xl p-6 shadow-xl relative overflow-hidden group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-500/10 rounded-xl">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <h3 class="text-gray-400 font-medium text-sm">Total Money Processed</h3>
                    <p class="text-4xl font-black text-white mt-1">{{ number_format($totalMoney, 2) }} <span class="text-lg text-green-500">DH</span></p>
                    <div class="absolute bottom-0 left-0 h-1 w-full bg-green-500"></div>
                </div>
            </div>

            <div class="bg-[#1e1f22] border border-gray-800 rounded-3xl overflow-hidden shadow-2xl">
                <div class="p-6 border-b border-gray-800 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-white">Newest Members</h3>
                    <span class="text-xs font-bold text-indigo-400 bg-indigo-500/10 px-3 py-1 rounded-full uppercase tracking-wider">Latest 5 Joins</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-[#131416] text-gray-500 text-xs uppercase font-black">
                            <tr>
                                <th class="px-6 py-4">User</th>
                                <th class="px-6 py-4">Email</th>
                                <th class="px-6 py-4">Joined Date</th>
                                <th class="px-6 py-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @foreach($recentUsers as $user)
                            <tr class="hover:bg-[#131416] transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-lg">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <span class="text-white font-semibold group-hover:text-indigo-400 transition-colors">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-gray-400">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-3 py-1 bg-green-500/10 text-green-400 text-[10px] font-black rounded-lg border border-green-500/20 uppercase">Verified</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>