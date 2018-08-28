@extends('layouts.app')

@section('content')


    <div class="container">
        <?php
        $put=array('test'=>'submit','title'=>'بحث ص');
        ?>
        @include('layouts.searchinput',$put)





        {{ $tblstudents->links() }}
        <table id="stdtable" border="1" style="border-collapse:collapse" class="table">
            <thead>
            <tr style='background-color:Highlight;'>
                <th style="text-align:center"> ت</th>

                <th style="text-align:center"> ر الجامعي</th>
                <th style="text-align:center"> الاسم</th>
                <th style="text-align:center"> المبنى</th>
                <th style="text-align:center"> الهاتف</th>
                <th style="text-align:center"> الكلية</th>
                <th style="text-align:center"> ن الغرفة</th>
                <th style="text-align:center"> رقم الغرفة</th>
                <th style="text-align:center"> الجنسية</th>
                <th style="text-align:center"> المنطقة</th>
                <th style="text-align:center">  المانح</th>
                <th style="text-align:center"> التحويلة</th>
            </tr>

            </thead>

            <tbody style="text-align:center">

            @foreach($countarr as $cnt)

                <h4>عدد السجلات {{$cnt}}</h4>
            @endforeach
            <?php
            $page=app('request')->input('page');
            if($page==null)
            $i=1;
                    else
                        $i=($page-1)*50+1;
            ?>
            @foreach($tblstudents as $std)


            <tr>
            <td style="text-align:center"> {{$i}}</td>

            <td style="text-align:center">{{$std->stdid}}</td>
            <td style="text-align:center"> {{$std->fname}}</td>
            <td style="text-align:center"> {{$std->tblbuilds->build}}</td>
            <td style="text-align:center"> {{$std->mobile}}</td>
            <td style="text-align:center"> {{$std->tblcolleges->collegename}}</td>
            <td style="text-align:center">{{$std->tblroomtypes->roomtype}}</td>
            <td style="text-align:center"> {{$std->roomno}}</td>
            <td style="text-align:center"> {{$std->tblnationalitys->nationalityname}}</td>
            <td style="text-align:center"> {{$std->country}}</td>
            <td style="text-align:center"> {{$std->donor}}</td>
            <td style="text-align:center"> {{$std->extension}}</td>
            </tr>
            <?php
            $i++;
            ?>

            @endforeach
            </tbody>

        </table>



        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">



                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <div class="row" style="text-align:center">

                            <h1><span id="stdname"> </span></h1>

                        </div>
                    </div>

                    <div class="modal-body">


                        <img class="img-responsive img-rounded" id="imgstd" />

                    </div>

                </div>

            </div>
        </div>




 </div>



@endsection

@section('scriptcontent')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#chk').change(function () {


                $("#semlist").prop("disabled", !this.checked);
            });

        });

        function Reset(btnreset){


            var items = $("#semlist option").length;
            $("#semlist")[0].selectedIndex=items-1;
            $( "#semlist" ).prop( "disabled", true );
            $( "#chk").prop( "checked", false );

        }

    </script>
@endsection