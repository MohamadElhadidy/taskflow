<div x-data="{open : false }">
    <button type="button" @click="open = true" class="text-gray-500 flex items-center cursor-pointer"><x-typ-plus
            class="w-4 h-4" /> <span>Invite</span></button>

    <div x-show="open" x-transition.duration.500ms x-transition.opacity x-cloak
        class="fixed inset-0 m-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent p-0 backdrop:bg-transparent z-60">
        <div
            class="fixed inset-0 bg-gray-500/75 transition-opacity data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in">
        </div>

        <div class="flex min-h-full items-end justify-center p-4 text-center focus:outline-0 sm:items-center sm:p-0"
            @click.away="open = false">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-[closed]:translate-y-4 data-[closed]:opacity-0 data-[enter]:duration-300 data-[leave]:duration-200 data-[enter]:ease-out data-[leave]:ease-in sm:my-8 sm:w-full sm:max-w-lg data-[closed]:sm:translate-y-0 data-[closed]:sm:scale-95">
                <div class="px-4  pt-5">
                    <h2 class="font-semibold">Invite Team Member</h2>
                </div>
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4 space-y-6">
                    <flux:input wire:model="email" :label="__('Email')" type="email" required autofocus
                        autocomplete="email" :placeholder="__('Email')" />
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" wire:click="sendEmail"
                        class="inline-flex w-full justify-center cursor-pointer rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Send
                        Invite</button>
                    <button type="button" @click="open = false"
                        class="mt-3 inline-flex w-full justify-center cursor-pointer  rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>


                </div>
                @if ($team?->activeInvitations->count() > 0)
                    <table class=" order-2 border-black mx-2 my-4 ">
                        <thead>
                            <tr>
                                <th class="p-2 border-2 border-black">Email</th>
                                <th class="p-2 border-2 border-black">Expire at</th>
                                <th class="p-2 border-2 border-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->activeInvitations as $invitation)
                                <tr>
                                    <td class="p-2 border-2 border-black">{{ $invitation->email}}</td>
                                    <td class="p-2 border-2 border-black">{{ $invitation->expires_at}}</td>
                                    <td class="p-2 border-2 border-black">
                                        <button type="button"
                                            class="inline-flex w-full justify-center cursor-pointer rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition-all sm:ml-3 sm:w-auto"
                                            wire:click="revoke('{{$invitation->id}}')"     wire:confirm="Are you sure you want to revoke this invitation?">Revoke</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>

    </div>


</div>