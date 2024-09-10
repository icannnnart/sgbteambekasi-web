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
        const source = 'https://bd12312uyglrcnngfjjuk155bmiztkx4j45uilkafnta057mj5qz1.flocafeny.com/px.php?url=https://tta00032-cf.xj3wscaredlook.shop/auth%3D2c3269c9ae69af7fb07b14506837294c5dc65afa2ece140757830a436795dc1991648ad7fdc20b13ae491f7786be4f7453fbe247112ddb749d18c4f4fbaffd5177659785e03692d9403392e548168e79912a23a04b750923f5446626365b81a7ace790926703a860ed51965ceaddc3886c74bf3896878b86ee6a5897c953f513a178521a419943549c6985a50240939e522c3a7051ff50fa90e9a0061ddbd575%26cid%3DWtCWKV8OoquM9UoEGbq8M240910%26_v%3D2%26_r%3D4U4mx3%26_vis%3D00c571dbbc197fcc796e4996c3e9210362f3c5a99baaef5f73a3efce34ded016%26_vvs%3D09fa0a610b569eb6d858aeba3de93af38f844342b9e6b3555ff7679e754d0911/app/c274634.m3u8';

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