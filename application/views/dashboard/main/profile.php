<div class="content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-4">
                     <div class="border-bottom text-center pb-4">
                        <img src="https://ui-avatars.com/api/?name=<?=$user->name?>&amp;background=random" alt="profile" class="img-lg rounded-circle mb-3">
                        <div class="mb-3">
                           <h3><?=$user->name?></h3>
                           <div class="d-flex align-items-center justify-content-center">
                              <h5 class="mb-0 me-2 text-muted"><?=$user->email?></h5>
                           </div>
                        </div>
                        <p class="w-75 mx-auto mb-3"><?=$user->address?></p>
                     </div>
                     <div class="border-bottom py-4">
                        <p>Badge</p>
                        <div>
                           <label class="badge badge-outline-dark my-1">Chalk</label>
                           <label class="badge badge-outline-dark my-1">Hand lettering</label>
                           <label class="badge badge-outline-dark my-1">Information Design</label>
                           <label class="badge badge-outline-dark my-1">Graphic Design</label>
                           <label class="badge badge-outline-dark my-1">Web Design</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="mt-4 py-2 border-top border-bottom">
                        <ul class="nav profile-navbar">
                           <li class="nav-item">
                              <a class="nav-link active" href="#">
                              <i class="ti-user"></i>
                              Informasi Akun
                              </a>
                           </li>
                        </ul>
                     </div>
                     <div class="profile-feed">
                        <div class="d-flex align-items-start profile-feed-item">
                           <div class="card col-sm-12">
                                <div class="card-body">
                                    <form class="forms-sample">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="password" id="password" placeholder="Mobile number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">No Whatsapp</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nowa" id="nowa" inputmode="numeric">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="Alamat" id="Alamat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Link Facebook</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="linkfb" id="linkfb">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start profile-feed-item">
                           <div class="card col-sm-12">
                                <div class="card-body">
                                    <h4 class="card-title">Request Email Official SGB BEKASI</h4>
                                    <form class="forms-sample">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email SGB</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="exampleInputUsername2" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Apikey</label>
                                            <div class="col-sm-9">
                                              <div class="input-group">
                                                <a href="#" class="input-group-text bg-primary text-white"><i class="las la-redo-alt"></i></a>
                                                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                                              </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>