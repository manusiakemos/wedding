<section id="direction" class="bg-cream py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-handwrite text-secondary display-4 text-center fw-bolder">
                    Lokasi
                </h4>
            </div>
            <div class="col-12">
                <div class="text-center mb-3">
                    <small class="text-dark text-center text-black-50 fw-bold">
                       {{$meta['reception']['address']}}
                    </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
               <div style="border-radius: 10px; border: 3px solid #d8558d; overflow: hidden">
                   {!! $invitation['invitation_google_map'] !!}
               </div>
            </div>
        </div>
    </div>
</section>
