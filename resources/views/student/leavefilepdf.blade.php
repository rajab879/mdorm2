<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    
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
          
            span{
            font-family:  'tajawal' , sans-serif!important;
            direction:rtl;
            }
            
            table {
            border-collapse: collapse;
            width:100%;
          
            
            }
            table, th, td {
            border: 0px solid black;
            text-align: right;
            padding: 5px;
            }

            table{
              
                font-family: 'XBRiyaz', sans-serif;
                direction:rtl;
            }
          

           
            div{
                margin: 0 auto;  
            }
            .makeborder   tr td
            {
                border: 2px solid;
            }

           
        </style>
   
 
    </head>
    <body>
     
    <div style="text-align: center;">  
 
    <table border="0" style="font-family: 'KFGQPC Uthman Taha Naskh'">      
       <tr  >         
       <td style="text-align: right;width: 12%">جامعة الشارقة<br>عمادة شؤون الطلاب<br>قسم السكن الجامعي
            <br></td>  

        <td style="width: 12%"> 
                 
                    <table  ><tr>
                    <td style="text-align: center;background-color: black;color: white;">  مستند اخلاء غرفة - نسخة الطالب</td></tr>
                    <tr><td style="text-align: center;"> الفصل الدراسي الاول 2018- 2019</td></tr>
                    </table>
         </td>    

         <td style="width: 12%;text-align: left">            
        
         <?php $image_path = '/images/uoslogo.jpg'; ?>
                <img src="{{ public_path() . $image_path }}" style="width:100px;height: 100px;" >
         </td> 
       
        </tr>   
        
     
    </table>


        {{--@foreach($tblstudents as $std)--}}


        {{--@endforeach--}}
<?php //$std= $tblstudents[0]; ?>
        <?php //$std= $tblstudents[0]; ?>

        <?php //$std= $tblstudents[0]; ?>
    <table  >      
       <tr  >

            <td style="width: 12%"> تم بتاريخ   </td>  

            <td style="width: 12%;font-weight: bold"><?php echo (new \DateTime())->format('Y-m-d'); ?> </td>

            <td style="width: 12%">  تسلم الغرفة</td> 
            <td style="text-align: right;width: 12%;font-weight: bold">  {{$std->roomno}}  </td>

            <td style="width: 12%">نوعها </td>

            <td style="width: 12%;font-weight: bold">   {{$std->tblroomtypes->roomtype}} </td>
            <td style="width: 12%">مبنى </td>    

            <td style="width: 12%;font-weight: bold"> {{$std->tblbuilds->build}} </td>
       
        </tr>   
        <tr  >         
            <td   style="width: 12%">    من الطالب   </td>  

            <td colspan=4  style="width: 12%;font-weight: bold"> {{$std->fname}}   </td>

            
            <td colspan=1  style="width: 14%">رقمه الجامعي </td>

            <td colspan=2  style="width: 10%;font-weight: bold">  {{$std->stdid}}</td>
       
        </tr>   
        <tr>
        <td colspan=8 style="text-align:center;background:black;color:white ">
        إدارة السكن الجامعي لا تتحمل أدنى مسؤولية عن أغراض الطالب التي يتم إيداعها في المخزن
        </td>
       </tr>
       <tr  >         
            <td   style="width: 12%">   اسم المشرف   </td>  

            <td colspan=4  style="width: 12%;font-weight: bold">رجب عوض شعبان</td>

            
            <td colspan=1  style="width: 12%">   توقيعه </td>    

            <td colspan=2  style="width: 12%">   </td> 
       
        </tr>   

         <tr>
        <td colspan=8 style="text-align:center;text-decoration:underline;font-weight:bold ">
        ملاحظة هامة:يجب على الطالب الاحتفاظ بهذا المستند وإبرازه عند الضرورة
        </td>
       </tr>
       <tr>
        <td colspan=8 style="text-align:center;font-weight:bold ">
       ................................................................................................................................................
        </td>
       </tr>
       <tr>
        <td colspan=8 style="text-align:center;font-weight:bold ">
        يرجى قطع الجزء العلوي ويسلم للطالب بعد إخلاء الغرفة
        </td>
       </tr>

    </table> 

   <table  >      
       <tr  >         
       <td  style="text-align:center;text-decoration:underline;font-weight:bold ">   نموذج إخلاء غرفة- نسخة إدارة السكن الجامعي   </td>  
    
        </tr>
        <tr  >         
        <td  style="text-align:center;text-decoration:underline;font-weight:bold ">  (يتم إخلاء الغرفة بوجود الطالب أو الطلاب المقيمين فيها)     </td>  
    
        </tr>
    </table>



    <table class=makeborder >      
       <tr  >         
            <td style="width: 5%">  ت  </td>  

            <td style="width: 23%">البنود </td>    

            <td style="width: 10%">   جيد </td> 
            <td style="width: 10%">   متضرر </td>  

            <td style="width: 4%;border:none">  </td>    

            <td style="width: 5%">   ت   </td>  
            <td style="width: 23%">البنود </td>    

            <td style="width: 10%">  جيد </td> 
            <td style="width: 10%"> متضرر </td>  
        </tr>
        <tr  >         
            <td style="width: 5%">  01 </td>  

            <td style="width: 23%">سرير خشبي مع مرتبة </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

          <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   10  </td>  
            <td style="width: 23%"> ثلاجة كهربائية </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  
         

         <tr  >         
            <td style="width: 5%">  02</td>  

            <td style="width: 23%">   مرتبة السرير </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

             <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   11 </td>  
            <td style="width: 23%">  سخان كهربائي   </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  
        

         <tr  >         
            <td style="width: 5%">  03</td>  

            <td style="width: 23%">سرير خشبي مع خزانة جنب السرير </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

             <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   12 </td>  
            <td style="width: 23%">  ستارة النافذة / عصا الستارة    </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  

        <tr  >         
            <td style="width: 5%">  04</td>  

            <td style="width: 23%">  خزانة مع مفتاح / بدون   </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

            <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   13 </td>  
            <td style="width: 23%"> سجادة  </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  

        <tr  >         
            <td style="width: 5%">  05</td>  

            <td style="width: 23%"> مكتب خشبي       </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

            <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   14 </td>  
            <td style="width: 23%">  زجاج النافذة   </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  

         <tr  >         
            <td style="width: 5%">  06</td>  

            <td style="width: 23%">     كرسي خشبي / بعجلت   </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

            <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   15 </td>  
            <td style="width: 23%">  شبك النافذة   </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  

         <tr  >         
            <td style="width: 5%">  07</td>  

            <td style="width: 23%">     طاولة شاي   </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

            <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   16 </td>  
            <td style="width: 23%">  حالة الجدران   </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  

         <tr  >         
            <td style="width: 5%">  08</td>  

            <td style="width: 23%"> جهاز الهاتف       </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

            <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   17 </td>  
            <td style="width: 23%">  حالة الابواب   </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  

         <tr  >         
            <td style="width: 5%">  09</td>  

            <td style="width: 23%">     متحكم مكيف    </td>    

            <td style="width: 10%">     </td> 
            <td style="width: 10%">     </td>  

            <td style="width: 4%;border:none">  </td>   

            <td style="width: 5%">   18 </td>  
            <td style="width: 23%">  مفتاح الغرفة داخلي / خارجي   </td>    

            <td style="width: 10%">    </td> 
            <td style="width: 10%">   </td> 
        </tr>  

      
        
     </table>   

            <table class=makeborder>
            <tr>
                <td colspan=4 style="width: 100%;border:none">  يرجى إدارج النواقص والاضرار من واقع حال الغرفة لتتم مقارنتها مع استمارة التسكين الاصلية للطالب </td>  
             </tr>   
            <tr>
                <td style="width:  5%">  01</td>  

                <td style="width: 43%"> ................................................ </td>    
                
                <td style="width:  5%">  04</td>  
                <td style="width: 47%">  ................................................  </td>  
            </tr>

              <tr>
                <td style="width:  5%">  02</td>  

                <td style="width: 43%"> ................................................ </td>    
                
                <td style="width:  5%">  05</td>  
                <td style="width: 47%">  ................................................  </td>  
            </tr>
            <tr>
                <td style="width:  5%">  03</td>  

                <td style="width: 43%"> ................................................ </td>    
                
                <td style="width:  5%">  06</td>  
                <td style="width: 47%">  ................................................  </td>  
            </tr>


            
            </table>




            <table>
                <tr>
                    <td colspan=4 style="width: 100%">   لا يسمح بإبقاء أي أغراض أو أمتعة في الغرفة بعد إخلاءها وإدارة السكن الجامعي غير مسؤولة عن أي أغراض متروكة.    </td>  
                </tr>   
                <tr>
                    <td style="width:  30%"> اسم المشرف الذي تسلم الغرفة : </td>  
  
                    <td  style="text-align:right;  width: 35%;font-weight: bold">  رجب عوض شعبان </td>
                    
                    <td style="width:  20%">  توقيعه :  </td>  
                    <td style="width: 15%">     </td>  
                </tr>

                 <tr>
                    <td style="width:  30%"> اسم الطالب : </td>  
  
                    <td style="width: 35%;font-weight: bold">    {{$std->fname}}    </td>
                    
                    <td style="width:  20%">  رقمه الجامعي :  </td>  
                    <td style="width: 15%;font-weight: bold">   {{$std->stdid}}   </td>
                </tr>

                <tr>
                    <td colspan=2  style="width:  65%;font-size:9pt"> إدارة السكن الجامعي لا  تتحمل أدنى مسؤولية عن أغراض الطالب التي يتم إيداعها في المخزن </td>  
  
 
                    
                    <td colspan=2 style="width:  35%"> توقيع الطالب :  </td>  
                    
                </tr>
            </table>



        <table  >      
            <tr  >         
            <td style="width: 12%"> الغرفة : </td>  

            <td style="width: 12%;font-weight: bold">{{$std->roomno}}   </td>

            <td style="width: 12%">  نوعها : </td> 
            <td style="width: 12%;font-weight: bold">  {{$std->tblroomtypes->roomtype}}   </td>

            <td style="width: 8%">المبنى : </td>

            <td style="width: 7%;font-weight: bold">  {{$std->tblbuilds->build}}   </td>
            <td style="width: 18%;text-align: right">التاريخ : </td>

            <td style="width: 15%;font-weight: bold">  <?php echo '&nbsp;'. (new \DateTime())->format('Y-m-d') ; ?> </td>
       
            </tr>   
        </table>


        </div>
    </body>
</html>






