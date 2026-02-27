<x-app-layout>
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-[#1e1f22] rounded-xl shadow-md p-6 border-t-4 border-indigo-500">
            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-white tracking-tight">Expenses</h2>
                    <p class="text-gray-400 mt-2 text-sm">Manage your expense to keep everything organized.</p>
                </div>
                
                <div class="flex flex-wrap items-center gap-4 w-full md:w-auto">
                    <form action="{{ route('expense.index') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto">
                        <select name="month" class="bg-[#131416] border border-gray-800 text-gray-300 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block p-2.5 w-full md:w-auto transition-colors outline-none cursor-pointer">
                            <option value="">Every Month</option>
                            @foreach(range(1, 12) as $m)
                                <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                    {{ date('M', mktime(0, 0, 0, $m, 1)) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-gray-700 text-white px-4 py-2.5 rounded-lg hover:bg-gray-600 text-sm font-medium transition-colors border border-gray-600">Filter</button>
                    </form>
                    
                    <a href="{{ route('expense.create') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg hover:bg-indigo-500 text-sm font-bold transition-colors shadow-lg shadow-indigo-900/20 w-full md:w-auto text-center">
                        Add Expense
                    </a>
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
                            <th class="p-4 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        @forelse($expenses as $expense)
                            <tr class="bg-[#131416] hover:bg-[#1e1f22] transition-colors border-b border-gray-800">
                                <td class="p-4 text-sm">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-indigo-500/10 border border-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold text-xs">
                                            {{ substr($expense->user->name, 0, 1) }}
                                        </div>
                                        {{ $expense->user->name }}
                                    </div>
                                </td>
                                <td class="p-4">
                                    <span class="bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 px-2.5 py-1 rounded-md text-xs font-bold uppercase">
                                        {{ $expense->category->name }}
                                    </span>
                                </td>
                                <td class="p-4 font-semibold text-gray-200">{{ $expense->name }}</td>
                                <td class="p-4 font-bold text-white">{{ number_format($expense->amount, 2) }} DH</td>
                                <td class="p-4 text-sm text-gray-500">{{ $expense->created_at->format('Y-m-d') }}</td>
                                <td class="p-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        <a href="{{ route('expense.edit', $expense->id) }}" class="text-gray-500 hover:text-indigo-400 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <form action="{{ route('expense.destroy', $expense->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  class="text-gray-500 hover:text-indigo-400 transition-colors">
                                                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-16 h-16 bg-gray-800/50 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                        </div>
                                        <h3 class="text-lg font-bold text-white mb-1">No expenses recorded</h3>
                                        <p class="text-gray-500 text-sm mb-6">Looks like you haven't added any expenses for this period.</p>
                                        <a href="{{ route('expense.create') }}" class="text-indigo-400 hover:text-indigo-300 font-bold text-sm transition-colors border-b border-indigo-400 border-dashed pb-1">
                                            Add your first expense now
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{-- $expenses->links() --}}
            </div>

        </div>
    </div>
</div>
</x-app-layout>