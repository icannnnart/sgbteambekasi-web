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
                           <form class="forms-sample">
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-4 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Remember me
                                            <i class="input-helper"></i></label>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                        </div>
                        <div class="d-flex align-items-start profile-feed-item">
                           <img src="../../../assets/images/faces/face13.jpg" alt="profile" class="img-sm rounded-circle">
                           <div class="ms-4">
                              <h6>
                                 Mason Beck
                                 <small class="ms-4 text-muted"><i class="ti-time me-1"></i>10 hours</small>
                              </h6>
                              <p>
                                 There is no better advertisement campaign that is low cost and also successful at the same
                                 time.
                              </p>
                              <p class="small text-muted mt-2 mb-0">
                                 <span>
                                 <i class="ti-star me-1"></i>4
                                 </span>
                                 <span class="ms-2">
                                 <i class="ti-comment me-1"></i>11
                                 </span>
                                 <span class="ms-2">
                                 <i class="ti-share"></i>
                                 </span>
                              </p>
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