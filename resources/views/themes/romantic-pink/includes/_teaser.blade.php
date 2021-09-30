

@isset($invitation->teaser_youtube_url)
    <div id="teaser" class="bg-black bg-dark text-dark overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="relative py-5"  data-aos="slide-up">
                        <iframe width="100%" height="600" src="https://www.youtube.com/embed/{{$invitation->teaser_youtube_url}}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endisset
