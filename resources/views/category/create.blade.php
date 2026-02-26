<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1e1f22] overflow-hidden shadow-xl sm:rounded-2xl border border-gray-800">
                <div class="p-8">
                    
                    <div class="mb-8 border-b border-gray-800 pb-6">
                        <h2 class="text-2xl font-bold text-white mb-2">Create New Category</h2>
                        <p class="text-gray-400 text-sm">Create a new Category to start splitting expenses with your roommates.</p>
                    </div>

                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-300 mb-2">{{ __('Category Name') }}</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus 
                                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 placeholder-gray-600 shadow-sm outline-none" 
                                   placeholder="e.g. Rabat Tech House, Casablanca Boys..." />
                            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                        </div>

                        <div class="mt-8 flex items-center justify-end">
                            <a href="{{ route('category.index') }}" class="py-3.5 px-6 rounded-xl text-sm font-medium text-gray-400 hover:text-white transition-colors mr-4">
                                Cancel
                            </a>
                            <button type="submit" class="py-3.5 px-8 border border-transparent rounded-xl shadow-lg shadow-green-900/20 text-sm font-bold text-white bg-green-500 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 focus:ring-offset-[#1e1f22] transition-all transform hover:-translate-y-0.5">
                                Create Category
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>