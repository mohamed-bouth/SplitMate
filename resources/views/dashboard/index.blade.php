<x-app-layout>
    @if(auth()->user()->apartments()->wherePivot('status', 'active')->exists())
    @else
<div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    
    <div class="sm:mx-auto sm:w-full sm:max-w-3xl text-center mb-8">
        <h2 class="text-3xl font-extrabold text-white">Welcome {{Auth::user()->name}} 👋</h2>
        <p class="mt-2 text-lg text-white">You're not in any shared apartment yet. How would you like to begin?</p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-4xl">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4 sm:px-0">
            
            <div class="bg-[#1e1f22] shadow-md py-10 px-6 shadow-lg rounded-2xl border-t-4 border-indigo-600 hover:shadow-xl transition flex flex-col items-center text-center">
                <div class="bg-indigo-100 p-4 rounded-full mb-4">
                    <span class="text-4xl">🏠</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Building a new apartment</h3>
                <p class="text-white mb-8 flex-grow">
                    Create a new shared apartment, name it, and start inviting your roommates to easily organize and manage expenses.
                </p>
                <a href="{{ route('apartment.create') }}" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-indigo-700 transition shadow-md">
                    + Build a apartment now
                </a>
            </div>

            <div class="bg-[#1e1f22] shadow-md py-10 px-6 shadow-lg rounded-2xl border-t-4 border-emerald-500 hover:shadow-xl transition flex flex-col items-center text-center">
                <div class="bg-emerald-100 p-4 rounded-full mb-4">
                    <span class="text-4xl">🤝</span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Joining a apartment</h3>
                <p class="text-white mb-6 flex-grow">
                   Did you receive an invitation from one of your friends? Enter the invitation code (Token) here to join their apartment.
                </p>
                
                <div class="w-full">
                    <input type="text" placeholder="Enter the invitation code here (example: A8F9-BX21)" 
                           class="text-white bg-[#1e1f22] w-full text-center border-2 border-gray-300 rounded-lg px-4 py-3 mb-3 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition dir-ltr" dir="ltr">
                    <button class="w-full bg-emerald-500 text-white font-bold py-3 px-4 rounded-lg hover:bg-emerald-600 transition shadow-md">
                       Joining the apartment
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endif
</x-app-layout>
