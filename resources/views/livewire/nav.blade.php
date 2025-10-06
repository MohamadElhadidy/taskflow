<flux:navlist variant="outline">
    <flux:navlist.group :heading="__('My Teams')" class="grid">

        <x-slot name="heading">
            <div class="flex items-center justify-between">
                <span>{{ __('My Teams') }}</span>
                <button type="button" wire:click="toggleCreateModel">
                    <x-fas-plus-circle class="text-green-500 hover:text-green-700 w-4 h-4 transition-all" />
                </button>
            </div>
        </x-slot>


        @foreach ($myTeams as $team)
            <flux:navlist.item :href="route('team', $team)"
                :current="request()->routeIs('team') && request()->route('team') === $team->identifier" wire:navigate>
                {{ $team->name }}</flux:navlist.item>
        @endforeach



    </flux:navlist.group>

    <flux:menu.separator />
    <flux:spacer />

    <flux:navlist.group :heading="__('Other Teams')" class="grid">


        @foreach ($otherTeams as $team)
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                wire:navigate>{{ $team->name }}</flux:navlist.item>

        @endforeach



    </flux:navlist.group>


    @if ($createModel)
        <livewire:create-team />
    @endif
</flux:navlist>