<x-app-layout>
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#1e1f22] rounded-xl shadow-md p-6 border-t-4 border-indigo-500">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <h2 class="text-2xl font-bold text-white">🧾 Expenses log</h2>
                
                <div class="flex flex-wrap items-center gap-4 w-full md:w-auto">
                    <div class="flex items-center gap-2 w-full md:w-auto">
                        <select class="bg-[#131416] border border-gray-800 text-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 w-full md:w-auto transition-colors outline-none cursor-pointer">
                            <option value="">Every Mouth</option>
                            <option value="1">Jan</option>
                            <option value="2" selected>fev</option>
                            <option value="3">mar</option>
                        </select>
                        <button class="bg-gray-700 text-white px-4 py-2.5 rounded-lg hover:bg-gray-600 text-sm font-medium transition-colors border border-gray-600">Filter</button>
                    </div>

                    <button class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg hover:bg-indigo-500 text-sm font-bold transition-colors shadow-lg shadow-indigo-900/20 w-full md:w-auto">
                        Add Expense
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-800">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#0f1011] text-gray-400 text-sm border-b border-gray-800">
                        <tr>
                            <th class="p-4 font-semibold">Payment by</th>
                            <th class="p-4 font-semibold">Category</th>
                            <th class="p-4 font-semibold">Title</th>
                            <th class="p-4 font-semibold">Amount</th>
                            <th class="p-4 font-semibold">Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        <tr class="bg-[#131416] hover:bg-[#1e1f22] transition-colors border-b border-gray-800">
                            <td class="p-4 text-sm text-gray-400">Yassin</td>
                            <td class="p-4"><span class="bg-yellow-500/10 text-yellow-400 border border-yellow-500/20 px-2.5 py-1 rounded-md text-xs font-bold">Bills</span></td>
                            <td class="p-4 font-semibold text-gray-200">Electricity and water bill</td>
                            <td class="p-4 font-bold text-white" >450.00 DH</td>
                            <td class="p-4 text-sm text-gray-500">2026-02-20</td>
                            
                        </tr>
                        <tr class="bg-[#131416] hover:bg-[#1e1f22] transition-colors border-b border-gray-800">
                            <td class="p-4 text-sm text-gray-400">Mohamed</td>
                            <td class="p-4"><span class="bg-blue-500/10 text-blue-400 border border-blue-500/20 px-2.5 py-1 rounded-md text-xs font-bold">Internet</span></td>
                            <td class="p-4 font-semibold text-gray-200">Internet subscription</td>
                            <td class="p-4 font-bold text-white" >250.00 DH</td>
                            <td class="p-4 text-sm text-gray-500">2026-02-15</td>
                        </tr>
                        <tr class="bg-[#131416] hover:bg-[#1e1f22] transition-colors">
                            <td class="p-4 text-sm text-gray-400">Karim</td>
                            <td class="p-4"><span class="bg-green-500/10 text-green-400 border border-green-500/20 px-2.5 py-1 rounded-md text-xs font-bold">Food</span></td>
                            <td class="p-4 font-semibold text-gray-200">Grocery shopping (supermarket)</td>
                            <td class="p-4 text-sm text-gray-500">2026-02-05</td>
                            <td class="p-4 font-bold text-white" >850.00 DH</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</x-app-layout>