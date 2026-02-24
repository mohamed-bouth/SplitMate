<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-white mb-2">Welcome Back 👋</h2>
        <p class="text-gray-400 text-sm">Sign in to manage your shared space</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" class="block font-medium text-sm text-gray-300 mb-2">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 placeholder-gray-600 shadow-sm outline-none" 
                   placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <div class="mt-6">
            <label for="password" class="block font-medium text-sm text-gray-300 mb-2">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" 
                   class="block w-full bg-[#131416] border border-gray-800 rounded-xl text-white focus:border-green-500 focus:ring-green-500 transition-colors px-4 py-3 placeholder-gray-600 shadow-sm outline-none" 
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" name="remember"
                       class="rounded border-gray-700 bg-[#131416] text-green-500 shadow-sm focus:ring-green-500 focus:ring-offset-[#1e1f22] cursor-pointer">
                <span class="ms-2 text-sm text-gray-400 group-hover:text-gray-300 transition-colors">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-green-400 hover:text-green-300 transition-colors font-medium" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="mt-8">
            <button type="submit" class="w-full flex justify-center items-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-green-900/20 text-md font-bold text-white bg-green-500 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 focus:ring-offset-[#1e1f22] transition-all transform hover:-translate-y-0.5">
                {{ __('Log in') }}
            </button>
        </div>
        
        <div class="mt-8 text-center text-sm text-gray-400 border-t border-gray-800 pt-6">
            Don't have an account yet? 
            <a href="{{ route('register') }}" class="text-green-400 hover:text-green-300 font-bold transition-colors">Sign up now</a>
        </div>
    </form>
</x-guest-layout>