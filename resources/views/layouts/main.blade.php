<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="{{settings('app_name')}}" />
    <meta content="{{settings('description')}}" name="description" />
    <title> {{settings('title')}} </title>
    <link rel="shortcut icon" href="favicon.png" />
    <meta name="keywords" content="" />
    
    @yield('css')

  </head>
  <body>
  



    @yield('page')



    

      <script>
        $(document).ready(function() {
            $(document).on('click', '.submit-form', function(e) {
                e.preventDefault();
                const btn = $(this);
                let form = btn.closest('form');
                let data = new FormData(form[0]);
                let url = form.attr("action");
                let method = form.attr("method");
                // if (confirm("Are you sure you want to save this record?")) {
                btn.prop('disabled', true);
                btn.append('<span class="spin-loader"> <i class="fa fa-spinner fa-spin"></i> please wait...</span>');
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    error: function(xhr, status, error) {
                        btn.prop('disabled', false);
                        $('.spin-loader').fadeOut();

                        /////////////////////////////////////////////
                        let errors = xhr.responseJSON.errors;
                        if (errors) {
                            for (control in errors) {
                                Swal.fire({
                                    title: errors[control][0],
                                    icon: 'error', // success, error, warning, info, or question
                                    confirmButtonText: 'Close',
                                });
                                break;
                            }
                        } else {
                            Swal.fire({
                                title: error,
                                icon: 'error', // success, error, warning, info, or question
                                confirmButtonText: 'Close',
                            });
                        }
                        //////////////////////////////////////////////
                    },
                    success: function(data) {
                        btn.prop('disabled', false);
                        $('.spin-loader').fadeOut();

                        Swal.fire({
                            title: data.message,
                            icon: data.status, // success, error, warning, info, or question
                            confirmButtonText: 'Close',
                        });
                        $('.modal_popup').css({'z-index':'20'})
                        setTimeout(function() {
                            window.location.reload();
                        }, 3000);
                    },
                });
                // }
            });
        })
    </script>

      @livewireScripts

      @yield('js')
    </body>
  </html>









