
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

{{--@push("style")
    <style>
        .video-container{
            width: 100vw;
            height: 100vh;
        }

        iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100vw;
            height: 100vh;
            transform: translate(-50%, -50%);
        }

        #text{
            position: absolute;
            color: #FFFFFF;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        @media (min-aspect-ratio: 16/9) {
            .video-container iframe {
                height: 56.25vw;
            }
        }
        @media (max-aspect-ratio: 16/9) {
            .video-container iframe {
                width: 177.78vh;
            }
        }
    </style>
@endpush--}}
