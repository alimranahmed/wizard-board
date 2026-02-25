<x-layouts::app.sidebar :title="$title ?? null">
    <flux:main class="px-2 lg:px-6">
        {{ $slot }}
    </flux:main>
</x-layouts::app.sidebar>
