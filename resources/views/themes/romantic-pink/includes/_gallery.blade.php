<div id="gallery" class="bg-dark text-white overflow-hidden py-4">
    <div class="container" id="lightgallery">
        <div class="row">
            <div class="col-12">
                <h4 class="text-handwrite text-secondary display-4 text-center fw-bolder py-4">
                    Galeri
                </h4>
            </div>
        </div>
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach($invitation->galleries as $item)
                <div class="col-lg-4 col-md-3 col-sm-12 mb-3">
                    <div class="relative d-flex justify-content-center align-items-center flex-column" data-aos="slide-up">
                        <span class="text-center">{{$item->title}}</span>
                        <a href="{{asset($item->filename)}}">
                            <img src="{{asset($item->filename)}}"
                                 title="{{$item->desc}}"
                                 alt="{{asset($item->filename)}}"
                                 class="img-fluid img-thumbnail">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@push("script")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.8.1/simple-lightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    <script>
        let gallery = new SimpleLightbox('#lightgallery a');
    </script>


@endpush
