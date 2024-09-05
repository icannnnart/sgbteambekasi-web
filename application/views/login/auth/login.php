<body>
    <div class="container">
        <form id="loginForm" action="" method="POST">
            <picture>
                <source media="(min-width:650px)" srcset="<?=base_url('assets/login/')?>image/pamdi.png">
                    <source media="(min-width:465px)" srcset="<?=base_url('assets/login/')?>image/pamdi.png">
                        <img src="<?=base_url('assets/login/')?>image/pamdi.png" alt="Logo PAMDI" style="width:210px;">
                    </picture>
            <h2>LOGIN MEMBER</h2>
            <div class="input-field">
                <input type="email" name="username" id="username" required />
                <label>Enter Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required />
                <label>Enter Password</label>
            </div>
            <button type="submit">Log In</button>
            <div class="Create-account">
                <p>© <?=date('Y')?> SGBTEAM BEKASI.</p>
            </div>
        </form>
    </div>
</body>
<script>
            $(document).ready(function() {
                document.getElementById('username').focus();
                $('#loginForm').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == 1) {
                                 $('#content').css('visibility', 'visible');
                                Swal.fire('Success', response.message, 'success').then((result) => {
                                    $('#preloader').hide();
                                   
                                    if (result.isConfirmed) {
                                        window.location.href = "<?=site_url('/app/dashboard')?>";
                                    }
                                });
                            } else if(response.status == 2) {
                                 $('#content').css('visibility', 'visible');
                                Swal.fire('Success', response.message, 'success').then((result) => {
                                    $('#preloader').hide();
                                   
                                    if (result.isConfirmed) {
                                        window.location.href = "<?=site_url('auth/login/verification')?>";
                                    }
                                });
                            } else {
                                $('#preloader').hide();
                                $('#content').css('visibility', 'visible');
                                Swal.fire('Error', response.message, 'error');
                            }
                        }
                    });
                });
            });
        </script>