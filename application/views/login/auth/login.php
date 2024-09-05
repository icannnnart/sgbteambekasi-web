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
<script type="text/javascript">
    var base
</script>
<script src="<?=base_url('assets/login/')?>gue.js"></script>