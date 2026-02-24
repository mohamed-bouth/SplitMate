<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Create an Account ✨</h2>
        <p class="text-gray-400 text-sm">Join SPLITMATE and start managing your shared expenses</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="block font-medium text-sm text-gray-300 mb-2">{{ __('Full Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 placeholder-gray-600 shadow-sm outline-none" 
                   placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-6">
            <label for="email" class="block font-medium text-sm text-gray-300 mb-2">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 placeholder-gray-600 shadow-sm outline-none" 
                   placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-6">
            <label for="password" class="block font-medium text-sm text-gray-300 mb-2">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" 
                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 placeholder-gray-600 shadow-sm outline-none" 
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-6">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-300 mb-2">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 placeholder-gray-600 shadow-sm outline-none" 
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-8">
            <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-green-900/20 text-md font-bold text-white bg-green-500 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 focus:ring-offset-[#1e1f22] transition-all transform hover:-translate-y-0.5">
                {{ __('Create Account') }}
            </button>
        </div>
        
        <div class="mt-8 text-center text-sm text-gray-400 border-t border-gray-800 pt-6">
            Already registered? 
            <a href="{{ route('login') }}" class="text-green-400 hover:text-green-300 font-bold transition-colors">Log in here</a>
        </div>
    </form>
</x-guest-layout>
