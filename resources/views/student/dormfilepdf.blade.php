<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Pdf Test</title>

    <style>



        html, body {
            background-color: #fff;


            font-family: 'Quivira', sans-serif;
            /* font-family: 'KFGQPC Uthman Taha Naskh', sans-serif; */
            font-weight: 100;
            height: 100vh;
            margin: 0;
            direction:rtl;
        }


        table {
            border-collapse: collapse;
            width:100%;
            margin: 5px 0px 5px 0px;


        }
        table, th, td {
            border: 0px solid black;
            text-align: right;
            padding: 4px 2px 4px 2px;

            /*font-size: 13px;*/
        }

        table{

             font-family: 'XBRiyaz', sans-serif;
             /*font-family: 'tajawal', sans-serif;*/
            direction:rtl;

        }



        div{
            margin: 0 auto;
        }


        table.makeborder    td
        {
            border: 2px solid;
        }

        /*apply to tr*/
         .setfont td{

            font-family: 'tajawal', sans-serif;
        }
         .setfontBold td{

            font-weight: bold
         }

        .whitenowrap td{

            /*fit to shrink if the font size not set ,it will automatically change font to fit in td,even if you set font size */
            /*if text is long, the font size will become very small ,becuse it will keep in the same line*/
            /*it use with width:100% */
            /* use font-size to keep font smilar if the font in the td is not so long */
            white-space:nowrap;
            font-size: 11pt;
        }
        .justifyfont{

            text-align: justify;
            text-justify: inter-word;
            width: auto;
        }




    </style>

</head>
<body>
<div style="direction: rtl;    text-align: center;">

    <table border="0"  style="font-family: 'KFGQPC Uthman Taha Naskh'"   >

        <tr  >
            <td style="width: 33%">جامعة الشارقة<br>
                عمادة شؤون الطلاب <br>
                قسم السكن الجامعي    <br>
            </td>
            <td style="text-align: center;width: 33%">
                <?php $image_path = '/images/uoslogo.jpg'; ?>
                <img src="{{ public_path() . $image_path }}" style="width:100px;height: 100px;" >

            </td>
            <td style="text-align: left;width: 33%"> الفصل الدراسي الاول
                2019-2018</td>
        </tr>

        <tr class="setfont" >
            <td>
            </td>

            <td style="text-align: center;">
                <h3> نموذج تسكين غرفة</h3>

            </td>
            <td>
            </td>
        </tr>
    </table>



    <table  class="makeborder whitenowrap"     >

        <tr >

            <Td   >اسم الطالب</Td>
            <Td  >الرقم الجامعي </Td>
            <Td  >الكلية</Td>
            <Td  >الغرفة</Td>
            <Td  >نوع الغرفة</Td>

            <Td   >  المبنى</Td>
            <Td  >الهاتف   </Td>
            <Td  >المانح</Td>
            <Td  >المنطقة</Td>
            <Td  > الجنسية</Td>
        </tr>
        <tr class="setfontBold">

            <Td    >   {{$std->fname}} </Td>
            <Td  >   {{$std->stdid}} </Td>
            <Td  >  {{$std->tblcolleges->collegename}}</Td>
            <Td  >{{$std->roomno}}</Td>
            <Td  >{{$std->tblroomtypes->roomtype}}</Td>
            <Td   >  {{$std->tblbuilds->build}}</Td>
            <Td  >{{$std->mobile}}   </Td>
            <Td  >{{$std->donor}}</Td>
            <Td  >{{$std->country}}</Td>
            <Td  >  {{$std->tblnationalitys->nationalityname}}</Td>

        </tr>
    </table>




    <table      >
        <tr class="setfont">

            <td   style="font-size: 12pt;text-align: center;font-weight: bold " >
                تعهد
            </td>
        </tr>

        <tr class="setfont "  >

            <Td style="font-size: 12pt" class="justifyfont" >


                    استلمت محتويات الغرفة المبينة أدناه بحالة سليمة وجيدة  و أتعهد بالمـحافظة عليها و إعــادة المفقود منها و إصــلاح التالف أو دفع قيمته ،وبعدم الكتابة أو إلصاق الصور والملصقات على الجدران والأبواب والخزائن والشبابيك ، كما أتعهد بإعادة مفتاح الغرفة  وتسليم محتوياتها وعدم ترك أية أمتعة شخصية فيها عند مغادرتي النهائية لها ، علما بأن إدارة   السكن الجامعي غير مسئولة عما يترك في الغرفة بعد تركها نهائيا ولن يسمح بتبديل أو تغيير أي من المحتويات بعد استلامها.

            </Td>
        </tr>
    </table>
    <table  class="makeborder"     >

        <tr  >

            <Td   > 01</Td>
            <Td  > سرير خشبي مع مرتبة   </Td>
            <Td  >06</Td>
            <Td  >   طاولة شاي</Td>

            <Td   >  11</Td>
            <Td  >سخان كهربائي   </Td>

        </tr>
        <tr style=" dir:rtl">
            <Td   > 02</Td>
            <Td  > مكتب خشبي مع كرسي   خشبي / عجلات   </Td>
            <Td  >07</Td>
            <Td  > جهاز هاتف  </Td>

            <Td   >  12</Td>
            <Td  >مفتاح الغرفة : داخلي   /  خارجي   </Td>
        </tr>
        <tr style=" dir:rtl">
            <Td   > 03</Td>
            <Td  > خزانة خشبية مع مفاتيح / بدون    </Td>
            <Td  >08</Td>
            <Td  >   متحكم المكيف</Td>

            <Td   >  13</Td>
            <Td  >الجدران وزجاج النافذة     </Td>
        </tr>


        <tr style=" dir:rtl">
            <Td   > 04</Td>
            <Td  > ثلاجة كهربائية  </Td>
            <Td  >09</Td>
            <Td  >     ستائر شباك</Td>

            <Td   >  14</Td>
            <Td  >      </Td>
        </tr>
        <tr style=" dir:rtl">
            <Td   > 05</Td>
            <Td  > شبك النافذة  </Td>
            <Td  >10</Td>
            <Td  >     خزانة جنب السرير</Td>

            <Td   >  15</Td>
            <Td  >      </Td>
        </tr>
    </table>

    <table      >
        <tr class="setfont">

            <td  style="font-weight: bold;font-size: 10pt;text-decoration: underline " >
                على مشرف السكن تسليم الطالب البنود المذكورة أعلاه بندا بندا  مع ذكر ملاحظة إزاء أي من البنود التي تحتاج لذلك
            </td>
        </tr>


    </table>
    <table  class="makeborder"    >


        <tr  >
            <Td   > 01</Td>
            <Td  >  ..................  </Td>
            <Td  >05</Td>
            <Td  >   ..................   </Td>


        </tr>
        <tr  >
            <Td   > 02</Td>
            <Td  >    ..................     </Td>
            <Td  >06</Td>
            <Td  > ..................  </Td>


        </tr>


        <tr  >
            <Td   > 03</Td>
            <Td  >   ..................   </Td>
            <Td  >07</Td>
            <Td  >    ..................    </Td>


        </tr>
        <tr  >
            <Td   > 04</Td>
            <Td  >    ..................  </Td>
            <Td  >08</Td>
            <Td  >   ..................     </Td>


        </tr>


    </table>


    <table      >
        <tr class="setfont">

            <td  style="font-size: 12pt;text-align: center;font-weight: bold " >
                إقــــــرار
            </td>
        </tr>

        <tr class="setfont" >

            <Td  style="font-size: 12pt;"   class="justifyfont">        أتعهد أنا الموقع أدناه بالالتزام بقانون الجامعة ولوائحها التنظيمية وبتعليمات عمادة شؤون الطلاب والسكن الجامعي ،ومخالفتي لها أو جهلي بها لا يعفيني من المسؤولية أو المسائلة ، كما لا أمانع من دخول مشرف السكن إلى غرفتي في أثناء غيابي عند الضرورة .

            </Td>
        </tr>
    </table>

    <table  class="makeborder"  >


        <tr style=" dir:rtl">
            <Td style="width: 30%"  > التاريخ</Td>
            <Td style="width: 30%;font-weight: bold" >    <?php echo (new \DateTime())->format('Y-m-d'); ?>  </Td>
            <Td style="width: 20%" >توقيع الطالب</Td>
            <Td style="width: 20%" >       </Td>


        </tr>
        <tr  >
            <Td   > اسم المشرف الذي سلم الغرفة</Td>
            <Td style="font-weight: bold" >       رجب عوض   </Td>
            <Td  > توقيع المشرف</Td>
            <Td  >    </Td>


        </tr>





    </table>

</div>
</body>
</html>