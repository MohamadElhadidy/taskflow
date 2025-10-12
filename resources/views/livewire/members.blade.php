<div x-data="{open : false }">
    <button type="button" @click="open = true" class="text-gray-500 flex items-center cursor-pointer">
        @foreach ($team->members->take(4) as $member)
            <x-avatar sm class="{{ App\Helpers\ColorHelper::avatarColor($member->initials()) }}"
                :label="$member->initials()" />
        @endforeach
        @if ($team->members->count() > 4)
            @php
                $label = "+" . ($team->members->count() - 4);
            @endphp
            <x-avatar sm class="!bg-gray-500" :label="$label" />
        @endif
    </button>

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
                    <h2 class="font-semibold">Members</h2>
                </div>
                @if ($members?->count() > 0)
                    <table class=" order-2 border-black mx-2 my-4 ">
                        <thead>
                            <tr>
                                <th class="p-2 border-2 border-black">Email</th>
                                <th class="p-2 border-2 border-black">Expire at</th>
                                <th class="p-2 border-2 border-black">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td class="p-2 border-2 border-black">{{ $member->email}}</td>
                                    <td class="p-2 border-2 border-black">{{ $member->expired_at}}</td>
                                    <td class="p-2 border-2 border-black">
                                        @if (!$team->isManager($member))
                                            <button type="button"
                                                class="inline-flex w-full justify-center cursor-pointer rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 transition-all sm:ml-3 sm:w-auto"
                                                wire:click="kick('{{$member->id}}')"
                                                wire:confirm="Are you sure you want to kick this member?">Kick</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="my-4 mx-2">
                        {{ $members->links() }}
                    </div>
                @endif
            </div>

        </div>

    </div>


</div>