<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="space-y-6">
        <h1 class="font-semibold">{{ $team->name }}</h1>
        <div class="flex items-center space-x-6">
            <div class="flex space-x-2">
                @foreach ($team->members->take(4) as $member)

                    <x-avatar sm class="{{ App\Helpers\ColorHelper::avatarColor($member->initials()) }}"
                        :label="$member->initials()" />

                @endforeach
            </div>
            @if ($team->isManager())
                <livewire:invite-member :team="$team" />

            @endif
        </div>
    </div>
    <div class="grid auto-rows-min gap-4 md:grid-cols-3">
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="bg-gray-400 text-center ">
                <h1 class="text-white font-semibold">To do</h1>
            </div>
            <div class="mx-6 my-4 ">
                <ul class="space-y-2">
                    <livewire:task />
                    <livewire:task />
                    <livewire:task />
                    <livewire:task />
                </ul>
            </div>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="bg-yellow-400 text-center ">
                <h1 class="text-white font-semibold">Doing</h1>
            </div>
            <div class="mx-6 my-4 ">
                <ul class="space-y-2">
                    <livewire:task />
                    <livewire:task />
                    <livewire:task />
                    <livewire:task />
                </ul>
            </div>
        </div>
        <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <div class="bg-green-400 text-center ">
                <h1 class="text-white font-semibold">Done</h1>
            </div>
            <div class="mx-6 my-4 ">
                <ul class="space-y-2">
                    <livewire:task />
                    <livewire:task />
                    <livewire:task />
                    <livewire:task />
                </ul>
            </div>
        </div>
    </div>
</div>