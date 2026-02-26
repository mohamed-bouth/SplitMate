<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1e1f22] overflow-hidden shadow-xl sm:rounded-2xl border border-gray-800">
                <div class="p-8">
                    
                    <div class="mb-8 border-b border-gray-800 pb-6">
                        <h2 class="text-2xl font-bold text-white mb-2">Add New Expense 💸</h2>
                        <p class="text-gray-400 text-sm">Log a new expense to track where your money is going.</p>
                    </div>

                    <form method="POST" action="{{ route('expense.store') }}">
                        @csrf

                        <div class="mb-6">
                            <label for="name" class="block font-medium text-sm text-gray-300 mb-2">Expense Name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus 
                                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 outline-none" 
                                   placeholder="e.g. Weekly Groceries, Electricity Bill..." />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="amount" class="block font-medium text-sm text-gray-300 mb-2">Amount (DH)</label>
                                <div class="relative">
                                    <input id="amount" type="number" step="0.01" name="amount" value="{{ old('amount') }}"  
                                           class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors pl-4 pr-12 py-3 outline-none" 
                                           placeholder="0.00" />
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm font-bold">DH</span>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                            </div>

                            <div>
                                <label for="category_id" class="block font-medium text-sm text-gray-300 mb-2">Category</label>
                                <select id="category_id" name="category_id" 
                                        class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 outline-none appearance-none">
                                    <option value="" disabled selected>Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-8 flex items-center justify-end">
                            <a href="{{ route('expense.index') }}" class="py-3.5 px-6 rounded-xl text-sm font-medium text-gray-400 hover:text-white transition-colors mr-4">
                                Cancel
                            </a>
                            <button type="submit" class="py-3.5 px-8 bg-green-500 hover:bg-green-400 text-white font-bold rounded-xl shadow-lg shadow-green-900/20 transition-all transform hover:-translate-y-0.5">
                                Save Expense
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>