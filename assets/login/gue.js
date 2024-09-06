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
                                        window.location.href = baseurl;
                                    }
                                });
                            } else if(response.status == 2) {
                                 $('#content').css('visibility', 'visible');
                                Swal.fire('Success', response.message, 'success').then((result) => {
                                    $('#preloader').hide();
                                   
                                    if (result.isConfirmed) {
                                        window.location.href = "";
                                    }
                                });
                            } else {
                                $('#preloader').hide();
                                $('#content').css('visibility', 'visible');
                                Swal.fire('Error', response.message, 'error').then((result) => {
                                    $('#preloader').hide();
                                   
                                    if (result.isConfirmed) {
                                        window.location.reload()
                                    }
                                });
                            }
                        }
                    });
                });
            });