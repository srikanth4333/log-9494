<?php
include('header.php');
session_start();
if(!isset($_SESSION['usr_id']))
       {
            header("location:signin.php");
            exit;
       }
//print_r($_SESSION);
?>
<div class="main-container" >
        <a class="btn-danger"  href="signout.php"style="position: absolute;right:60px;
                top:25px;">Logout</a>
        <h3 style="position: absolute;right: 600px;
                top:10px; font-size: 20px;" center;"class="title">Welcome <?php echo $_SESSION['usr_name'];?></h3>
       <h3 style="text-align: center;"class="title">Employee Form</h3>
       <div class="from_date">
         <label>From date:</label>
         <input type="date" id="from_date" name="fromdate">
      </div>
         <div class="to_date">
               <label>To date:</label>
               <input type="date" id="to_date" name="todate">
               <input type="submit" name="date_search" id="date_search" value="filter">
         </div>

          <a class="btn-primary" id="emp_add" href="indexcontacts.php" style="position: absolute;left:100px;
                top:200px; font-size: 20px;">Add</a>
        
          <div class="search" style="position: absolute;right:100px;
                top:200px;">
                 <label>search_records:</label>
                <input type="text" id="search" name="search" placeholder="search records"  autofocus><br><br>    
          </div>   
        
        <div class="export"  style="position: absolute;right:20px;
                top:200px;">
             <button id="export" value="export"> <a href="exportcsv.php">Export</a></button><br>
          </div><br><br>
          <div id="pagination_data" style="position: top: 250px;"></div> 
      </div>

 </div>        
           
               
    <script>

       $(document).ready(function(){ 
        
          // load_page();

          // function load_page(page, query=''){
          
          //   $.ajax({  
          //      url:"contactspagination.php",  
          //      method:"GET",  
          //      data:{page_no:page,search:query},
          //      success:function(data){  
          //           $('#pagination_data').html(data);  
          //      }  
          //   });    
          // }
          $(document).on('click','.pagination', function(){  
         
                 var page = $(this).attr("id");
                  var txt=$("#search").val();
                 // alert("txt");
               search_data(page,txt);
           });
          function search_data(page,txt=''){

             $.ajax({  
               url:"contactspagination.php",  
               method:"GET",  
               data:{page_no:page,search:txt},
               success:function(data){  
                    $('#pagination_data').html(data);  
               }  
            });
          }
                search_data(1);
                $("#search").keyup(function(){
                    //alert("hii");
                     var txt=$(this).val();
                     search_data(1,txt);        
               });
               
               function search_bydate(from_date,to_date){
                 // alert("hii");
                  $.ajax({
                     url:"contactspagination.php",
                     method:"GET",
                     data:{from_date:from_date,to_date:to_date},
                     success:function(data){
                        $('#pagination_data').html(data);
                     }
                  });
                  
               }
               $(document).on('click','#date_search',function(){
                  var from_date=$("#from_date").val();
                  var to_date=$("#to_date").val();
                  search_bydate(from_date,to_date);
               }) 
               
                  $(document).on('click','.column_sort',function(){
                  var column_name=$(this).attr('id');
                   var order=$(this).data("order");
                   var arrow='';
                 //alert("hii");
                $.ajax({
                         url:"contactspagination.php",
                         method:"POST",
                         data:{column_name:column_name,order:order},
                         success:function(data)
                      {
                         $('#pagination_data').html(data);
                         $('#'+column_name+'').append(arrow);
                     }
                });
             })
             

       function confirmdelete(){
            return confirm('Are you sure you want to delete Employee details ?');
        }
    });

    </script>
      <?php
include('footer.php');
?>
