

<div class="bg-dark position-relative" id="wedding-event">
    <img src="{{ asset('/themes/'.$invitation->theme->key.'/images/wavetop.svg') }}" alt="wave" width="100%">
    <section id="wedding-event">
        <div class="container-md py-5" style="max-width: 900px">
            <div class="row">
                <div class="col">
                    <h4 class="text-handwrite text-secondary display-4 mb-4 mt-1 pt-1 mt-xl-4 pt-xl-4 text-center fw-bolder">
                        Wedding Event
                    </h4>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col mb-3 move-up">
                    <div data-aos="fade-up" class="card border-0 bg-secondary text-white rounded h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-center flex-column">
                                <h4 class="text-white text-center fs-6 fw-bold text-uppercase ls-sm">
                                    Akad Nikah
                                </h4>
                                <div class="widget-title"></div>
                            </div>
                            <div class="d-lg-flex justify-content-center align-items-center py-3">
                                <div class="d-flex justify-content-center align-items-center flex-column mx-3 text-center">
                                    <div>
                                        <div class="fa fa-calendar"></div>
                                    </div>
                                    <div>
                                        <small>
                                            {{tanggal($meta['contract']['date'], false, true)}}
                                        </small>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center align-items-center flex-column mx-3 text-center">
                                    <div>
                                        <div class="fa fa-clock"></div>
                                    </div>
                                    <div>
                                        <small>
                                            {{ $meta['contract']['start'] ?? '08:00' }}
                                            -
                                            {{ !empty($meta['contract']['finish']) ? $meta['contract']['finish'] : 'Selesai' }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="text-center">
                                    <small>
                                        Bertempat di {{$meta['contract']['place']}}
                                    </small>
                                </div>
                                <div class="text-center">
                                    <small>
                                        {{$meta['contract']['address']}}
                                    </small>
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
                                    Resepsi
                                </h4>
                                <div class="widget-title"></div>
                            </div>
                            <div class="d-lg-flex justify-content-center align-items-center py-3">
                                <div class="d-flex justify-content-center align-items-center flex-column mx-3 text-center">
                                    <div>
                                        <div class="fa fa-calendar"></div>
                                    </div>
                                    <div>
                                        <small>
                                            {{tanggal($meta['reception']['date'], false, true)}}
                                        </small>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center align-items-center flex-column mx-3 text-center">
                                    <div>
                                        <div class="fa fa-clock"></div>
                                    </div>
                                    <div>
                                        <small>
                                            {{ $meta['reception']['start'] ?? '08:00' }}
                                            -
                                            {{ !empty($meta['reception']['finish']) ? $meta['reception']['finish'] : 'Selesai' }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="text-center">
                                    <small>
                                        Bertempat di {{$meta['reception']['place']}}
                                    </small>
                                </div>
                                <div class="text-center">
                                    <small>
                                        {{$meta['reception']['address']}}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
