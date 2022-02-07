@extends('layouts.app')

@section('content')
<div class="container">
    <div class="ps-5">
        <a class="btn btn-primary btn-lg text-dark rounded-pill" href="/home">Home</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
        <div class="fs-4 text-shadow">“The fruit of the righteous is a tree of life; and he that winneth souls is wise.”</div>
            <div class="text-center">
                <img src="{{asset('img/logo.jpg')}}">
            </div>
            <div class="text-wrap fs-5">
                PLEASE FILL IN PHONE NUMBERS OF NEW CONVERTS/FIRST TIMERS
            </div>
            <div class="">
                <form action="/information" id="form_information">
                    <div class="d-inline-flex mt-2 mb-2">
                        <input type="tel" class="form-control me-3 rounded-pill" pattern="^[0-9]{11}" id="value1" placeholder="07405643344" required>
                        <input type="tel" class="form-control ms-3 rounded-pill" pattern="^[0-9]{11}" id="value2">
                    </div>
                    <div class="d-inline-flex mt-2 mb-2">
                        <input type="tel" class="form-control me-3 rounded-pill" pattern="^[0-9]{11}" id="value3">
                        <input type="tel" class="form-control ms-3 rounded-pill" pattern="^[0-9]{11}" id="value4">
                    </div>
                    <div class="d-inline-flex mt-2 mb-2">
                        <input type="tel" class="form-control me-3 rounded-pill" pattern="^[0-9]{11}" id="value5">
                        <input type="tel" class="form-control ms-3 rounded-pill" pattern="^[0-9]{11}" id="value6">
                    </div>
                    <div class="d-inline-flex mt-2 mb-2">
                        <input type="tel" class="form-control me-3 rounded-pill" pattern="^[0-9]{11}" id="value7">
                        <input type="tel" class="form-control ms-3 rounded-pill" pattern="^[0-9]{11}" id="value8">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-secondary btn-lg rounded-pill" id="submitInfomation">Follow Up</button>
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

    $(document).ready(function () {
        $("#submitInfomation").click(function (e) {
            e.preventDefault();
            var numberarray = [];
            var i=0;
            var ele = document.getElementById("form_information");
            var chk_status = ele.checkValidity();
            var submitresult;
            ele.reportValidity();
            if(chk_status)
            {  
                for(i=0;i<8;i++)
                {
                    if($("#value"+i).val())
                        numberarray.push($("#value"+i).val());
                }
                submitresult = JSON.stringify(numberarray);
                // console.log("here" , submitresult);
                $.ajax({
                    type:"POST",
                    url:"/information",
                    data:{
                        numberarray:numberarray
                    },
                    error: function(err) {
                        // console.log(err);
                        // alert("error",err);
                        swal(
                            'Error',
                            'Please check phone number or connection and try again.',
                            'error'
                        );
                    },
                    success: function(response) {
                        swal(
                            'OK!',
                            'Sent message Successfully.',
                            'success'
                        );
                    }
                })
            }
        });
    });
</script>
@endsection