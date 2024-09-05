<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin">
         <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
               <h3 class="font-weight-bold">Selamat Datang, <?=$user->name?></h3>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
         <div class="card tale-bg">
            <iframe class="card tale-bg" src="https://www.meteoblue.com/en/weather/widget/three?geoloc=detect&nocurrent=0&noforecast=0&days=1&tempunit=CELSIUS&windunit=KILOMETER_PER_HOUR&layout=image"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 100%; height: 450px"></iframe>
            <div></div>
         </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
         <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
               <div class="card card-tale">
                  <div class="card-body">
                     <p class="mb-4">Total Uang KAS</p>
                     <p class="fs-30 mb-2"><span style="font-size: 12px;">IDR </span><?=number_format($sumcashflow)?></p>
                  </div>
               </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
               <div class="card card-dark-blue">
                  <div class="card-body">
                     <p class="mb-4">Pemasukan Uang KAS</p>
                     <p class="fs-30 mb-2"><span style="font-size: 12px;">IDR </span><?=number_format($sumkas)?></p>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
               <div class="card card-light-blue">
                  <div class="card-body">
                     <p class="mb-4">Pengeluaran Uang KAS</p>
                     <p class="fs-30 mb-2"><span style="font-size: 12px;">IDR </span><?=number_format($sumkeluar)?></p>
                  </div>
               </div>
            </div>
            <div class="col-md-6 stretch-card transparent">
               <div class="card card-light-danger">
                  <div class="card-body">
                     <p class="mb-4">Total User</p>
                     <p class="fs-30 mb-2"><?=$counuser?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card" style="max-height: 50%;">
         <div class="card">
            <div class="card-body">
               <h6 class="card-title">Report Uang KAS Tahun <?=date('Y')?></h6>
               <p class="font-weight-500">Total pada tahun <?=date('Y')?></p>
               <canvas id="areaChart"></canvas>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card position-relative">
            <div class="card-body">
               <h6 class="card-title">Last Cash Flow SGBTEAM Bekasi <?=date('Y')?></h6>
               <div class="row">
                  <div class="col-12">
                     <div class="table-responsive">
                        <table id="order-listing" class="table">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Tanggal</th>
                                 <th>Nama</th>
                                 <th>Nominal</th>
                                 <th>Keterangan</th>
                                 <th>Bukti</th>
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $aa=0; foreach ($datacashflow as $datascash){ $aa++;?>
                                 <tr>
                                    <td><?=$aa?></td>
                                    <td><?=$datascash['created_at']?></td>
                                    <td><?=$datascash['id_user']?></td>
                                    <td><?=$datascash['nominal']?></td>
                                    <td>$1500</td>
                                    <td>$3200</td>
                                    <?php if ($datascash['status'] == 1){?>
                                    <td>
                                       <label class="badge badge-info">Pemasukan</label>
                                    </td>
                                 <?php }elseif ($datascash['status'] == 2) { ?>
                                    <td>
                                       <label class="badge badge-danger">Pengeluaran</label>
                                    </td>
                                 <?php }else{?>
                                    <td>
                                       <label class="badge badge-warning">Pending</label>
                                    </td>
                                 </tr>
                              <?php }}?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var dataarea = ["Januari", "Febuari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
   var datatarget =<?=json_encode($grafik)?>
   //console.log(datatarget)
</script>
<script src="<?=base_url('assets/dashboard')?>/js/dashboard.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/chart.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/data-table.js"></script>