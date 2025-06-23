<x-admin::layout>
    <x-slot name="title">Admin Dashboard</x-slot>
    <x-slot name="breadcrumb">Dashboard</x-slot>
    <x-slot name="page_slug">admin-dashboard</x-slot>

    <section>
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6"
            x-transition:enter="transition-all duration-500" x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0">

            <a href="{{ route('am.admin.index', ['status' => App\Models\AuthBaseModel::statusList()[App\Models\AuthBaseModel::STATUS_ACTIVE]]) }}"
                class="glass-card rounded-2xl p-6 card-hover float interactive-card" style="animation-delay: 0s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                        <i data-lucide="user-cog" class="w-6 h-6 text-blue-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-text-white mb-1">
                        {{ number_format($active_admins) }}</h3>
                </div>
                <p class="text-gray-800/60 dark:text-text-dark-primary text-sm">{{ __('Active Admins') }}</p>
            </a>


            <a href="{{ route('um.user.index', ['status' => App\Models\AuthBaseModel::statusList()[App\Models\AuthBaseModel::STATUS_ACTIVE]]) }}"
                class="glass-card rounded-2xl p-6 card-hover float interactive-card" style="animation-delay: 0.2s;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                        <i data-lucide="users" class="w-6 h-6 text-green-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-text-white mb-1">
                        {{ number_format($active_users) }}</h3>
                </div>

                <p class="text-gray-800/60 dark:text-text-dark-primary text-sm">{{ __('Active Users') }}</p>
            </a>
    </section>
</x-admin::layout>
