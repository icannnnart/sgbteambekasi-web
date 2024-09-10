<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url('assets/dashboard')?>/vendors/sweetalert/sweetalert.min.js"></script>
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card position-relative">
            <div class="card-body">
               <h6 class="card-title">LIST EMAIL SGB BEKASI</h6>
               <div class="row">
                  <div class="col-12">
                     <div class="table-responsive">
                        <table id="order-listing" class="table">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Action</th>
                                 <th>Nama</th>
                                 <th>Email</th>
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $a=0; foreach($data_registrasi as $datasuser){$a++;?>
                              <tr>
                                 <td><?=$a?></td>
                                 <td><label class="badge badge-info">Acc</label><label class="badge badge-danger">Reject</label></td>
                                 <td><?php $getname = $this->M_db->Get_user_by_id('t_user','id',$datasuser['id_user']); echo $getname->name; ?></td>
                                 <td><?=$datasuser['email']?></td>
                                 <td>
                                    <?php if ($datasuser['is_active'] == 0){?>
                                    <label class="badge badge-info">Approved</label>
                                    <?php }else{?>
                                    <label class="badge badge-danger">Rejected</label>
                                    <?php }?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/data-table.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/select2.js"></script>
<script>
    $('#registermember').on('submit', function(e) {
        e.preventDefault(); // Mencegah form submit secara normal

        var formData = new FormData(this); // Mengambil data dari form

        $.ajax({
            url: '<?=site_url('app/add/member')?>',  // Ganti dengan URL backend yang sesuai
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               
               const objsx = JSON.parse(response);
               //console.log(objsx.status)
                if (objsx.status == 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: objsx.message,
                            showConfirmButton: false,
                            timer: 10000
                        });
                        //window.location.reload()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: objsx.message,
                        });
                    }
            },
            error: function(xhr, status, error) {
                // Tampilkan notifikasi SweetAlert2 jika gagal
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ada masalah saat mengirim pembayaran. Coba lagi!',
                });
            }
        });
    });
</script>