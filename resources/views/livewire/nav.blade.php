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
                <div class="flex justify-between items-center">
                    <flux:navlist.item :href="route('team', $team)" wire:navigate
                        :current="request()->routeIs('team') && request()->route('team')->identifier === $team->identifier">
                        {{ $team->name }}
                    </flux:navlist.item>

                    <button wire:click="editTeam('{{ $team->id }}')" type="button" class="cursor-pointer">
                        <x-far-edit class="text-blue-500 hover:text-blue-700 w-4 h-4 transition-all" />
                    </button>
                </div>



            @endforeach



        </flux:navlist.group>

        <flux:menu.separator />
        <flux:spacer />

        <flux:navlist.group :heading="__('Other Teams')" class="grid">

            @foreach ($otherTeams as $team)
                <flux:navlist.item :href="route('team', $team)" wire:key="team-{{ $team->identifier }}"
                    :current="request()->routeIs('team') && request()->route('team')->identifier === $team->identifier"
                    wire:navigate>
                    {{ $team->name }}
                </flux:navlist.item>
            @endforeach



        </flux:navlist.group>



    </flux:navlist>

    <livewire:create-team :team="$team" />
</div>