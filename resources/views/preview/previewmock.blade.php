@extends('layouts.app')

@section('content')
<div class="container">

				

<div class="row">
 <div class="col-sm-6 mt-5" >
   <div class="card">
     <div class="card-body">
       <h5 class="card-title">ไฟล์</h5>
       
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="customFileLang" lang="es" >
         <label class="custom-file-label" for="customFileLang" data-browse="อัพโหลดไฟล์" >quative.png</label>
       </div>

     </div>
   </div>
 </div>

 <div class="col-sm-6 mt-5">
   <div class="card">
     <div class="card-body">
       <h5 class="card-title">แนวการออกแบบ</h5>
       
       <select class="custom-select" id="mockup"> 
           <option value="box">บรรจุภัณฑ์ประเภท กล่อง</option>
           <option value="cup">บรรจุภัณฑ์ประเภท แก้ว</option>
           <option value="bottle">บรรจุภัณฑ์ประเภท ขวด</option>
           <option value="bag">บรรจุภัณฑ์ประเภท ถุง</option>
           <option value="can">บรรจุภัณฑ์ประเภท กระป๋อง</option>
       </select>

     </div>
   </div>
 </div>
</div>





</div>
<!-- END CONTAINER -->

<div id="related_box_content" >

<section class="mt-5" style="background-color: #B6E5F4; height: 600px;" >       
      <div class="container_fluid">			       					            
           <center>
           <img src="https://uppic.cc/d/58DQ"  border="0" style="width: 800px; margin-top: 10px;">
           </center>    
         </div>   	   
</section>

<section class="" style="background-color: #C4CCF5; height: 600px;" >       
      <div class="container_fluid">   
              <center>
           <img src="https://uppic.cc/d/58DR" border="0" style="width: 550px; margin-top: 100px;" >
           </center>  			             
         </div>   	   
</section>
   
</div>

<div id="related_cup_content">

       <section class="mt-5" style="background-color: #B6E5F4; height: 600px;" >       
          <div class="container_fluid">			       		
               <center>
               <img src="https://www.img.in.th/images/d76ef713b3979138797a79a4d0ff647e.png" alt="d76ef713b3979138797a79a4d0ff647e.png" border="0" style="width: 350px; margin-top: 100px;" >
               </center>     
             </div>   	   
   </section>

   <section class="" style="background-color: #C4CCF5; height: 600px;" >       
          <div class="container_fluid">     
                <center>
               <img src="https://www.img.in.th/images/d3e9b7b92979a53b9ada6ce2c6c2fba7.png" alt="d3e9b7b92979a53b9ada6ce2c6c2fba7.png" border="0" style="width: 300px; margin-top: 100px;">
               </center>
             </div>   	   
   </section>

</div>

<div id="related_bottle_content">

   <section class="mt-5" style="background-color: #B6E5F4; height: 600px;" >       
          <div class="container_fluid">			       		
               <center>
               <img src="" border="0" style="width: 350px; margin-top: 100px;" >
               </center>     
             </div>   	   
   </section>

   <section class="" style="background-color: #C4CCF5; height: 600px;" >       
          <div class="container_fluid">     
                <center>
               <img src="" border="0" style="width: 300px; margin-top: 100px;">
               </center>
             </div>   	   
   </section>
   
</div>

<div id="related_bag_content">

   <section class="mt-5" style="background-color: #B6E5F4; height: 600px;" >       
          <div class="container_fluid">			       		
               <center>
               <img src="" border="0" style="width: 350px; margin-top: 100px;" >
               </center>     
             </div>   	   
   </section>

   <section class="" style="background-color: #C4CCF5; height: 600px;" >       
          <div class="container_fluid">     
                <center>
               <img src="" border="0" style="width: 300px; margin-top: 100px;">
               </center>
             </div>   	   
   </section>
</div>

<div id="related_can_content">

   <section class="mt-5" style="background-color: #B6E5F4; height: 600px;" >       
          <div class="container_fluid">			       		
               <center>
               <img src="" border="0" style="width: 350px; margin-top: 100px;" >
               </center>     
             </div>   	   
   </section>

   <section class="" style="background-color: #C4CCF5; height: 600px;" >       
          <div class="container_fluid">     
                <center>
               <img src="" border="0" style="width: 300px; margin-top: 100px;">
               </center>
             </div>   	   
   </section>
   
</div>






@endsection

@section('myjsfile')
<script>
				  $('[id^="related"]').not(':first').hide();

		$("#mockup").on('change', function() {
		    $("#related_"+this.value+"_content").show().siblings('[id^="related"]').hide();
		});


</script>

 

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


@stop

    	

