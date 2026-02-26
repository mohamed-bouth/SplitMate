<x-app-layout>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm px-4">
        
        <div class="bg-[#1e1f22] border border-gray-800 rounded-3xl shadow-2xl w-full max-w-md overflow-hidden relative transform transition-all">
            
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-400 to-emerald-600"></div>

            <div class="p-8 text-center">
                
                <div class="w-16 h-16 bg-[#131416] border border-gray-700 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>

                <h3 class="text-sm font-bold tracking-widest text-green-500 uppercase mb-2">New Invitation</h3>
                
                <h2 class="text-2xl font-bold text-white mb-4 leading-tight">
                    <span class="text-gray-300">{{ $invitation->user->name }}</span> 
                    <span class="font-normal text-gray-400 text-lg block mt-1">invited you to join</span>
                    <span class="text-green-400">{{ $invitation->apartment->name }}</span>
                </h2>

                <p class="text-gray-500 text-sm mb-8">
                    Join this space to start splitting expenses and managing your shared bills easily.
                </p>           
                    <div class="grid grid-cols-2 gap-4">
                        
                        <form action="{{ route('invitation.refused' , $invitation->token) }}" method="post">
                            @csrf
                            <button type="submit" name="action" value="decline"
                                class="w-full py-3 px-4 bg-transparent border border-gray-700 text-gray-400 hover:text-red-400 hover:border-red-500/50 hover:bg-red-500/10 rounded-xl font-medium transition-all duration-200">
                                Decline
                            </button>
                        </form>
                        <form action="{{ route('invitation.accepted' , $invitation->token) }}" method="post">
                            @csrf
                            <button type="submit" name="action" value="accept"
                                class="w-full py-3 px-4 bg-green-500 hover:bg-green-400 text-white shadow-lg shadow-green-900/20 rounded-xl font-bold transition-all duration-200 transform hover:-translate-y-0.5">
                                Accept Invite
                            </button>
                        </form>
                        
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>