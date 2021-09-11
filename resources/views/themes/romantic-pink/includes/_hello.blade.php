<section id="hello" class="py-5 bg-cream overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col">
                <h4 class="text-handwrite text-success display-4 text-center fw-bolder">
                    Assalamualaikum
                </h4>

                <div class="text-center">
                    <small class="text-dark text-center text-capitalize text-black-50">
                        Kami mengundang kamu untuk merayakan pesta perkawinan kami
                    </small>
                </div>

                <div class="text-center fw-bolder fs-5">
                    <span>
                         {{$meta['reception']['city']}}, {{ tanggal($meta['reception']['date'], false, true, false) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 mx-lg-5 mt-4 px-lg-5 mx-sm-1 p-sm-1">
        <div class="d-flex align-items-center justify-content-center position-relative">

            <div class="container">
                <div class="row">
                    {{--left--}}
                    <div class="col">
                        <div class="left-side d-flex justify-content-end align-items-center">
                            <div class="text-end mx-3 d-none d-lg-block">
                                <h4 class="text-handwrite text-capitalize text-primary fw-bolder">
                                    {{$meta['brides']['male']['nickname']}}
                                </h4>
                                <small class="text-black-50 text-capitalize">
                                    Putra dari {{$meta['brides']['male']['parent_name']}}
                                </small>
                            </div>
                            <div data-aos="slide-right">
                                <img loading="lazy"
                                     src="{{ $male_image }}"
                                     alt="male"
                                     class="rounded-circle hello-image darken-img">
                            </div>
                        </div>
                    </div>

                    {{--right--}}
                    <div class="col">
                        <div class="left-side d-flex justify-content-start align-items-center">
                            <div data-aos="slide-left">
                                <img loading="lazy"
                                     src="{{ $female_image }}"
                                     class="rounded-circle hello-image darken-img">
                            </div>
                            <div class="text-start mx-3 d-none d-lg-block">
                                <h4 class="text-handwrite text-capitalize text-primary fw-bolder">
                                    {{$meta['brides']['female']['nickname']}}
                                </h4>
                                <small class="text-black-50 text-capitalize">
                                    Putri dari {{$meta['brides']['female']['parent_name']}}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                {{--love--}}
                <div class="love-container  bg-cream">
                    <div class="rounded-circle love d-flex justify-content-center align-items-center">
                        <img src="{{ asset('/themes/'.$invitation->theme->key.'/images/heart.svg') }}" alt="heart"
                             class="heart-img">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
