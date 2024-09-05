<div class="content-wrapper">
	<div class="row">
	      <div class="col-md-12 grid-margin stretch-card">
	         <div class="card">
	            <div class="card-body">
	               <h6 class="card-title">Master User</h6>
	               <button type="button" class="btn btn-primary">New User</button>
	            </div>
	         </div>
	      </div>
	</div>
	<div class="row">
      <div class="col-md-12 grid-margin stretch-card">
         <div class="card position-relative">
            <div class="card-body">
               <h6 class="card-title">LIST USER PAMDI</h6>
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
                                 <td><?=$datasuser['alamat']?></td>
                                 <td>
                                 	<?php $level = $this->M_db->Get_user_by_id('t_level_akun','id',$datasuser['status']); if ($level->role_id == 1){?>
                                    	<label class="badge badge-info"><?=$level->name?></label>
	                                <?php }elseif ($level->role_id == 2){?>
	                                	<label class="badge badge-secondary "><?=$level->name?></label>
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