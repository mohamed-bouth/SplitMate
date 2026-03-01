<x-app-layout>
    <div class="py-12">
            @if(session('error'))
            <div class="mb-4 p-4 bg-[#1e1f22] border border-gray-400 rounded">
                <p class="text-white">{{ session('error') }}</p>
            </div>
            @endif
            @if(session('success'))
            <div class="mb-4 p-4 bg-[#1e1f22] border border-gray-400 rounded">
                <p class="text-white">{{ session('success') }}</p>
            </div>
            @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-end mb-8 px-4 sm:px-0">
                <div>
                    <h2 class="text-3xl font-bold text-white tracking-tight">Categories</h2>
                    <p class="text-gray-400 mt-2 text-sm">Manage your expense categories to keep everything organized.</p>
                </div>
                @owner($apartment)
                <a href="{{ route('category.create') }}" class="hidden sm:flex items-center gap-2 bg-green-500 hover:bg-green-400 text-white px-5 py-2.5 rounded-xl font-bold transition-all shadow-lg shadow-green-900/20 transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    New Category
                </a>
                @endowner
            </div>
            @owner($apartment)
            <div class="sm:hidden mb-6 px-4">
                <a href="{{ route('category.create') }}" class="flex justify-center items-center gap-2 w-full bg-green-500 text-white px-5 py-3 rounded-xl font-bold shadow-lg shadow-green-900/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    New Category
                </a>
            </div>
            @endowner

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 sm:px-0">
                
                @forelse($categories as $category)
                <div class="bg-[#1e1f22] border border-gray-800 rounded-2xl p-6 hover:border-green-500/50 transition-colors group relative overflow-hidden shadow-sm">
                    
                    <div class="absolute top-4 right-4 flex gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <a href="{{ route('category.edit' , $category->id) }}" class="text-gray-500 hover:text-blue-400 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>
                        <form action="{{ route('category.destroy' , $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-red-400 transition-colors" onclick="return confirm('Are you sure you want to delete this category?')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>

                    <div class="flex items-center gap-4 mb-4 mt-2">
                        <div class="w-14 h-14 rounded-2xl bg-[#131416] border border-gray-700 flex items-center justify-center text-2xl shadow-inner">
                            📌
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white capitalize">{{ $category->name }}</h3>
                            <p class="text-xs text-gray-500 mt-1">Created {{ $category->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>

                </div>

                @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 bg-[#1e1f22]/50 border-2 border-dashed border-gray-800 rounded-3xl">
                    <div class="w-20 h-20 bg-[#131416] rounded-full flex items-center justify-center mb-5 shadow-inner">
                        <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">No categories found</h3>
                    <p class="text-gray-500 mb-6 text-center max-w-sm">You haven't added any categories yet. Create one to start tracking your expenses properly.</p>
                    @owner($apartment)
                    <a href="{{ route('category.create') }}" class="px-6 py-3 bg-green-500 hover:bg-green-400 text-white font-bold rounded-xl transition-all shadow-lg shadow-green-900/20">
                        Create First Category
                    </a>
                    @endowner
                </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>