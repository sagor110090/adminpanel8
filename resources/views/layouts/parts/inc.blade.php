<script>
    //delete sweet alert
    function sweetalertDelete(id) {
        event.preventDefault();
        swal({
                title: "Are you sure?",
                text: "To continue this action!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Your action has beed done! :)", {
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    });
                    $("#deleteButton" + id).submit();
                }
            });
    }
    // multiple click privent
    $('.oneTimeSubmit').click(function () {
    var count1=0;
    var count2=-1;
        const inputs = document.querySelectorAll('#oneTimeSubmit input');
        const requiredFields = Array.from(inputs).filter(input => input.required);
        for (let index = 0; index < requiredFields.length; index++) {
            count1 = index;

            if (requiredFields[index].value) {
                count2 ++;
            }
        }
        if (count1 == count2) {
                $('.oneTimeSubmit').addClass('btn-progress');
        }

    });
    //for validation
    $('input, textarea, select').keyup(function (e) {
        $(this).closest('form').addClass("was-validated");
    });
   // tostr message
    @if(Session::has('success'))
    iziToast.success({
        // title: 'Hello, world!',
        message: '{{Session::get('success')}}',
        position: 'topRight'
    });
    @endif
    @if(Session::has('warning'))
    iziToast.warning({
        // title: 'Hello, world!',
        message: '{{Session::get('warning')}}',
        position: 'topRight'
    });
    @endif
    @if(Session::has('error'))
    iziToast.error({
        // title: 'Hello, world!',
        message: '{{Session::get('error')}}',
        position: 'topRight'
    });
    @endif


</script>
