<x-app-layout>
<div class="container mx-auto p-6 max-w-4xl">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-white">🏢 My Apartments</h2>
        <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-lg text-sm font-bold transition">
            + Join New Apartment
        </a>
    </div>

    <div class="grid gap-6">
        @forelse($apartments as $apartment)
            <div class="bg-[#1e1f22] p-6 rounded-xl shadow-md border-l-4 {{ $apartment->pivot->status == 'active' ? 'border-green-500' : 'border-gray-600' }}">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="flex items-center gap-3">
                            <h3 class="text-xl font-bold text-white">{{ $apartment->name }}</h3>
                            @if($apartment->pivot->status == 'active')
                                <span class="bg-green-500/10 text-green-500 text-[10px] uppercase px-2 py-1 rounded border border-green-500/20">Current</span>
                            @endif
                        </div>
                        <p class="text-gray-400 text-sm mt-1">Joined: {{ $apartment->pivot->created_at->format('d M, Y') }}</p>
                    </div>

                    <div class="flex gap-2">
                        @if($apartment->pivot->status != 'active')
                            <form action="#" method="POST">
                                @csrf
                                <button class="text-xs bg-[#131416] hover:bg-orange-500 text-gray-300 hover:text-white px-4 py-2 rounded-md border border-gray-700 transition">
                                    Set as Active
                                </button>
                            </form>
                        @endif
                        <a href="#" class="text-xs bg-orange-500/10 text-orange-400 hover:bg-orange-500 hover:text-white px-4 py-2 rounded-md border border-orange-500/20 transition">
                            View Expenses
                        </a>
                    </div>
                </div>

                <div class="mt-4 flex gap-6 border-t border-gray-800 pt-4">
                    <div class="text-center">
                        <p class="text-[10px] text-gray-500 uppercase tracking-wider">Total Members</p>
                        <p class="text-white font-bold">{{ $apartment->users_count ?? $apartment->users()->count() }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-20 bg-[#1e1f22] rounded-xl border border-dashed border-gray-700">
                <p class="text-gray-500">You are not part of any apartment yet.</p>
            </div>
        @endforelse
    </div>
</div>
</x-app-layout>