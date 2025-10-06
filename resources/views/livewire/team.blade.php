<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
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
    <!-- <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div> -->
</div>