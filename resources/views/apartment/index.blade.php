<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-[#1e1f22] p-6 rounded-xl shadow-md mb-6 border-r-4 border-indigo-500">
            <div class="mb-4 sm:mb-0">
                <h2 class="text-2xl font-bold text-white">🏠 Apartment: {{ $apartment->name }}</h2>
                <p class="text-sm text-gray-400 mt-1">Owner: {{ $apartment->users->where('pivot.role', 'owner')->first()?->name }}</p>
            </div>
            <div>
                <span class="px-4 py-2 bg-green-500/10 text-green-400 border border-green-500/20 rounded-lg text-sm font-bold">Apartment Status: {{ $apartment->status }}</span>
            </div>
        </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        
        <div class="bg-[#1e1f22] rounded-2xl p-6 border border-gray-800 shadow-lg relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="relative z-10">
                <h3 class="text-white text-sm font-medium mb-1">Total Expenses (All Time)</h3>
                <p class="text-3xl font-black text-white tracking-tight">
                    {{ number_format($totalExpenses, 2) }} <span class="text-indigo-500 text-lg">DH</span>
                </p>
                <div class="mt-4 flex items-center text-xs text-gray-500">
                    <span class="flex items-center gap-1 bg-indigo-500/10 text-indigo-400 px-2 py-1 rounded-md">
                        🏠 Apartment Total
                    </span>
                </div>
            </div>
            <div class="absolute top-0 left-0 h-1 w-full bg-indigo-500"></div>
        </div>

        <div class="bg-[#1e1f22] rounded-2xl p-6 border border-gray-800 shadow-lg relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div class="relative z-10">
                <h3 class="text-white text-sm font-medium mb-1">This Month's Expenses</h3>
                <p class="text-3xl font-black text-white tracking-tight">
                    {{ number_format($monthlyExpenses, 2) }} <span class="text-green-500 text-lg">DH</span>
                </p>
                <div class="mt-4 flex items-center text-xs text-gray-500">
                    <span class="flex items-center gap-1 bg-green-500/10 text-green-400 px-2 py-1 rounded-md">
                        📅 {{ now()->format('F Y') }}
                    </span>
                </div>
            </div>
            <div class="absolute top-0 left-0 h-1 w-full bg-green-500"></div>
        </div>

    </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            
            <div class="bg-[#1e1f22] p-6 rounded-xl shadow-md border-t-4 border-blue-500">
                <h3 class="font-bold text-lg mb-4 text-white">📊 Current balances</h3>
                <div class="space-y-3">
                    @foreach( $balances as $balanc )
                    <div class="bg-[#131416] flex justify-between items-center p-4 rounded-lg border border-gray-800 transition hover:border-gray-700">
                        <span class="font-semibold text-gray-200">{{ $balanc['user']->name }}</span>
                        @if($balanc['balance'] > 0)
                        <span class="text-green-500 font-bold" dir="ltr">+{{ $balanc['balance'] }} DH</span>
                        @else
                        <span class="text-red-500 font-bold" dir="ltr">{{ $balanc['balance'] }} DH</span>
                        @endif
                    </div>
                        
                    @endforeach
                </div>
            </div>

            <div class="bg-[#1e1f22] p-6 rounded-xl shadow-md border-t-4 border-orange-500">
                <h3 class="font-bold text-lg mb-4 text-white">🤝 Debt settlement</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center p-4 bg-[#131416] rounded-lg border border-orange-900/30">
                        <div class="text-sm">
                            <span class="font-bold text-gray-200">Mohamed</span> <span class="text-gray-500"> owes to </span> <span class="font-bold text-gray-200">yassin</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-bold text-orange-400" dir="ltr">150.00 DH</span>
                            <button class="text-xs bg-green-600/80 hover:bg-green-500 text-white px-3 py-1.5 rounded-md transition-colors font-medium">Payment made</button>
                        </div>
                    </div>
                    <div class="flex justify-between items-center p-4 bg-[#131416] rounded-lg border border-orange-900/30">
                        <div class="text-sm">
                            <span class="font-bold text-gray-200">karim</span> <span class="text-gray-500"> owes to </span> <span class="font-bold text-gray-200">yassin</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="font-bold text-orange-400" dir="ltr">200.00 DH</span>
                            <button class="text-xs bg-green-600/80 hover:bg-green-500 text-white px-3 py-1.5 rounded-md transition-colors font-medium">Payment made</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('token') && session('url'))
            <div class=" mb-4 p-4 bg-[#1e1f22] border border-gray-400 rounded">
                <p class="text-white"><strong>Token:</strong> {{ session('token') }}</p>
                <p class="text-white"><strong>Invitation URL:</strong> 
                    <a href="{{ session('url') }}" class="text-blue-500 underline" target="_blank">
                        {{ session('url') }}
                    </a>
                </p>
                <button onclick="navigator.clipboard.writeText('{{ session('url') }}')" 
                        class="mt-2 px-2 py-1 bg-blue-500 text-white rounded">
                    Copy URL
                </button>
            </div>
        @endif

        @if(session('error'))
        <div class="mb-4 p-4 bg-[#1e1f22] border border-gray-400 rounded">
            <p class="text-white">{{ session('error') }}</p>
        </div>
        @endif

        <div class="bg-[#1e1f22] p-6 rounded-xl shadow-md border-t-4 border-purple-500">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-lg text-white">👥 Apartment Member</h3>
                <form class="flex gap-4" action="{{ route('invitation.store' , $apartment->id) }}" method="post">
                    @csrf
                <input type="text" name="email" required autofocus autocomplete="username" 
                   class="block bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-indigo-500 focus:ring-indigo-500 transition-colors px-4 py-1 placeholder-gray-600 shadow-sm outline-none" 
                   placeholder="name@example.com">
                <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-bold transition-colors shadow-lg shadow-indigo-900/20">Create Invitation</button>
                </form>
            </div>
            <div class="overflow-x-auto rounded-lg border border-gray-800">
                <table class="w-full text-right border-collapse">
                    <thead class="bg-[#0f1011] text-gray-400 text-sm border-b border-gray-800">
                        <tr>
                            <th class="p-4 font-semibold">Name</th>
                            <th class="p-4 font-semibold">Role</th>
                            <th class="p-4 font-semibold">Reputation</th>
                            <th class="p-4 font-semibold text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        @foreach( $apartment->users as $user )
                        <tr class="bg-[#131416] border-b border-gray-800 hover:bg-[#1e1f22] transition-colors">
                            <td class="p-4 font-semibold text-white">{{ $user->name }}</td>
                            @if( $user->pivot->role == 'owner')
                            <td class="p-4 text-sm"><span class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2.5 py-1 rounded-md text-xs font-bold">Owner</span></td>
                            @else
                            <td class="p-4 text-sm"><span class="bg-gray-700/50 text-gray-300 border border-gray-600/50 px-2.5 py-1 rounded-md text-xs font-bold">Member</span></td>
                            @endif
                            <td class="p-4 font-bold text-green-500" dir="ltr">+5</td>
                            <td class="p-4 text-center"><button class="text-red-400 hover:text-red-300 bg-red-400/10 hover:bg-red-400/20 px-3 py-1 rounded-md transition-colors text-sm font-bold">Kick 🚪</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>