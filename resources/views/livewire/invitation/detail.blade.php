<main class="w-full flex-grow px-3" xmlns:wire="http://www.w3.org/1999/xhtml">
    <section class="content overflow-x-scroll rounded-lg overflow-y-scroll h-full mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"></x-admin.breadcrumb>
        </div>
        <div class="mb-3">
            <div class="mb-5">
                <h4 class="heading">{{$title}} Invitation</h4>

                <div class="py-3">
                    @foreach ($errors->all() as $message)
                        <span class="text-red-500 text-center">{{$message}}</span>
                    @endforeach
                </div>
                {{--content--}}
                <x-admin.tabs class="tabs" :headers="$tabHeaders">
                    <x-slot name="tab_1">
                        <div class="block">
                            <div>
                                @include("livewire.invitation.wizards.tab1")
                            </div>
                            <x-admin.button wire:click="goToStep(2)">Next</x-admin.button>
                        </div>
                    </x-slot>
                    <x-slot name="tab_2">
                        <div>
                            @include("livewire.invitation.wizards.tab2")
                            <x-admin.button wire:click="goToStep(3)">Next</x-admin.button>
                            <x-admin.button wire:click="goToStep(1)">Previous</x-admin.button>
                        </div>
                    </x-slot>
                    <x-slot name="tab_3">
                        <div>
                            @include("livewire.invitation.wizards.tab3")
                            <x-admin.button wire:click="goToStep(4)">Next</x-admin.button>
                            <x-admin.button wire:click="goToStep(2)">Previous</x-admin.button>
                        </div>
                    </x-slot>
                    <x-slot name="tab_4">
                        <div>
                            @include("livewire.invitation.wizards.tab4")
                            <x-admin.button wire:click="goToStep(5)">Next</x-admin.button>
                            <x-admin.button wire:click="goToStep(3)">Previous</x-admin.button>
                        </div>
                    </x-slot>
                    <x-slot name="tab_5">
                        <div>
                            @include("livewire.invitation.wizards.tab5")
                            <x-admin.button wire:click="goToStep(6)">Next</x-admin.button>
                            <x-admin.button wire:click="goToStep(4)">Previous</x-admin.button>
                        </div>
                    </x-slot>
                    <x-slot name="tab_6">
                        <div>
                            @include("livewire.invitation.wizards.tab6")
                            <x-admin.button wire:click="goToStep(7)">Save</x-admin.button>
                            <x-admin.button wire:click="goToStep(5)">Previous</x-admin.button>
                        </div>
                    </x-slot>
                </x-admin.tabs>
            </div>
        </div>
    </section>
</main>

@once
    @push("scripts")
        <script>
            window.addEventListener('nextStep', event => {
                let step = event.detail.currentStep;
                $(`#tabBtntab_${step}`).click();
            })
        </script>

        @include("includes.toast-scripts")

    @endpush
@endonce
