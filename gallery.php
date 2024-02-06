<!DOCTYPE HTML>
<html lang="en">

<?php include("head.php"); ?>

<style>
    .gallery-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .gallery-item {
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .gallery-item:hover {
        transform: scale(1.05);
    }

    .gallery-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }

    .gallery-card img,
    .gallery-card iframe {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 8px;
    }

    .gallery-card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .gallery-card:hover .gallery-card-overlay {
        opacity: 1;
    }

    .gallery-card-overlay h3 {
        margin: 0;
        color: yellow;
    }

    .gallery-card-overlay p {
        margin: 5px 0 0;
        font-size: 14px;
    }
</style>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        <?php include('navbar.php'); ?>
        <div class="container-wrap">

            <div id="fh5co-intro">
                <div class="row animate-box">
                    <div class="col-md-12 col-md-offset-0 text-center">
                        <h2>"CulturaSwap: Uniting Cultures, Embracing Diversity."</h2>
                        <span>Unveiling Boundless Cultural Experiences Every Day!</span>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Gallery Section -->
            <div class="gallery-container">
                <!-- Gallery Item 1 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/holi.jpeg" alt="Gallery Image 1">
                        <div class="gallery-card-overlay">
                            <h3>Holi</h3>
                            <p>Holi, an annual March festival, celebrates the triumph of good over evil, symbolized by the legend of a prince emerging unharmed from a fire that consumed the evil Holika. The festivities originated from this victory, fostering a culture of joy and happiness through colorful celebrations and playing with colors.</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 2 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/Bibaha Panchami.jpeg" alt="Gallery Image 2">
                        <div class="gallery-card-overlay">
                            <h3>Bibaha Panchami</h3>
                            <p>Bibaha Panchami, commemorating Lord Ram and Sita's divine marriage in Janakpurdham, holds special significance in Vedic Sanatan Hindu traditions. Celebrated notably in Nepal, couples often choose this sacred day to wed at the revered Ram Janaki Mandir in Janakpur, Nepal.</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 3 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/yomari Punhi.jpeg" alt="Gallery Image 3">
                        <div class="gallery-card-overlay">
                            <h3>Yomari Punhi</h3>
                            <p>Yomari Punhi, a harvest festival observed by the Newars in Nepal, involves worshipping the goddess Annapurna and the community coming together to make yomari, a sweet dish crafted from molasses, Khuwa, concentrated sugarcane juice, and rice flour.</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 4 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/posan poya.jpeg" alt="Gallery Image 4">
                        <div class="gallery-card-overlay">
                            <h3>Poson Poya</h3>
                            <p>Poson Poya in June commemorates the introduction of Buddhism to Sri Lanka, with major celebrations held at temples across the island. The grandest festivities take place in Mihintale, where the conversion of King Devanampiya by Buddhist emissary Mahinda in 247 BC solidified Buddhism as the national faith of the Sinhalese people.</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 5 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/Sinhala and Tamil New Year.jpeg" alt="Gallery Image 5">
                        <div class="gallery-card-overlay">
                            <h3>Sinhala and Tamil New Year</h3>
                            <p>The Sinhala and Tamil New Year, celebrated on the 13th or 14th of April in Sri Lanka, unites Buddhists and Hindus in joyous festivities, marking the end of the harvest season and spring. Across the island, people prepare by cleaning, decorating homes, and creating traditional dishes, creating a vibrant and festive atmosphere.</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 6 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/Haritalika Teej.jpeg" alt="Gallery Image 6">
                        <div class="gallery-card-overlay">
                            <h3>Haritalika Teej</h3>
                            <p>Haritalika Teej, a Hindu festival celebrated for the prosperity of husbands, unfolds for three days in Nepal. Married women pray for their husbands' joyous lives, while unmarried women seek a spouse of their choice, with the festival rooted in significant Shiva mythology from Satya Yug.</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 7 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/indra jatra.jpeg" alt="Gallery Image 7">
                        <div class="gallery-card-overlay">
                            <h3>Indra jatra</h3>
                            <p>Indra Jatra, a lively festival, is celebrated in Nepal, particularly in the Kathmandu Valley. This annual event involves vibrant processions, traditional dances, and the raising of the sacred Indra's pole, marking both cultural and religious significance in Nepalese traditions.</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Item 8 -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <img src="images/losar.jpeg" alt="Gallery Image 8">
                        <div class="gallery-card-overlay">
                            <h3>Losar</h3>
                            <p>Losar, celebrated as the Tibetan New Year,  mountainous regions of Nepal, with active participation from Tibetans, Gurungs, Tamangs, and Sherpas. The festivities include feasts, dances, and communal joy, making it a significant celebration not only for a particular ethnicity but also attracting enthusiastic participation from diverse communities in Nepal.</p>
                        </div>
                    </div>
                </div>

                <!-- YouTube Video Links -->
                <div class="gallery-item">
                    <div class="gallery-card">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/EanteBboGt0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-card">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/iA9YcVK7wTU" title="Indian, Culture and Tradition #india" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-card">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/TzMWX2TIE0M" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-card">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/7PH5ffmswg0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="gallery-item">
                    <div class="gallery-card">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/3cR2YYFCB9U" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <!-- End YouTube Video Links -->

                <!-- Include the remaining gallery items as needed -->

            </div>
            <!-- End Gallery Section -->

            <!-- Include lightGallery scripts -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-oHnbNz9OuI6XZ+AVwCkLrVriyRUd4RwDTXeR/NSZ2L6JQmgzGNTgHH4M/unzFeNU"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
            <script src="https://cdn.rawgit.com/sachinchoolur/lightGallery/master/dist/js/lightgallery-all.min.js"></script>
            <!-- Initialize lightGallery -->
            <script>
                $(document).ready(function () {
                    $('.gallery-container').lightGallery();
                });
            </script>

            <!-- Gallery Styles -->

            <!-- Other Sections remain unchanged -->

        </div>

        <?php include("footer.php"); ?>

    </body>
</html>
