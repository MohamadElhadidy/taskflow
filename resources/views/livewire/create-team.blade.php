<div>
    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 space-y-6">
        <flux:input wire:model="name" :label="__('Team name')" type="text" required autofocus autocomplete="name"
            :placeholder="__('Team name')" />
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button type="button" wire:click="save"
            class="inline-flex w-full justify-center cursor-pointer rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Create</button>
        <button type="button" @click="open = false"
            class="mt-3 inline-flex w-full justify-center cursor-pointer  rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
    </div>
</div>