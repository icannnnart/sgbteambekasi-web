<link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
<div class="content-wrapper">
   <div class="row">
      <div class="col-12 grid-margin stretch-card">
         <div class="card">
             
            <div class="card-body">
               <h4 class="card-title">Indonesia vs Australia<code>19:00 WIB</code></h4>
               <video id="player" controls></video>
            </div>
         </div>
      </div>
   </div>
</div>
 <!-- Plyr JS -->
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
    <!-- HLS.js -->
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

    <script>
        const video = document.getElementById('player');
        //const source = 'https://lebo.huminbird.cn/live/ballbar_21360.m3u8';
        const source = 'https://t.fdcdn.xyz/v11/?link=https%3A%2F%2Fobevcimanyd179569584.thapcam.link%2F31l6vHb5qCqNjsInoJntFg%2FFv2lucGIbhPi2caWYvF5Lg%2F1725987752231%2Flive%2FphoFHD%2Fplaylist.m3u8&id=4JjF14n&n=FullHD&t=br&p=no&theme_id=tc&df=https%3A%2F%2Fvb90xltcvg-secure.nsnd.live%2FO2VbsaIEHxH3tOzgy6SVAA%2F2270a8f479503a8ecc2c2860b5f42ece%2F1725987752%2Flive%2F_definst_%2Fstream_1_1bda7%40phoSD%2Fplaylist.m3u8';

        // Cek dukungan HLS di browser
        if (Hls.isSupported()) {
            const hls = new Hls();
            hls.loadSource(source);
            hls.attachMedia(video);
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            // Dukungan native untuk HLS (Safari)
            video.src = source;
        }

        // Inisialisasi Plyr
        const player = new Plyr(video);
    </script>