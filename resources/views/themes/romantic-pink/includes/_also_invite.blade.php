<div class="bg-dark position-relative py-5">
    <section class="turut-mengundang">
        <div class="container mw-800">
            <div class="row">
                <div class="col">
                    <h4 class="text-handwrite text-secondary display-4 mb-4 mt-1 pt-1 mt-lg-4 pt-lg-4 text-center fw-bolder">
                        Turut Mengundang
                    </h4>
                </div>
            </div>
        </div>
        <div class="container mw-800 py-4">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col mb-3 move-up">
                    <div data-aos="fade-up" class="card border-0 bg-secondary text-white rounded h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-center flex-column">
                                <h4 class="text-white text-center fs-6 fw-bold text-uppercase ls-sm">
                                    Mempelai Pria
                                </h4>
                                <div class="widget-title"></div>
                                <div class="pt-3">
                                    <ul class="list-group list-group-flush">
                                        @foreach($meta['brides']['male']['also_invite'] as $invite)
                                            <li class="list-group-item bg-transparent text-white text-capitalize">
                                                {{$invite}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3 move-up">
                    <div data-aos="fade-up" class="card border-0 bg-secondary text-white rounded h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-center flex-column">
                                <h4 class="text-white text-center fs-6 fw-bold text-uppercase ls-sm">
                                    Mempelai Wanita
                                </h4>
                                <div class="widget-title"></div>
                                <div class="pt-3">
                                    <ul class="list-group list-group-flush">
                                        @foreach($meta['brides']['female']['also_invite'] as $invite)
                                            <li class="list-group-item bg-transparent text-white text-capitalize">
                                                {{$invite}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
