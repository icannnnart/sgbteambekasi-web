<link rel="stylesheet" href="<?=base_url('assets/dashboard')?>/vendors/select2/select2.min.css">
<link rel="stylesheet" href="<?=base_url('assets/dashboard')?>/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
<div class="content-wrapper">
   <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">New Member Form</h4>
               <form class="forms-sample">
                  <div class="form-group">
                     <label for="exampleInputUsername1">Level</label>
                     <select name="level"  class="form-control js-example-basic-single">
                        <option value="2">Member</option>
                        <option value="9">Admin</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputUsername1">Nama</label>
                     <input type="text" name="names" class="form-control" id="name" placeholder="e.G Jhon Doe">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Email</label>
                     <input type="email" name="emails" class="form-control" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">Password</label>
                     <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputConfirmPassword1">Alamat</label>
                     <input type="text" name="address" class="form-control" id="address" placeholder="Alamat Lengkap">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputConfirmPassword1">Link FB</label>
                     <input type="text" name="link_fb" class="form-control" id="fb" placeholder="htpss://facebook.com/xxxxx">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputConfirmPassword1">No Whatsapp</label>
                     <input type="text" class="form-control" id="nope" placeholder="62xxxxxxx">
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
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
<script src="<?=base_url('assets/dashboard')?>/vendors/select2/select2.min.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/data-table.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/select2.js"></script>