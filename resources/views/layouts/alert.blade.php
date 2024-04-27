@if (Session::has('message'))
<div class="modal mt-20" tabindex="-1" id="message">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body alert-success">
                <!--begin::Alert-->
                <div class="alert d-flex align-items-center">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Content-->
                        <span>{{Session::get('message')}}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            </div>
        </div>
    </div>
</div>
@endif

@if (Session::has('error'))
<div class="modal mt-20" tabindex="-1" id="error">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body alert-danger">
                <!--begin::Alert-->
                <div class="alert d-flex align-items-center">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Content-->
                        <span>{{Session::get('error')}}</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            </div>
        </div>
    </div>
</div>
@endif

@if (count($errors->all()) > 0)
    <div class="modal mt-20" tabindex="-1" id="error2">
        <div class="modal-dialog">
            @foreach($errors->all() as $error)
                <div class="modal-content">
                    <div class="modal-body alert-danger">
                        <!--begin::Alert-->
                        <div class="alert d-flex align-items-center">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{Session::get('error')}}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif

<script>
    @if (Session::has('message'))
        $('#message').fadeIn( 300 ).delay( 2000 ).fadeOut( 400 );
    @endif

    @if (Session::has('error'))
        $('#error').fadeIn( 300 ).delay( 2000 ).fadeOut( 400 );
    @endif

    @if (count($errors->all()) > 0)
        $('#error2').fadeIn( 300 ).delay( 5000 ).fadeOut( 400 );
    @endif
</script>