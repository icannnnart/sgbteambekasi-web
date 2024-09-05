<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url('assets/dashboard')?>/vendors/sweetalert/sweetalert.min.js"></script>
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">New Member Form</h4>
               <form id="registermember" class="forms-sample">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputUsername1">Nama</label>
                           <input type="text" name="names" class="form-control" id="name" placeholder="e.G Jhon Doe">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email</label>
                           <input type="email" name="emails" class="form-control" id="email" placeholder="Email">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputPassword1">Password</label>
                           <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputConfirmPassword1">Alamat</label>
                           <input type="text" name="address" class="form-control" id="address" placeholder="Alamat Lengkap">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputConfirmPassword1">Link FB</label>
                           <input type="text" name="link_fb" class="form-control" id="fb" placeholder="htpss://facebook.com/xxxxx">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputConfirmPassword1">No Whatsapp</label>
                           <input type="text" name="number" class="form-control" id="nope" placeholder="62xxxxxxx">
                        </div>
                     </div>
                  </div>
                  
                  
                  
                  
                  
                  
                  <button type="submit" class="btn btn-primary me-2">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card position-relative">
            <div class="card-body">
               <h6 class="card-title">LIST USER SGB BEKASI</h6>
               <div class="row">
                  <div class="col-12">
                     <div class="table-responsive">
                        <table id="order-listing" class="table">
                           <thead>
                              <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Email</th>
                                 <th>No Whatsapp</th>
                                 <th>Alamat</th>
                                 <th>Level</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $a=0; foreach($data_user as $datasuser){$a++;?>
                              <tr>
                                 <td><?=$a?></td>
                                 <td><?=$datasuser['name']?></td>
                                 <td><?=$datasuser['email']?></td>
                                 <td><?=$datasuser['nowa']?></td>
                                 <td><?=$datasuser['address']?></td>
                                 <td>
                                    <?php $level = $this->M_db->Get_user_by_id('t_role','id',$datasuser['role']); if ($level->id == 9){?>
                                    <label class="badge badge-info"><?=$level->name?></label>
                                    <?php }elseif ($level->id == 2){?>
                                    <label class="badge badge-warning "><?=$level->name?></label>
                                    <?php }else{?>
                                    <label class="badge badge-warning "><?=$level->name?></label>
                                    <?php }?>
                                 </td>
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