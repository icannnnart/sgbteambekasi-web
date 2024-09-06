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
                <input type="email" name="emails" id="username" required />
                <label>Enter Email</label>
            </div>
            <div class="input-field">
                <input type="text" name="names" id="name" required />
                <label>Enter Name</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required />
                <label>Enter Password</label>
            </div>
            <div class="input-field">
                <input type="text" name="address" id="address" required />
                <label>Enter Address</label>
            </div>
            <div class="input-field">
                <input type="text" name="number" id="number" required />
                <label>Enter No Whatsapp</label>

            </div>
            <code style="color: #ef9191;">*Diawali dengan 62xxxxxx</code>
            <div class="input-field">
                <input type="text" name="link_fb" id="link_fb" required />
                <label>Enter Link Fb</label>
            </div>
            <div class="g-recaptcha" data-sitekey="6LeXLTgqAAAAAKrhJwz8A6GZKYZ1d1q4fxbGsLRx"></div>
            <button type="submit">Register</button>
            <div class="Create-account">
                <p>Sudah punya akun? <a href="<?=site_url()?>">Login</a></p>
                <p>© <?=date('Y')?> SGBTEAM BEKASI.</p>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">
    var baseurl = '<?=site_url('')?>'
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="<?=base_url('assets/login/')?>reg.js"></script>