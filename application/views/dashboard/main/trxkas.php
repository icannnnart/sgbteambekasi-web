<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pembayaran KAS SGB Team Bekasi</h4>
                                    <hr>
                                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                        	<label for="exampleInputPassword4">Nominal</label>
						                    <div class="input-group">
						                      <div class="input-group-prepend">
						                        <span class="input-group-text bg-primary text-white">IDR</span>
						                      </div>
						                      <input type="text" name="nominal" class="form-control form-control-sm" id="currencyInput" inputmode="numeric" aria-label="Amount (to the nearest dollar)">
						                    </div>
						                  </div>
                                        <div class="form-group">
                                            <label>Bukti Pembayaran</label>
                                            <input type="file" name="img" class="file-upload-default" accept=".jpg, .jpeg, .png">
                                            <div class="input-group col-xs-12 d-flex align-items-center">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Bukti Pembayaran">
                                                <span class="input-group-append ms-2">
                                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                        <button class="btn btn-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
	</div>
</div>
<script>
    // Fungsi untuk memformat angka menjadi format mata uang (1.000.000)
    function formatCurrency(value) {
        const numberString = value.replace(/\D/g, ''); // Menghapus semua karakter non-digit
        const formattedValue = new Intl.NumberFormat('id-ID').format(numberString);
        return formattedValue;
    }

    document.getElementById('currencyInput').addEventListener('input', function(e) {
        let input = e.target.value;
        e.target.value = formatCurrency(input);
    });

    // Hanya menerima input angka
    document.getElementById('currencyInput').addEventListener('keydown', function(e) {
        if (!/[0-9]/.test(e.key) && e.key !== 'Backspace' && e.key !== 'Delete') {
            e.preventDefault(); // Mencegah input selain angka
        }
    });
</script>
<script src="<?=base_url('assets/dashboard')?>/js/file-upload.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/alerts.js"></script>
<script src="<?=base_url('assets/dashboard')?>/js/avgrund.js"></script>