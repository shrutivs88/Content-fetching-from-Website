<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.min.css" />
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
        
       // str.length = Math.pow(2,20)-1; //set array length less than 2 to the 32nd power 
        //res.length = Math.pow(2,20)-1; 
       // console.log(str.length);

       // var str = "";
        function getMerchants(){
          // $a = $(".tile-name").text();
         //  alert($a);
        $('.tile-content div.tile-name').each(function(){
         str += $(this).text() + ",";
          
           
            
        });
         res = str.split(",");
       // alert(res[2968]);
      //  alert(str);
       
        //alert(res[0]);
          //  alert(res[1]);
        $.ajax({
            url:"m2.php",
            type:"post",
            data:{
                result:res
            },
            success:function(response){
               //console.log(response);
            }


        });

        }
        
        </script>
    
    </body>
</html>