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
        const source = 'http://ares.mnet.mk/hls/mnet-sport.m3u8';

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