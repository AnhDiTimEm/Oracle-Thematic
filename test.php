<?php
    $conn = oci_connect("hr","hr","localhost/orcl");
    if(!$conn){
        echo("connect fail");
    }
    else{
        echo("connect success");
    }
?>
<html>
    <head>
    
    </head>
    <body>
        <?php
        function pick(){
            $res = oci_parse($conn,"insert into Userr(phone,password) values('1234','123')");
            oci_execute($res);
        }
        ?>
        <button onclick="location.href='./?test' ">cec
        </button>
        <ul>
        </ul>
    </body>
</html>