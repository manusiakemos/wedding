<main class="w-full flex-grow px-3" xmlns:wire="http://www.w3.org/1999/xhtml">
    <section class="content overflow-x-scroll rounded-lg overflow-y-scroll h-full mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"></x-admin.breadcrumb>
        </div>
        <div class="mb-3">
            <div class="mb-5 lg:flex lg:items-start lg:justify-between">
                <h4 class="heading">User Management</h4>

                <div>
                    <x-admin.button type="button" class="mb-3"
                                    wire:click="create">Create
                    </x-admin.button>
                    <x-admin.button type="button" class="btn rounded-pill bg-red-500 text-white mb-3 mx-1"
                                    wire:click="$emit('refreshDt', true)">Refresh
                    </x-admin.button>
                </div>
            </div>

            @livewire("user.user-table")
        </div>
    </section>

    @include('livewire.user.form')
</main>

@push("scripts")
    @include("includes.toast-scripts")

    @include("includes.dt-scripts",['table' => 'user.user-table'])
@endpush

