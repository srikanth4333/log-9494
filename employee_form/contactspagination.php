
<?php
 session_start();
 require('connection.php');
       $id=$_SESSION['usr_id']; 
       //echo $id;
       
                $per_page_record=3;
                $order="desc";
                if(isset($_GET['page_no'])){
                    $page=$_GET['page_no'];
                }
                else
                {
                    $page=1;
                }

            $start_from=($page-1)*$per_page_record;
            $sql="";
            $sql.="SELECT * FROM contacts where user_id=$id ";
                
                if(isset($_REQUEST['search'])){
                $str_search=$_REQUEST['search'];
                //echo $str_search;
                    $sql.="AND name LIKE '%$str_search%'";
                }

                 $result2 = mysqli_query($conn,$sql);
                $result_num_rows2=mysqli_num_rows($result2);
                
                if(isset($_POST['order']))
                {
                 $order=$_POST['order'];
                    if($order=='desc')
                    {
                        $order='asc';
                    }
                    else
                    {
                        $order='desc';
                    }
                     
                     $sql.="ORDER BY ".$_POST["column_name"]." ".$_POST['order']."";
                     //echo $sql;
                }

                 if(isset($_REQUEST['from_date']))
                {
                    $from_date=$_REQUEST["from_date"];
                     $to_date=$_REQUEST['to_date'];
                    $sql.=" AND created_at BETWEEN '".$from_date."' AND '".$to_date."'";
                }
               
            $sql.=" LIMIT $start_from,$per_page_record";
            echo $sql;
            $result=mysqli_query($conn,$sql);
      
            $count=($start_from+1);
            $output="";
        if(mysqli_num_rows($result)>0){
            $output.='';
            $output.=' <table  margin="200px" width="100%" border="2">
            <thead>
                   <tr>
                   
                   <th><a class="column_sort" id="name" data-order="'.$order.'" href="#">name</th>
                   <th><a class="column_sort" id="email" data-order="'.$order.'" href="#">email</th>
                   <th><a class="column_sort" id="gender" data-order="'.$order.'" href="#">gender</th>
                   <th><a class="column_sort" id="languages" data-order="'.$order.'" href="#">languages</th>
                   <th><a class="column_sort" id="number" data-order="'.$order.'" href="#">number</th>
                   <th><a class="column_sort" id="image" data-order="'.$order.'" href="#">image</th>
                   <th><a class="column_sort" id="country" data-order="'.$order.'" href="#">country</th>
                   <th><a class="column_sort" id="state" data-order="'.$order.'" href="#">state</th>
                   <th><a class="column_sort" id="city" data-order="'.$order.'" href="#">city</th>
                   <th><a class="column_sort" id="description" data-order="'.$order.'" href="#">description</th>
                   <th><a class="column_sort" id="created_at" data-order="'.$order.'" href="#">created_at</th>
                   <th><a class="column_sort" id="modified_at" data-order="'.$order.'" href="#">modified_at</th>
                   <th colspan="2">Action</th>
                    </tr>
            </thead>';
            while($row = mysqli_fetch_assoc($result)) { 
               $output.=' <tbody><tr>
                       <td>'. $row["name"].'</td>
                        <td>'. $row["email"].'</td>
                        <td>'. $row["gender"].'</td>
                        <td>'. $row["languages"].'</td>
                        <td>'. $row["number"].'</td>
                        <td><img src='. $row["image"] .' height="20px" width="20px"></td>
                        <td>'. $row["country"].'</td>
                        <td>'. $row["state"].'</td>
                        <td>'. $row["city"].'</td>
                        <td>'. $row["description"].'</td>
                        <td>'. $row["created_at"].'</td>
                         <td>'. $row["modified_at"].'</td>
                         <td>
                             <div class="btn-group">
                            <button class="btn btn-primary" style="background-color:black"value="edit"><a href="update.php?editid='. $row['id'].'"><i class="fas fa-pencil-alt"></i></a> </button>
                            <button class="btn btn-primary"style="background-color:black" value="delete" onclick="return confirmdelete()"><a href="delete.php?delid='. $row['id'].'"><i class="far fa-trash-alt"></i></a></button>
                      </div>
                   </td>
               
               </tr></tbody>';
            $count++;
        } 
        $output.= '</table><br><div class="output" align="center">';
        
        //echo $result_num_rows2;
            $per_page_record=3;
            $result_num_pages=ceil($result_num_rows2/$per_page_record);
            if($page>1)
            {
                $before=$page-1;
                $output.="<button class='pagination' id='".$before."'><i class='fas fa-arrow-alt-circle-left'></i></button>";
            }
            for($i=1; $i<=$result_num_pages; $i++)
            {
                 $output.= "<button class='pagination'  id='".$i."'>".$i."</button>";
            }
            if($page<$result_num_pages)
            {
                $after=$page+1;
                $output.="<button class='pagination'  id='".$after."'><i class='fas fa-arrow-circle-right'></i></button>";
            }

          
        echo $output;
    }
    else
    {
        echo "no data available";
    }
    
?>
