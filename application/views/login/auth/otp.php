<body>
    <div class="container">
        <form id="regisForm" action="" method="POST">
            <picture>
                <source media="(min-width:650px)" srcset="<?=base_url('assets/dashboard/')?>images/putih.png">
                    <source media="(min-width:465px)" srcset="<?=base_url('assets/dashboard/')?>images/putih.png">
                        <img src="<?=base_url('assets/dashboard/')?>images/putih.png" alt="Logo SGB Team Bekasi" style="width:210px;">
                    </picture>
            <h2>REGISTER MEMBER</h2>
            <div class="input-field">
                <input type="email" name="email" id="username" required />
                <label>Enter Email</label>
            </div>
            <div class="input-field">
                <input type="email" name="name" id="name" required />
                <label>Enter Name</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required />
                <label>Enter Password</label>
            </div>
            <div class="input-field">
                <input type="email" name="address" id="address" required />
                <label>Enter Address</label>
            </div>
            <div class="input-field">
                <input type="email" name="nomer" id="nomer" required />
                <label>Enter No Whatsapp</label>

            </div>
            <code>Example : 62xxxxxx</code>
            <div class="input-field">
                <input type="email" name="username" id="username" required />
                <label>Enter Link Fb</label>
            </div>
            <button type="submit">Register</button>
            <div class="Create-account">
                <p>Sudah punya akun? <a href="<?=site_url()?>">Login</a></p>
                <p>© <?=date('Y')?> SGBTEAM BEKASI.</p>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">
    var baseurl = '<?=site_url('/app/dashboard')?>'
</script>
<script src="<?=base_url('assets/login/')?>gue.js"></script>