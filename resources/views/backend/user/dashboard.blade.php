<x-user::layout>
    <x-slot name="title">User Dashboard</x-slot>
    <x-slot name="breadcrumb">{{ __('Dashboard') }}</x-slot>
    <x-slot name="page_slug">user-dashboard</x-slot>

    <section>
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6"
            x-transition:enter="transition-all duration-500" x-transition:enter-start="opacity-0 translate-y-8"
            x-transition:enter-end="opacity-100 translate-y-0">

            </div>
        </div>
    </section>
</x-user::layout>
