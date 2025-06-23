<header class="sticky top-0 z-30 pt-2 px-2">
    <div class="glass-card">
        <div class="flex items-center justify-between p-4 lg:p-6">
            <div class="flex items-center gap-4">
                <!-- Menu Toggle Button -->
                <button @click="toggleSidebar()"
                    class="p-2 rounded-xl hover:bg-bg-black/10 dark:hover:bg-bg-white/10 dark:text-text-white text-text-light-primary transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-white/20 group"
                    :aria-label="desktop ? (sidebar_expanded ? 'Collapse sidebar' : 'Expand sidebar') : (mobile_menu_open ?
                        'Close menu' : 'Open menu')">
                    <i data-lucide="menu" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                </button>

                <div class="hidden sm:block">

                    <h1 class="text-xl lg:text-2xl font-bold dark:text-text-white text-text-light-primary">
                        @if (Carbon\Carbon::now()->hour < 12)
                            {{ __('Good morning') }}
                        @elseif (Carbon\Carbon::now()->hour < 17)
                            {{ __('Good afternoon') }}
                        @else
                            {{ __('Good evening') }}
                        @endif,
                        {{ user()->name }}
                    </h1>
                    <p class="text-text-light-secondary dark:text-text-dark-primary text-sm">
                        {{ __("Here's what's happening today") }}
                    </p>
                </div>
            </div>

            <!-- Header Actions -->
            <div class="flex items-center gap-3">
                @if (isset($not_use))
                    {{-- <!-- Search -->
                <x-admin.search-form placeholder="Search here..." /> --}}
                @endif

                {{-- <!-- Theme Toggle --> --}}
                <!-- Theme Toggle Button (Only Light/Dark) -->
                <button @click="$store.theme.toggleTheme()"
                    class="p-2 rounded-xl hover:bg-black/10 dark:hover:bg-white/10 transition-colors"
                    data-tooltip="Toggle theme"
                    :title="$store.theme.current.charAt(0).toUpperCase() + $store.theme.current.slice(1) + ' mode'">
                    <i data-lucide="sun" x-show="!$store.theme.darkMode"
                        class="w-5 h-5 text-text-light-primary dark:text-text-white"></i>
                    <i data-lucide="moon" x-show="$store.theme.darkMode"
                        class="w-5 h-5 text-text-light-primary dark:text-text-white"></i>
                </button>


                @if (isset($not_use))
                    {{-- <!-- Notifications -->
                    <button @click="toggleNotifications()"
                        class="relative p-2 rounded-xl hover:bg-bg-black/10 dark:hover:bg-bg-white/10 transition-colors">
                        <i data-lucide="bell" class="w-5 h-5 text-text-light-primary dark:text-text-white"></i>
                        <div x-show="notifications.length > 0"
                            class="absolute top-1 right-1 w-2 h-2 bg-red-400 rounded-full notification-badge">
                        </div>
                    </button> --}}
                @endif

                <!-- Profile -->
                <div class="relative" x-data="{ open: false }">
                    @if (isset($not_use))
                        {{-- <button @click="open = !open"
                            class=" flex items-center gap-2 p-1 rounded-xl hover:bg-bg-white/10 transition-colors">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face&auto=format"
                                alt="Profile" class="avatar rounded-lg object-cover">
                        </button> --}}
                    @endif

                    <button @click="open = !open" class="avatar">
                        <div class="w-8 rounded-xl">
                            <img src="{{ auth()->user()->modified_image ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=32&h=32&fit=crop&crop=face&auto=format' }}"
                                alt="{{ auth()->user()->name }}" class="object-cover w-full h-full">
                        </div>
                    </button>

                    <!-- Profile Dropdown -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="hidden absolute right-0 mt-2 w-fit min-w-40 glass-card bg-bg-dark-primary/40   dark:bg-bg-dark-tertiary rounded-xl shadow-lg py-2 z-50"
                        :class="open ? '!block' : '!hidden'">
                        {{-- @if (isset($not_use)) --}}
                        <x-user.profile-navlink route="{{ route('user.profile') }}" name="{{ __('Profile') }}" />
                        <x-user.profile-navlink route="{{ route('user.change-password') }}"
                            name="{{ __('Change Password') }}" />
                        {{-- <x-admin.profile-navlink route="#" name="{{ __('Settings') }}" /> --}}
                        {{-- @endif --}}
                        <x-user.profile-navlink route="{{ route('logout') }}" logout='true'
                            name="{{ __('Sign Out') }}" />
                        @if (isset($not_use))
                            {{-- <a href="#"
                                    class="block px-4 py-2 text-text-white hover:bg-bg-white/10 transition-colors">Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-text-white hover:bg-bg-white/10 transition-colors">Settings</a>
                                <div class="border-t border-white/10 my-2"></div>
                                <a href="#"
                                    class="block px-4 py-2 text-text-white hover:bg-bg-white/10 transition-colors">Sign
                                    out</a> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="px-4 lg:px-6 pb-4">
            <nav class="flex items-center gap-2 text-sm text-text-light-primary/60 dark:text-text-dark-primary">
                <a href="{{ route('user.dashboard') }}">{{ __('User Dashboard') }}</a>
                <i data-lucide="chevron-right" class="w-4 h-4"></i>
                <span class="text-text-light-primary dark:text-text-white capitalize"> {{ $breadcrumb }}</span>
            </nav>
        </div>
    </div>
</header>
