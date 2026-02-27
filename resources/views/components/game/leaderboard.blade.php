@props(['members', 'currentResult'])

@php
    $rankedMembers = $members
        ->map(fn($m) => ['member' => $m, 'points' => $currentResult[$m->id]])
        ->sortByDesc('points')
        ->values();
@endphp

<div class="mt-8">
    <flux:heading class="mb-4">Wizard Leaderboard</flux:heading>
    <div class="overflow-x-auto border border-zinc-200 dark:border-zinc-700 rounded-lg">
        <table class="w-full text-sm text-left">
            <thead class="bg-zinc-50 dark:bg-zinc-800 border-b border-zinc-200 dark:border-zinc-700">
                <tr>
                    <th class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100 w-12">#</th>
                    <th class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100">Player</th>
                    <th class="px-4 py-3 font-semibold text-zinc-900 dark:text-zinc-100 text-right">Points</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                @foreach($rankedMembers as $index => $entry)
                    <tr class="{{ $index === 0 ? 'bg-amber-50 dark:bg-amber-900/20' : 'hover:bg-zinc-50 dark:hover:bg-zinc-800/50' }}">
                        <td class="px-4 py-3 font-bold text-zinc-500 dark:text-zinc-400">
                            @if($index === 0) 🥇
                            @elseif($index === 1) 🥈
                            @elseif($index === 2) 🥉
                            @else {{ $index + 1 }}
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium text-zinc-900 dark:text-zinc-100">
                            {{ $entry['member']->name }}
                        </td>
                        <td class="px-4 py-3 text-right font-bold {{ $index === 0 ? 'text-amber-600 dark:text-amber-400' : 'text-zinc-900 dark:text-zinc-100' }}">
                            {{ $entry['points'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
