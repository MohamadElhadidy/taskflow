<div x-data="{open : @entangle('createModel') }" x-show="open" x-transition.duration.500ms x-transition.opacity x-cloak
    class="fixed inset-0 m-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent p-0 backdrop:bg-transparent z-60">
    <div
        class="fixed inset-0 bg-gray-500/75 transition-opacity data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in">
    </div>

    <div class="flex min-h-full items-end justify-center p-4 text-center focus:outline-0 sm:items-center sm:p-0"
        @click.away="open = false">
        <div
            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-[closed]:translate-y-4 data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in sm:my-8 sm:w-full sm:max-w-lg data-[closed]:sm:translate-y-0 data-[closed]:sm:scale-95">
            <div class="px-4 pt-5 flex justify-between items-center">
                <h2 class="font-semibold">{{ $team ? 'Update Team' : 'Create New Team' }}</h2>
                @if ($team)
                    <button type="button" wire:click="deleteTeam($team)"
                        wire:confirm="Are sure you want to delete this team?"
                        class="bg-red-500 text-white rounded-lg p-1.5 cursor-pointer text-sm font-semibold">Delete</button>
                @endif
            </div>

            <div>
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 space-y-6">
                    <flux:input wire:model="name" :label="__('Team name')" type="text" required autofocus
                        autocomplete="name" :placeholder="__('Team name')" />
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" wire:click="save"
                        class="inline-flex w-full justify-center cursor-pointer rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Create</button>
                    <button type="button" @click="open = false"
                        class="mt-3 inline-flex w-full justify-center cursor-pointer  rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>


        </div>
    </div>
</div>
</div>