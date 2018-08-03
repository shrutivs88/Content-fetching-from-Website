<!DOCTYPE html>
<html>
    <head>
   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
          $conn = mysqli_connect('localhost','root','','web_scrapper_db');
          $sql="select * from base_url where si_no=1";
          $res=mysqli_query($conn,$sql);
          $row=mysqli_fetch_object($res);
          $baseUrl= $row->base_url;
            $curl = curl_init();
            //$search_string = "acherryontop.com";
            $url = "$baseUrl";
            curl_setopt($curl,CURLOPT_URL,$url);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            echo $result;
           // curl_close($curl);
        ?>
        <script>
        $(document).ready(function(){
            getMerchants();
          
        });

        var str = []; 
        var res = [];
        var pathArray = [];
        var pathArray1 = [];
     
        function getMerchants(){
            
        $('.tile-content div.tile-name').each(function(){
         str += $(this).text() + ","; 
        });
         res = str.split(",");
      //   alert(res.length);

         for(var i=0; i<(res.length-1); i++)
            {
            var href = document.getElementsByClassName("tile-name")[i].parentNode.parentNode.href;
            var anchor = document.getElementsByClassName("tile-name")[i];
            do{
                anchor = anchor.parentNode;
                //alert(anchor);
                } while(anchor.nodeName.toLowerCase() != "a");
                var href1 = anchor.href;  
                //alert(href1);
                pathArray = href1.replace("http://localhost/","https://www.coupondunia.in/stores/../");
                pathArray1.push(pathArray);        
            }

            $.ajax({
                url:"m.php",
                type:"post",
                data:{
                result1:res,
                result2:pathArray1
                },
                success:function(data){
             //   console.log(response);
              //  alert(response);
                    window.location.href="http://localhost/project2url_version_1/dbfetchxls.php";
                
                } 
            });
             
          }
         
          
        
        </script>
    
    </body>
</html>