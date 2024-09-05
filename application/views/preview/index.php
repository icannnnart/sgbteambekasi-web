<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <title>REGISTRASI PAMDI</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="<?=base_url('assets/dashboard/')?>vendors/lightgallery/css/lightgallery.css">
      <script src="<?=base_url('assets/dashboard/')?>vendors/lightgallery/js/lightgallery-all.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="<?=base_url('assets/dashboard/')?>vendors/lightgallery/js/lightgallery-all.min.js"></script>
      <style type="text/css">
         *{
         margin:0;
         padding:0;
         box-sizing:border-box;
         font-family: 'Open Sans', sans-serif;
         }
         body{
         background-color: #F0F0F0;
         }
         .container{
         background-color: #AED3D4;
         width:700px;
         margin:0 auto;
         margin-top:20px;
         border-radius: 10px;
         }
         .title-form{
         background-color: #5DAAA7;
         padding:20px;
         border-radius: 10px 10px 0 0; 
         color:white;
         word-spacing: 5px;
         letter-spacing: 2px;
         }
         .student-form{
         grid-template-columns:1fr 1fr;
         grid-template-rows:repeat(5,1fr);
         padding: 30px 10px 30px 10px;
         }
         .field-form{
         display:flex;
         padding:15px;
         }
         .field-form input[type="text"]{
         flex:1;
         padding-left: 10px;
         outline: none;
         border:none;
         border-radius: 5px;
         word-spacing:2px;
         }
         .field-form input[type="text"]:focus{
         border: 2px solid #5DAAA7;
         }
         /*---GENDER FIELD---*/
         .gender-field{
         justify-content: space-evenly;
         align-items:center;
         }
         .gender-field div{
         border: none;
         padding: 6px 15px;
         margin-right:20px;
         border-radius: 5px;
         background-color: white;
         cursor: pointer;
         color:rgba(0,0,0,0.7);
         }
         .gender-field div span{
         margin-right: 10px;
         font-size:0.9em;
         }
         .gender-field div input{
         transform: translateY(2px);
         }
         /*---BIRTHDAY FIELD---*/
         .birthday-field{
         justify-content: space-between;
         align-items:center;
         }
         .birthday-field span{
         color:rgba(0,0,0,0.7);
         }
         select{
         height: 2.6em;
         padding: 0 25px 0 5px;
         border-radius: 5px;
         border:none;
         outline:none;
         color: rgba(0,0,0,0.7);
         }
         .birthday-field > select{
         padding: 0 10px 0 5px;
         }
         /* ADDRESS */
         .address{
         padding:10px 15px 0 15px;
         }
         textarea{
         flex:1;
         outline:none;
         border:none;
         border-radius:5px;
         resize:none;
         padding:10px;
         }
         /*--YEAR/SECTION--*/
         .year-section{
         justify-content:space-evenly;
         align-items:center;
         }
         /*--BUTTON--*/
         .button{
         display:flex;
         justify-content: flex-end;
         padding:30px 15px 0 0;
         }
         .add{
         padding: 0 20px;
         border:none;
         border-radius:5px;
         background-color: #5DAAA7;
         color:white;
         letter-spacing: 2px;
         }
         /*--LAYOUT ARRANGEMENT(GRID)--*/
         .field-form:nth-child(1){
         grid-column: 2/3;
         grid-row:1/2;
         }
         .field-form:nth-child(2){
         grid-column: 1/2;
         grid-row:1/2;  
         }
         .field-form:nth-child(3){
         grid-column: 1/2;
         grid-row:2/3;   
         }
         .field-form:nth-child(4){
         grid-column: 1/2;
         grid-row:3/4;  
         }
         .field-form:nth-child(5){
         grid-column: 1/2;
         grid-row:4/5;  
         }
         .field-form:nth-child(6){
         grid-column: 1/2;
         grid-row:5/6;  
         }
         .field-form:nth-child(7){
         grid-column: 2/3;
         grid-row:2/3;  
         }
         .field-form:nth-child(8){
         grid-column: 2/3;
         grid-row:3/4;   
         }
         .field-form:nth-child(9){
         grid-column: 2/3;
         grid-row:4/5;  
         }.field-form:nth-child(10){
         grid-column: 2/3;
         grid-row:5/6;  
         }
         @media (max-width:750px){
         *{
         margin:0;
         padding:0;
         box-sizing:border-box;
         font-family: 'Open Sans', sans-serif;
         }
         .container{
         background-color: #AED3D4;
         width:600px;
         margin:0 auto;
         margin-top:20px;
         border-radius: 10px;
         }
         .title-form{
         background-color: #5DAAA7;
         padding:15px 40px;
         border-radius: 10px 10px 0 0; 
         color:white;
         word-spacing: 5px;
         letter-spacing: 2px;
         }
         .student-form{
         display:grid;
         grid-template-columns:1fr 1fr;
         grid-template-rows:repeat(5,1fr);
         padding: 30px 10px 20px 10px;
         }
         .field-form{
         display:flex;
         padding:15px;
         }
         .field-form input[type="text"]{
         flex:1;
         padding-left: 10px;
         outline: none;
         border:none;
         border-radius: 5px;
         word-spacing:2px;
         }
         .field-form input[type="text"]:focus{
         border: 2px solid #5DAAA7;
         }
         /*---GENDER FIELD---*/
         .gender-field{
         justify-content: space-evenly;
         align-items:center;
         }
         .gender-field div{
         border: none;
         padding: 6px 10px;
         margin-right:20px;
         border-radius: 5px;
         background-color: white;
         cursor: pointer;
         color:rgba(0,0,0,0.7);
         }
         .gender-field div span{
         margin-right: 10px;
         }
         .gender-field div input{
         transform: translateY(2px);
         }
         /*---BIRTHDAY FIELD---*/
         .birthday-field{
         justify-content: space-evenly;
         align-items:center;
         }
         .birthday-field span{
         color:rgba(0,0,0,0.7);
         }
         select{
         height: 2.3em;
         padding: 0 15px 0 5px;
         border-radius: 5px;
         border:none;
         outline:none;
         color: rgba(0,0,0,0.7);
         margin:0 4px;
         }
         .birthday-field > select{
         margin: 0 4px;
         }
         /* ADDRESS */
         .address{
         padding:10px 15px 0 15px;
         }
         textarea{
         flex:1;
         outline:none;
         border:none;
         border-radius:5px;
         resize:none;
         padding:5px;
         }
         /*--YEAR/SECTION--*/
         .year-section{
         justify-content:space-evenly;
         align-items:center;
         }
         /*--BUTTON--*/
         .button{
         display:flex;
         justify-content: flex-end;
         padding:30px 15px 0 0;
         }
         .add{
         padding: 0 20px;
         border:none;
         border-radius:5px;
         background-color: #5DAAA7;
         color:white;
         letter-spacing: 2px;
         }
         /*--LAYOUT ARRANGEMENT(GRID)--*/
         .field-form:nth-child(1){
         grid-column: 2/3;
         grid-row:1/2;
         }
         .field-form:nth-child(2){
         grid-column: 1/2;
         grid-row:1/2;  
         }
         .field-form:nth-child(3){
         grid-column: 1/2;
         grid-row:2/3;   
         }
         .field-form:nth-child(4){
         grid-column: 1/2;
         grid-row:3/4;  
         }
         .field-form:nth-child(5){
         grid-column: 1/2;
         grid-row:4/5;  
         }
         .field-form:nth-child(6){
         grid-column: 1/2;
         grid-row:5/6;  
         }
         .field-form:nth-child(7){
         grid-column: 2/3;
         grid-row:2/3;  
         }
         .field-form:nth-child(8){
         grid-column: 2/3;
         grid-row:3/4;   
         }
         .field-form:nth-child(9){
         grid-column: 2/3;
         grid-row:4/5;  
         }.field-form:nth-child(10){
         grid-column: 2/3;
         grid-row:5/6;  
         }
         }
         @media (max-width:600px){
         *{
         margin:0;
         padding:0;
         box-sizing:border-box;
         font-family: 'Open Sans', sans-serif;
         }
         .container{
         background-color: #AED3D4;
         width:400px;
         margin:20px auto;
         border-radius: 10px;
         }
         .title-form{
         background-color: #5DAAA7;
         padding:10px 30px;
         border-radius:10px 10px 0 0; 
         color:white;
         word-spacing: 5px;
         letter-spacing: 2px;
         }
         .student-form{
         display:grid;
         grid-template-columns:1fr;
         grid-template-rows:auto;
         padding: 25px 10px 20px 10px;
         }
         .field-form{
         display:flex;
         padding:15px;
         }
         .field-form input[type="text"]{
         flex:1;
         padding-left: 10px;
         outline: none;
         border:none;
         border-radius: 5px;
         word-spacing:2px;
         height:2.5em;
         font-size: 0.9em;
         }
         .field-form input[type="text"]:focus{
         border: 2px solid #5DAAA7;
         }
         /*---GENDER FIELD---*/
         .gender-field{
         justify-content: space-evenly;
         align-items:center;
         }
         .gender-field div{
         border: none;
         padding: 6px 10px;
         margin-right:20px;
         border-radius: 5px;
         background-color: white;
         cursor: pointer;
         color:rgba(0,0,0,0.7);
         }
         .gender-field div span{
         margin-right: 10px;
         }
         .gender-field div input{
         transform: translateY(2px);
         }
         /*---BIRTHDAY FIELD---*/
         .birthday-field{
         justify-content: space-between;
         align-items:center;
         }
         .birthday-field span{
         color:rgba(0,0,0,0.7);
         }
         select{
         height: 2.3em;
         padding: 0 15px 0 5px;
         border-radius: 5px;
         border:none;
         outline:none;
         color: rgba(0,0,0,0.7);
         margin:0 4px;
         }
         .birthday-field > select{
         margin: 0 4px;
         }
         /* ADDRESS */
         .address{
         padding:10px 15px 0 15px;
         margin-bottom:15px;
         }
         textarea{
         flex:1;
         outline:none;
         border:none;
         border-radius:5px;
         resize:none;
         padding:5px;
         height:5em;
         }
         /*--YEAR/SECTION--*/
         .year-section{
         justify-content:space-evenly;
         align-items:center;
         }
         /*--BUTTON--*/
         .button{
         display:flex;
         justify-content: flex-end;
         padding:10px 15px 0 0;
         }
         .add{
         margin-top:10px;
         padding: 10px 20px;
         border:none;
         border-radius:5px;
         background-color: #5DAAA7;
         color:white;
         letter-spacing: 2px;
         }    
         /*--LAYOUT ARRANGEMENT(GRID)--*/
         .field-form:nth-child(1){
         grid-column: 1/2;
         grid-row:1/2;
         }
         .field-form:nth-child(2){
         grid-column: 1/2;
         grid-row:2/3;  
         }
         .field-form:nth-child(3){
         grid-column: 1/2;
         grid-row:3/4;   
         }
         .field-form:nth-child(4){
         grid-column: 1/2;
         grid-row:4/5;  
         }
         .field-form:nth-child(5){
         grid-column: 1/2;
         grid-row:5/6;  
         }
         .field-form:nth-child(6){
         grid-column: 1/2;
         grid-row:6/7;  
         }
         .field-form:nth-child(7){
         grid-column: 1/2;
         grid-row:7/8;  
         }
         .field-form:nth-child(8){
         grid-column: 1/2;
         grid-row:8/9;   
         }
         .field-form:nth-child(9){
         grid-column: 1/2;
         grid-row:9/10;  
         }
         .field-form:nth-child(10){
         grid-column: 1/2;
         grid-row:10/11;  
         }
         }
         @media (max-width:440px){
         *{
         margin:0;
         padding:0;
         box-sizing:border-box;
         font-family: 'Open Sans', sans-serif;
         }
         .container{
         background-color: #AED3D4;
         width:100%;
         margin:0 auto;
         border-radius:0;
         }
         .title-form{
         background-color: #5DAAA7;
         padding:10px 30px;
         border-radius: 0; 
         color:white;
         word-spacing: 5px;
         letter-spacing: 2px;
         }
         .student-form{
         display:grid;
         grid-template-columns:1fr;
         grid-template-rows:auto;
         padding: 25px 10px 20px 10px;
         }
         .field-form{
         display:flex;
         }
         .field-form input[type="text"]{
         flex:1;
         padding-left: 10px;
         outline: none;
         border:none;
         border-radius: 5px;
         word-spacing:2px;
         height:2.5em;
         font-size: 0.9em;
         }
         .field-form input[type="text"]:focus{
         border: 2px solid #5DAAA7;
         }
         /*---GENDER FIELD---*/
         .gender-field{
         justify-content: space-between;
         align-items:center;
         }
         .gender-field div{
         border: none;
         padding: 6px 10px;
         margin-right:20px;
         border-radius: 5px;
         background-color: white;
         cursor: pointer;
         color:rgba(0,0,0,0.7);
         }
         .gender-field div span{
         margin-right: 10px;
         }
         .gender-field div input{
         transform: translateY(2px);
         }
         /*---BIRTHDAY FIELD---*/
         .birthday-field{
         justify-content: space-between;
         align-items:center;
         }
         .birthday-field span{
         color:rgba(0,0,0,0.7);
         }
         select{
         height: 2.3em;
         padding: 0 15px 0 5px;
         border-radius: 5px;
         border:none;
         outline:none;
         color: rgba(0,0,0,0.7);
         margin:0 4px;
         }
         .birthday-field > select{
         margin: 0 4px;
         }
         /*--YEAR/SECTION--*/
         .year-section{
         justify-content:space-evenly;
         align-items:center;
         }
         /*--BUTTON--*/
         .button{
         display:flex;
         justify-content: flex-end;
         padding:10px 15px 0 0;
         }
         .add{
         padding: 10px 20px;
         border:none;
         border-radius:5px;
         background-color: #5DAAA7;
         color:white;
         letter-spacing: 2px;
         }    
         }
      </style>
   </head>
   <body>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
      <div class="container">
         <div class="title-form">
            <h1 class="text-center">DETAIL REGISTRASION FORM</h1>
         </div>
         <form class="student-form">
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
               <input type="text" name="nama_lengkap" value="<?=$data_regis->nama_lengkap?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Nama Ibu Kandung</label>
               <input type="text" name="nama_ibu" value="<?=$data_regis->nama_ibukandung?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
               <input type="text" name="nama_ibu" value="<?php $jk = $this->M_db->Get_user_by_id('t_gender','id',$data_regis->jenis_kelamin); print_r($jk->name)?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Agama</label>
               <input type="text" name="nama_ibu" value="<?php $agama = $this->M_db->Get_user_by_id('t_agama','id',$data_regis->agama); print_r($agama->name)?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Profesi</label>
               <input type="text" name="nama_ibu" value="<?php $kerja = $this->M_db->Get_user_by_id('t_profesi','id',$data_regis->profesi); print_r($kerja->name)?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">NIK</label>
               <input type="text" name="nik" value="<?=$data_regis->nik?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">No Whatsapp</label>
               <input type="text" name="nowa" value="<?=$data_regis->nowa?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Sosial Media</label>
               <input type="text" name="sosmed" value="<?=$data_regis->sosmed?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Email</label>
               <input type="email" name="email" value="<?=$data_regis->email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Alamat</label>
               <input type="text" name="alamat" value="<?=$data_regis->alamat?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Provinsi</label>
               <input type="text" name="prov" value="<?php $prov = $this->M_db->Get_user_by_id('t_provinsi','id',$data_regis->provinsi); print_r($prov->name)?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Kabupaten/Kota</label>
               <input type="text" name="kabkot" value="<?php $kabkot = $this->M_db->Get_user_by_id('t_kabkot','id',$data_regis->kabkot); print_r($kabkot->name)?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Foto</label>
               <div id="lightgallery-without-thumb" class="lightGallery">
                  <a href="<?=htmlspecialchars($data_regis->file_img)?>" class="image-tile">
                  <img src="https://i.pinimg.com/originals/ec/c0/8b/ecc08b6a0f8294402b8186a25b47cbe4.jpg" width="20%" alt="FOTO"></a>
               </div>
            </div>
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Status</label>
               <?php if($data_regis->status == 4){?>
               	<input type="text" name="status" value="PENDING DPC" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
               <?php }elseif ($data_regis->status == 3){?>
               	<input type="text" name="status" value="PENDING DPD" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
               <?php }elseif ($data_regis->status == 2){?>
               	<input type="text" name="status" value="PENDING PUSAT PAMDI" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
               <?php }elseif ($data_regis->status == 1){?>
               	<input type="text" name="status" value="REGISTRASION IS APPROVED" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
               <?php }else{?>
               	<input type="text" name="status" value="REGISTRASION IS REJECT" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
               <?php }?>
               <input type="text" name="level" value="<?=$data_regis->status?>" hidden>
            </div>
            <div class="mb-3 col-md-12">
               <label for="exampleInputEmail1" class="form-label">Note</label>
               <textarea type="text" name="notes" value="<?=$data_regis->note?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required></textarea>
            </div>
            <hr>
            <button type="button" id="approveBtn" class="btn btn-success">Approve</button>
            <button type="button" id="rejectBtn" class="btn btn-danger">Reject</button>
         </form>
      </div>
   </body>
   <script type="text/javascript">
      if ($("#lightgallery-without-thumb").length) {
             $("#lightgallery-without-thumb").lightGallery({
               thumbnail: true,
               animateThumb: false,
               showThumbByDefault: false
             });
           }
   </script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   $(document).ready(function() {
      $('#approveBtn').click(function(e) {
      	e.preventDefault();
         Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to approve this form?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  url: '<?=site_url('management/process/register/'.$data_regis->id.'?to=1')?>', // Ganti dengan URL curl untuk approve
                  type: 'POST',
                  data: $('form').serialize(), // Mengirimkan data form
                  success: function(response) {
                     Swal.fire(
                        'Approved!',
                        'The form has been approved.',
                        'success'
                     ).then((result) => {
                     	if (result.isConfirmed) {
                                        window.location.href = "<?=site_url('')?>";
                                    }
                     });
                  },
                  error: function() {
                     Swal.fire(
                        'Error!',
                        'There was an error approving the form.',
                        'error'
                     ).then((result) => {
                     	if (result.isConfirmed) {
                                        window.location.href = "<?=site_url('')?>";
                                    }
                     });
                  }
               });
            }
         });
      });

      $('#rejectBtn').click(function(e) {
      	e.preventDefault();
         Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to reject this form?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reject it!'
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  url: '<?=site_url('management/process/register/'.$data_regis->id.'?to=2')?>', // Ganti dengan URL curl untuk reject
                  type: 'POST',
                  data: $('form').serialize(), // Mengirimkan data form
                  success: function(response) {
                     Swal.fire(
                        'Rejected!',
                        'The form has been rejected.',
                        'success'
                     ).then((result) => {
                     	if (result.isConfirmed) {
                                        window.location.href = "<?=site_url('')?>";
                                    }
                     });
                  },
                  error: function() {
                     Swal.fire(
                        'Error!',
                        'There was an error rejecting the form.',
                        'error'
                     ).then((result) => {
                     	if (result.isConfirmed) {
                                        window.location.href = "<?=site_url('')?>";
                                    }
                     });
                  }
               });
            }
         });
      });
   });
</script>

</html>