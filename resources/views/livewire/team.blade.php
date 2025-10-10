<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="space-y-6">
        <h1 class="font-semibold">{{ $team->name }}</h1>
        <div class="flex items-center space-x-6">
            <livewire:members :team="$team" />
            @if ($team->isManager())
                <livewire:invite-member :team="$team" />
            @endif
        </div>
        <livewire:create-board :team="$team"  />
    </div>
    <div class="grid auto-rows-min gap-4 md:grid-cols-4">
        @foreach ($boards as $board)
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700" wire:key="{{ $board->id }}">
                <div class="text-center" style="background-color: {{ $board->color }};">
                    <h1 class="text-white font-semibold">{{$board->name}}</h1>
                </div>
                <div class="mx-6 my-4 ">
                    <ul class="space-y-2">
                       <li class="p-2 border-1 border-slate-400/30 rounded-2xl mx-4">Do the Laundry</li>
                    </ul>
                </div>
            </div>

        @endforeach

    </div>
</div>