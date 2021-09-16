<div id="gallery" class="bg-dark text-white overflow-hidden py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-handwrite text-secondary display-4 text-center fw-bolder py-4">
                    Galeri
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col overflow-hidden">
                <div id="lightgallery" class="owl-carousel">

                    @foreach($invitation->galleries as $item)
                        <div>
                            <a href="{{asset($item->filename)}}" class="gallery-item">
                                <img src="{{asset($item->thumbnail)}}"
                                     title="{{$item->desc}}"
                                     alt="{{asset($item->filename)}}"
                                     loading="lazy"
                                     class="img-fluid img-thumbnail">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@push("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.8.1/simple-lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function () {
            let gallery = new SimpleLightbox('#lightgallery a.gallery-item');

            $(".owl-carousel").owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                autoplay: false,
                autoplayHoverPause: true,
                navText:[
                    '<i class="fas fa-2x fa-caret-left"></i>',
                    '<i class="fas fa-2x fa-caret-right"></i>  '
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });

        });

    </script>

@endpush

@push("style")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.8.1/simple-lightbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        /* end fix */
        .owl-nav > div {
            margin-top: -10px;
            margin-left: 10px;
            margin-right: 10px;
            position: absolute;
            top: 50%;
            color: #cdcbcd;
            background: rgba(50,50,50,0.8);
            padding: 17px;
            border-radius: 100%;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .owl-nav i {
            font-size: 52px;
            z-index: 99;
        }

        .owl-nav .owl-prev {
            left: -0px;
        }

        .owl-nav .owl-next {
            right: -0px;
        }
    </style>
@endpush
