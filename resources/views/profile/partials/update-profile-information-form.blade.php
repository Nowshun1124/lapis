<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        
        <div>
            <x-picture-input />
            <x-input-error class="mt-2" :messages="$errors->get('picture')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('メール')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        
        <div>
            <x-input-label for="introduction" :value="__('自己紹介')" />
            <x-text-input id="introduction" name="introduction" type="text" class="mt-1 block w-full" :value="old('introduction', $user->introduction)"/>
            <x-input-error class="mt-2" :messages="$errors->get('introduction')" />
        </div>
        
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    
    <form action="{{ route('account_type.select') }}" method="POST">
        @csrf
        <div class="flex items-center gap-4">
            <input type="hidden" name="user_id" value="false">
            @if ( Auth::user()->account_type === true )
                <p>適用済み</p>
            @else
                <p style="line-height:70px;">アーティストアカウントとして登録：<input id="account_type" name="user_id" type="checkbox" value="old('account_type', $user->account_type)"/></p>
                <x-primary-button>{{ __('適用') }}</x-primary-button>
            @endif    
        </div>　　
    </form> 
</section>
