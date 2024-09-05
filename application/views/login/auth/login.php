<body>
    <div class="container">
        <form id="loginForm" action="" method="POST">
            <picture>
                <source media="(min-width:650px)" srcset="<?=base_url('assets/dashboard/')?>images/putih.png">
                    <source media="(min-width:465px)" srcset="<?=base_url('assets/dashboard/')?>images/putih.png">
                        <img src="<?=base_url('assets/dashboard/')?>images/putih.png" alt="Logo SGB Team Bekasi" style="width:210px;">
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
<script type="text/javascript">
    var baseurl = '<?=site_url('/app/dashboard')?>'
</script>
<script src="<?=base_url('assets/login/')?>gue.js"></script>