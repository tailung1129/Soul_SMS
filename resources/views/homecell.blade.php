@extends('layouts.app')

@section('content')
<div class="container">
    <div class="ps-5">
        <a class="btn btn-primary btn-lg text-dark rounded-pill" href="/home">Home</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="fs-4 text-shadow">“The fruit of the righteous is a tree of life; and he that winneth souls is wise.”</div>
            <div class="text-center">
                <img src="{{asset('img/logo.jpg')}}">
            </div>
            <div class="text-wrap fs-5">
                PLEASE FILL IN PHONE NUMBER & SELECT LOCATION,DISTRICT & STREET OF NEW CONVERTS/FIRST TIMERS. 
            </div>
            <div class="">
                <form id="form_homecell">
                    <div class="mt-2 mb-2 input-group">
                        <label class="col-3 col-form-label text-end me-2">PHONE NUMBER</label>
                        <input type="tel" class="form-control me-3 rounded-pill" id="homecell_phonenumber_input" pattern="^[0-9]{11}" placeholder="07405643344" required>
                    </div>
                    <div class="mt-2 mb-2 input-group">
                        <span class="col-3 col-form-label text-end me-2">LOCATION</span>
                        <input type="text" class="form-control me-3 rounded-pill" id="homecell_location_input" required>
                    </div>
                    <div class="mt-2 mb-2 input-group">
                        <span class="col-3 col-form-label text-end me-2">DISTRICT</span>
                        <input type="text" class="form-control me-3 rounded-pill" id="homecell_district_input" required>
                    </div>
                    <div class="mt-2 mb-2 input-group">
                        <span class="col-3 col-form-label text-end me-2">STREET</span>
                        <input type="text" class="form-control me-3 rounded-pill" id="homecell_street_input" required>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-secondary btn-lg rounded-pill" id="submit_homecell">Follow Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('contentscript')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function() {
        $("#submit_homecell").click(function(e) {
            e.preventDefault();
            var ele = document.getElementById("form_homecell");
            var chk_status = ele.checkValidity();
            ele.reportValidity();
            if(chk_status)
            {
                // console.log("here is after validate");
                var phonenum = $("#homecell_phonenumber_input").val();
                var location = $("#homecell_location_input").val();
                var district = $("#homecell_district_input").val();
                var street = $("#homecell_street_input").val();
                $.ajax({
                    type:'POST',
                    url:'/homecell',
                    data:{
                        phonenum:phonenum,
                        location:location,
                        district:district,
                        street:street
                    },
                    error:function(err) {
                        // console.log("here is homecell ajax response error" , err);
                        swal(
                            'Error',
                            'Please check phone number or connection and try again.',
                            'error'
                        );
                    },
                    success:function(response) {
                        if(response=="success")
                        {
                            swal(
                                'OK!',
                                'Sent message Successfully.',
                                'success'
                            );
                        }
                        else if(response=="noaddress")
                        {
                            swal(
                                'Error',
                                'There is no close homecell.',
                                'error'
                            );
                        }
                    }
                });
            }
        });
    })
</script>
@endsection