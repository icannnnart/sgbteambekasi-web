<?php
function hisde_Text($text, $start, $length) {
    return substr_replace($text, '************', $start, $length);
}
?>
<script src="<?=base_url('assets/dashboard/')?>vendors/lightgallery/js/lightgallery-all.min.js"></script>
<div class="content-wrapper">
	<div class="row grid-margin">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card position-relative">
            <div class="card-body">
               <h6 class="card-title">LIST REGISTRASI USER PAMDI</h6>
               <div class="row">
                  <div class="col-12">
                     <div class="table-responsive">
                        <table id="order-listing" class="table">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Foto</th>
                                 <th>Nama Lengkap</th>
                                 <th>Nama Ibu</th>
                                 <th>Jenis Kelamin</th>
                                 <th>Agama</th>
                                 <th>Profesi</th>
                                 <th>NIK</th>
                                 <th>No Whatsapp</th>
                                 <th>Media Sosial</th>
                                 <th>Email</th>
                                 <th>Alamat</th>
                                 <th>Provinsi</th>
                                 <th>Kabupaten/Kota</th>
                                 <th>Foto KTP</th>
                                 <th>Status</th>
                                 <th>Note</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           	<?php $a=0; foreach($data_registrasi as $datasregis){$a++;?>
                              <tr>
                                 <td><?=$a?></td>
                                 <?php if($datasregis['foto_profile'] != NULL){ ?>
                                    <td>
                                       <div id="pp-without-thumb<?=$a?>" class="lightGallery">
                                          <img src="<?=htmlspecialchars($datasregis['foto_profile'])?>" alt="FOTO"></a>
                                       </div>
                                    </td>
                                 <?php }else{ ?>
                                    <td>
                                       <div id="pp-without-thumb<?=$a?>" class="lightGallery">
                                          <img src="https://ui-avatars.com/api/?name=<?=$datasregis['nama_lengkap']?>&amp;background=random" alt="FOTO"></a>
                                       </div>
                                    </td>
                                 <?php } ?>
                                 <td><?=$datasregis['nama_lengkap']?></td>
                                 <td><?=$datasregis['nama_ibukandung']?></td>
                                 <td><?php $jk = $this->M_db->Get_user_by_id('t_gender','id',$datasregis['jenis_kelamin']); print_r($jk->name)?></td>
                                 <td><?php $agama = $this->M_db->Get_user_by_id('t_agama','id',$datasregis['agama']); print_r($agama->name)?></td>
                                 <td><?php $kerja = $this->M_db->Get_user_by_id('t_profesi','id',$datasregis['profesi']); print_r($kerja->name)?></td>
                                 <td><?=hisde_Text($datasregis['nik'],4,8)?></td>
                                 <td><?=$datasregis['nowa']?></td>
                                 <td><?=$datasregis['sosmed']?></td>
                                 <td><?=$datasregis['email']?></td>
                                 <td><?=$datasregis['alamat']?></td>
                                 <td><?php $prov = $this->M_db->Get_user_by_id('t_provinsi','id',$datasregis['provinsi']); print_r($prov->name)?></td>
                                 <td><?php $kabkot = $this->M_db->Get_user_by_id('t_kabkot','id',$datasregis['kabkot']); print_r($kabkot->name)?></td>
                                 <td>
                                    <div id="lightgallery-without-thumb<?=$a?>" class="lightGallery">
                                       <a href="<?=htmlspecialchars($datasregis['file_img'])?>" class="image-tile">
                                       <img src="https://i.pinimg.com/originals/ec/c0/8b/ecc08b6a0f8294402b8186a25b47cbe4.jpg" alt="FOTO"></a>
                                    </div>
                                 </td>
                                 <script type="text/javascript">
                                    if ($("#lightgallery-without-thumb"+'<?=$a?>').length) {
                                           $("#lightgallery-without-thumb"+'<?=$a?>').lightGallery({
                                             thumbnail: true,
                                             animateThumb: false,
                                             showThumbByDefault: false
                                           });
                                         }
                                 </script>
                                 <td>
                                 	<?php if ($datasregis['status'] == 1){?>
                                    	<label class="badge badge-info">APPROVE PUSAT</label>
	                                <?php }elseif ($datasregis['status'] == 2){?>
	                                	  <label class="badge badge-secondary ">APPROVE DPD</label>
                                    <?php }elseif ($datasregis['status'] == 3){?>
                                       <label class="badge badge-warning ">APPROVE DPC</label>
	                                <?php }else{?>
	                                	  <label class="badge badge-danger ">Reject DPC</label>
	                                <?php }?>
                                 </td>
                                 <td><?=$datasregis['note']?></td>
                                 <td>
                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"><i class="ti-eye"></i></button>
                                 </td>
                              </tr>
                          <?php }?>
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
<script>
   (function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    $('#order-listing').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);
</script>