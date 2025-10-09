<div>
    <flux:navlist variant="outline">
        <flux:navlist.group class="grid">

            <x-slot name="heading">
                <div class="flex items-center justify-between">
                    <span>{{ __('My Teams') }}</span>
                    <button type="button" wire:click="showCreateModel" class=" cursor-pointer ">
                        <x-fas-plus-circle class="text-green-500 hover:text-green-700 w-4 h-4 transition-all" />
                    </button>
                </div>
            </x-slot>


            @foreach ($myTeams as $team)
                <flux:navlist.item :href="route('team', $team)" wire:key="team-{{ $team->identifier }}"
                    :current="request()->routeIs('team') && request()->route('team')->identifier === $team->identifier" wire:navigate>
                    {{ $team->name }}
                </flux:navlist.item>
            @endforeach



        </flux:navlist.group>

        <flux:menu.separator />
        <flux:spacer />

        <flux:navlist.group :heading="__('Other Teams')" class="grid">

            @foreach ($otherTeams as $team)
                <flux:navlist.item :href="route('team', $team)" wire:key="team-{{ $team->identifier }}"
                    :current="request()->routeIs('team') && request()->route('team')->identifier === $team->identifier" wire:navigate>
                    {{ $team->name }}
                </flux:navlist.item>
            @endforeach



        </flux:navlist.group>



    </flux:navlist>

    <div x-data="{open : @entangle('createModel') }" x-show="open" x-transition.duration.500ms x-transition.opacity x-cloak 
        class="fixed inset-0 m-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent p-0 backdrop:bg-transparent z-60">
        <div
            class="fixed inset-0 bg-gray-500/75 transition-opacity data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in">
        </div>

        <div class="flex min-h-full items-end justify-center p-4 text-center focus:outline-0 sm:items-center sm:p-0"
            @click.away="open = false">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-[closed]:translate-y-4 data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in sm:my-8 sm:w-full sm:max-w-lg data-[closed]:sm:translate-y-0 data-[closed]:sm:scale-95">
                <div class="px-4  pt-5">
                    <h2 class="font-semibold">Create New Team</h2>
                </div>
                <livewire:create-team />

            </div>
        </div>
    </div>
</div>