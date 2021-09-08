<main class="w-full flex-grow px-3 pb-5" xmlns:wire="http://www.w3.org/1999/xhtml">
    <section class="content mx-auto py-5 px-5 min-h-screen">
        <div class="pb-3">
            <h4 class="heading">Dashboard</h4>
        </div>
        <div class="grid md:grid-cols-3 lg:grid-cols-4 sm:grid-cols-12 gap-4">
            @for($i=0; $i<4; $i++)
                <x-admin.widget-card title="Lorem ipsum" :number="2000000">
                    <span class="fi-rr-stats text-red-500 text-lg"></span>
                </x-admin.widget-card>
            @endfor
        </div>
    </section>
</main>
