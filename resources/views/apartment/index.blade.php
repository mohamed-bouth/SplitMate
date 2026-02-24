<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-[#1e1f22] p-6 rounded-xl shadow-md mb-6 border-r-4 border-indigo-500">
            <div class="mb-4 sm:mb-0">
                <h2 class="text-2xl font-bold text-white">🏠 Apartment: friends</h2>
                <p class="text-sm text-gray-400 mt-1">Owner: lhandouz</p>
            </div>
            <div>
                <span class="px-4 py-2 bg-green-500/10 text-green-400 border border-green-500/20 rounded-lg text-sm font-bold">Apartment Status: active</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            
            <div class="bg-[#1e1f22] p-6 rounded-xl shadow-md border-t-4 border-blue-500">
                <h3 class="font-bold text-lg mb-4 text-white">📊 Current balances</h3>
                <div class="space-y-3">
                    <div class="bg-[#131416] flex justify-between items-center p-4 rounded-lg border border-gray-800 transition hover:border-gray-700">
                        <span class="font-semibold text-gray-200">Yassin</span>
                        <span class="text-green-500 font-bold" dir="ltr">+ 350.00 DH</span>
                    </div>
                    <div class="bg-[#131416] flex justify-between items-center p-4 rounded-lg border border-gray-800 transition hover:border-gray-700">
                        <span class="font-semibold text-gray-200">Mohamed</span>
                        <span class="text-red-500 font-bold" dir="ltr">- 150.00 DH</span>
                    </div>
                    <div class="bg-[#131416] flex justify-between items-center p-4 rounded-lg border border-gray-800 transition hover:border-gray-700">
                        <span class="font-semibold text-gray-200">karim</span>
                        <span class="text-red-500 font-bold" dir="ltr">- 200.00 DH</span>
                    </div>
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

        <div class="bg-[#1e1f22] p-6 rounded-xl shadow-md border-t-4 border-purple-500">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-lg text-white">👥 Apartment Member</h3>
                <button class="bg-indigo-600 hover:bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm font-bold transition-colors shadow-lg shadow-indigo-900/20">Add Member</button>
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
                        <tr class="bg-[#131416] border-b border-gray-800 hover:bg-[#1e1f22] transition-colors">
                            <td class="p-4 font-semibold text-white">Mohamed</td>
                            <td class="p-4 text-sm"><span class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2.5 py-1 rounded-md text-xs font-bold">Owner</span></td>
                            <td class="p-4 font-bold text-green-500" dir="ltr">+5</td>
                            <td class="p-4 text-center text-gray-500">-</td>
                        </tr>
                        <tr class="bg-[#131416] border-b border-gray-800 hover:bg-[#1e1f22] transition-colors">
                            <td class="p-4 font-semibold text-white">Yassin</td>
                            <td class="p-4 text-sm"><span class="bg-gray-700/50 text-gray-300 border border-gray-600/50 px-2.5 py-1 rounded-md text-xs font-bold">Member</span></td>
                            <td class="p-4 font-bold text-green-500" dir="ltr">+2</td>
                            <td class="p-4 text-center"><button class="text-red-400 hover:text-red-300 bg-red-400/10 hover:bg-red-400/20 px-3 py-1 rounded-md transition-colors text-sm font-bold">Kick 🚪</button></td>
                        </tr>
                        <tr class="bg-[#131416] hover:bg-[#1e1f22] transition-colors">
                            <td class="p-4 font-semibold text-white">Karim</td>
                            <td class="p-4 text-sm"><span class="bg-gray-700/50 text-gray-300 border border-gray-600/50 px-2.5 py-1 rounded-md text-xs font-bold">Member</span></td>
                            <td class="p-4 font-bold text-red-500" dir="ltr">-1</td>
                            <td class="p-4 text-center"><button class="text-red-400 hover:text-red-300 bg-red-400/10 hover:bg-red-400/20 px-3 py-1 rounded-md transition-colors text-sm font-bold">Kick 🚪</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>