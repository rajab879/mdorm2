@extends('layouts.app')

@section('content')
    <div class="container">


<div id="diverror" class="alert alert-danger hidden">

    <ul id="uerror">

    </ul>
</div>



        <form id="myform" action="/EditStudentJson/"{{$std['std']->stdid}}    method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <img id="spinner"   style="width:20px;height:20px;display: none" src="/Images/FhHRx.gif" />
            <input type="hidden" id="id" name="id" value="{{  $std["std"]->id  }}"  />


            <fieldset class="well the-fieldset">
                <legend class="the-legend">
                  تعديل طالب
                </legend>
                <div class="row">
                    <div class="col-sm-2">
                        <label for="stdid">  رقم الطالب  </label>
                    </div>


                    <div class="col-sm-6 ">
                        <input type="text" class="form-control" placeholder="الرقم الجامعي" maxlength="9" id="stdid" name="stdid" value="{{  $std["std"]->stdid  }}"  />


                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="stdid" data-valmsg-replace="true"></span>
                    </div>
                </div>




                <div class="row">
                    <div class="col-sm-2">
                        <label for="fname">  اسم الطالب  </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="اسم الطالب " maxlength="50" id="fname" name="fname" value="{{  $std["std"]->fname  }}"  />


                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="fname" data-valmsg-replace="true"></span>
                    </div>
                </div>




                <div class="row">
                    <div class="col-sm-2">
                        <label for="mobile">  الهاتف     </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="الهاتف" maxlength="15" id="mobile" name="mobile" value="{{  $std["std"]->mobile  }}"  />


                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="mobile" data-valmsg-replace="true"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-2">
                        <label for="donor">    المانح  </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="المانح" maxlength="50" id="donor" name="donor" value="{{  $std["std"]->donor  }}"  />


                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="donor" data-valmsg-replace="true"></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label for="country">   المنطقة    </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="المنطقة" maxlength="50" id="country" name="country" value="{{  $std["std"]->country  }}"  />


                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="country" data-valmsg-replace="true"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-2">
                        <label for="stdid">   التحويلة    </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="التحويلة" maxlength="4" id="extension" name="extension" value="{{  $std["std"]->extension  }}"  />


                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="extension" data-valmsg-replace="true"></span>
                    </div>
                </div>




                <div class="row">
                    <div class="col-sm-2">
                        <label for="stdid">  الغرفة    </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="الغرفة" maxlength="3" id="roomno" name="roomno" value="{{  $std["std"]->roomno  }}"  />


                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="roomno" data-valmsg-replace="true"></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label for="roomtypelist">  نوع الغرفة    </label>
                    </div>
                    <div class="col-sm-6">

                        <select id="roomtypelist" name="roomtypelist" class="form-control">
                            <option  value=''>نوع الغرفة</option>
                            @foreach($tblroomtypes as $roomtype)

                                <option    <?php if( $std["std"]->roomtypeid==$roomtype->id) echo 'selected' ?> value={{$roomtype->id}} >{{$roomtype->roomtype}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="roomtypelist" data-valmsg-replace="true"></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label for="buildidlist">     المبنى    </label>
                    </div>
                    <div class="col-sm-6">
                        <select id="buildidlist" name="buildidlist"   class="form-control">
                            <option  value=''>المبنى</option>
                            @foreach($tblbuilds as $building)
                                <option <?php if($std["std"]->buildid==$building->id) echo 'selected' ?> value={{$building->id}}>{{$building->build}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="buildidlist" data-valmsg-replace="true"></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-2">
                        <label for="nationalityidlist">     الجنيسية    </label>
                    </div>
                    <div class="col-sm-6">
                        <select ID="nationalityidlist" name="nationalityidlist" class="form-control">
                            <option   value=''>الجنسية</option>
                            @foreach($tblnationalitys as $nation)
                                <option  <?php if($std["std"]->nationalityid ==$nation->id) echo 'selected' ?> value={{$nation->id}} >{{$nation->nationalityname}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="nationalityidlist" data-valmsg-replace="true"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        <label for="nationalityidlist">     الكلية    </label>
                    </div>
                    <div class="col-sm-6">
                        <select id="collegelist" name="collegelist"  class="form-control">
                            <option selected value=''>الكلية</option>
                            @foreach($tblcolleges as $college)
                                <option  <?php if($std["std"]->collegeid ==$college->id) echo 'selected' ?> value={{$college->id}} >{{$college->collegename}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <span class="text-danger field-validation-valid" data-valmsg-for="nationalityidlist" data-valmsg-replace="true"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-2">
                        <label for="semlist">     الفصل    </label>
                    </div>
                    <div class="col-sm-6">
                        <select ID="semlist" name="semlist"  disabled="true" Font-Bold="True" ForeColor="Red" Font-Size="8pt" class="form-control">
                            @foreach($tblsems as $tblsem)

                                <option   <?php


                                              if($std["std"]->semid ==$tblsem->id) echo 'selected'; ?>
                                          value={{$tblsem->id}} >{{$tblsem->semalias}}

                                </option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input id="chk" name="chk" type="checkbox" onclick="enablesem(this)" />
                        <span class="text-danger field-validation-valid" data-valmsg-for="" data-valmsg-replace="true"></span>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-2">
                        <label for="nationalityidlist">          </label>
                    </div>
                    <div class="col-sm-6">
                         <input type="file" name="imagefile" id="imagefile">


                    </div>
                    <div class="col-sm-4">
                         </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-6">

                        <img id="imgview" src="/imagestd/{{$std["std"]->semid}}/{{$std["std"]->stdid}}.jpg" alt="your image" width="350px" />

                    </div>
                    <div class="col-sm-4">
                        <div id="imgmessage"></div>
                        </div>
                </div>





                <div class="row">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-6">
                        <input type="submit" name="btnsend" ID="btnsend" value="تعديل" class="btn btn-info btn-ls" />


                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>





                @endsection
@section('scriptcontent')
    <script type="text/javascript">

        $(document).ready(function () {//called after load the page

            var urlrequest='/EditStudentJson';
            // $('#btnsend').click(function () {
            //     loadData();
            // });

            $("form#myform").submit(function(e) {
                e.preventDefault();

                loadData();
            });

            $('#chk').change(function() {


                $( "#semlist" ).prop( "disabled", !this.checked );
            });


                function loadData() {

                var studenttable = $('#stdtable tbody');

                    var id = $("#id").val();

                var stdid = $("input[name=stdid]").val();

                var buildidlist =  $('#buildidlist').val() ;

                var fname = $("input[name=fname]").val();
                var donor =  $('#donor').val() ;

                var country = $("#country").val();

                var roomtypelist = $('#roomtypelist').val() ;

                var collegelist =  $('#collegelist').val() ;

                var roomno = $("input[name=roomno]").val();
                var nationalityidlist = $('#nationalityidlist').val() ;

                var semlist =  $('#semlist').val() ;

                var mobile = $("input[name=mobile]").val();

                var extension = $("input[name=extension]").val();
                var formData = new FormData();
                    //formData.append("stdid", "Groucho");
                   // formData.append("semid", 123456);
                    var img = $('input[name="imagefile"]').get(0).files[0];
                    formData.append("imagefile", img );

                 //   var objArr = [];

        //             objArr.push( {stdid:stdid, buildidlist:buildidlist, fname:fname,roomtypelist:roomtypelist,collegelist:collegelist,roomno:roomno,nationalityidlist:nationalityidlist,semlist:semlist,mobile:mobile,extension:extension,country:country,donor:donor},
        // );


                   // formData.append('objArr', JSON.stringify( {stdid:stdid, buildidlist:buildidlist, fname:fname,roomtypelist:roomtypelist,collegelist:collegelist,roomno:roomno,nationalityidlist:nationalityidlist,semlist:semlist,mobile:mobile,extension:extension,country:country,donor:donor}
                   //  ));
                    formData.append('id',  id );
                    formData.append('stdid',  stdid );
                    formData.append('fname',  fname );

                    formData.append('donor',  donor );
                    formData.append('country',  country );

                    formData.append('mobile',  mobile );
                    formData.append('extension',  extension );

                    formData.append('roomno',  roomno );
                    formData.append('roomtypelist',  roomtypelist );
                    formData.append('buildidlist',  buildidlist );
                    formData.append('collegelist',  collegelist );

                    formData.append('nationalityidlist',  nationalityidlist );
                    formData.append('collegelist',  collegelist );
                    formData.append('semlist',  semlist );
                     console.log(formData);

                $.ajax({

                    //data:"{'stdid':'"+$('#stdid').val().trim()+"','_token':'{{ csrf_token() }}'" +"}",
                    url: urlrequest,
                    cache: false,
                    processData:false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    //data:{stdid:stdid, buildidlist:buildidlist, fname:fname,roomtypelist:roomtypelist,collegelist:collegelist,roomno:roomno,nationalityidlist:nationalityidlist,semlist:semlist,mobile:mobile,extension:extension,country:country,donor:donor},
                     data: formData,
                    type: "Post",

                    beforeSend: function() { $('#btnsend').prop('disabled',true);$('#spinner').show();  },
                    complete: function() {   $('#btnsend').prop('disabled',false);$('#spinner').hide(); },

                    success: function (data) {

                        alert(data.d);
                        $('#spinner').hide();
                        $('#diverror').addClass('hidden');
                        $('#uerror').html('');

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        ;$('#spinner').hide();
                        $('#diverror').addClass('hidden');//remove or add class hidden
                        $('#uerror').html('');
                        $('div').removeClass('has-error');


                        //XMLHttpRequest.status =404
                        //textStatus =error
                        //errorThrown =Not Found







                        // var errors = '';
                        // for(datos in XMLHttpRequest.responseJSON.errors){
                        //
                        //    // errors += XMLHttpRequest.responseJSON[datos] + '<br>';
                        //     console.log(datos+"*"+XMLHttpRequest.responseJSON.errors[datos] );
                        // }
                        //





                        if(XMLHttpRequest.status ==422)
                        {
                            var errors = XMLHttpRequest.responseJSON;
                            var errorsHtml = '';
                            $.each(errors.errors, function( key, value ) {


                                errorsHtml += '<li>' + value  + '</li>';
                                  //console.log( key+'*>'+value );
                                var myId = '#' + key;
                                $(myId).parent('div').addClass('has-error');
                            });

                           $('#diverror').removeClass('hidden');//remove or add class hidden
                            //$('#diverror').show();//change style display:none to block
                            $('#uerror').html(errorsHtml);

                            $('html, body').animate({scrollTop : 0},800);


                        }
                        else
                            alert( XMLHttpRequest.status+" "+errorThrown+" "+ textStatus);
                    }
                });

            }



            function Reset(btnreset){


                var items = $("#semlist option").length;
                $("#semlist")[0].selectedIndex=items-1;
                $( "#semlist" ).prop( "disabled", true );
                $( "#chk").prop( "checked", false );

            }
            function readURL(input) {
                if (input.files && input.files[0]) {
                    $("#imgmessage").html("");
                    var file = input.files[0];
                    var imagefile = file.type;
                    var match= ["image/jpeg","image/png","image/jpg"];
                    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                    {
                       // $('#imgview').attr('src','noimage.png');
                        $("#imgmessage").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                        return false;
                    }


                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imagefile").change(function(){
                readURL(this);
            });






        });//document.ready





    </script>
    <script>


    </script>
@endsection


