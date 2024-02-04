@if (session('successMessage'))
<script>
    const notyf = new Notyf();
        notyf.success({
            message: "{{ session('successMessage') }}",
            duration: 40000,
            dismissible:true,
            ripple:true,
            position:{
                x:'center',
                y:'top'
            }
        })
</script>
@endif


@if ($errors->any())
@foreach ($errors->all() as $error)
<script>
    const notyf = new Notyf();
            notyf.error({
                message: '{{ $error }}',
                duration: 40000,
                dismissible:true,
                ripple:true,
                position:{
                    x:'center',
                    y:'top'
                }
            })
</script>
@endforeach

@endif
