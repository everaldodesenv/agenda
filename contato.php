<?php

if(isset($_GET["txtnome"])){
    $nome=$_GET["txtnome"];

    $server="localhost";
    $port='3306';
    $user="root";
    $senha="123456";
    $base="agenda";

    $conexao=mysqli_connect($server,$port,$user,$senha,$base);
    /*mysql_select_db($base);*/

    if(empty($nome)){
        $sql ="SELECT * FROM contato";
    }else{
          $nome ="%";
          $sql ="SELECT * FROM contato WHERE NOME like '$nome'";
    }
    sleep(1);
    $result = mysqli_query($sql);
    $cont mysqli_num_rows($conexao);

    if($cont > 0){
        $tabela="<table border='1'>
        <thead>
         <tr>
          <th>NOME</th>
          <th>TELEFONE</th>
          <th>CELULAR</th>
          <th>EMAIL</th>
         </tr>
        </thead>
        <tbody>
        <tr>";
        
        $return= "$tabela";

        while ($linha = mysqli_fetch_array($result)){

            $result.="<td>" . utf8_encode($linha["NOME"]). "</td>";
            $result.="<td>" . utf8_encode($linha["FONE"]). "</td>";
            $result.="<td>" . utf8_encode($linha["CELULAR"]). "</td>";
            $result.="<td>" . utf8_encode($linha["EMAIL"]). "</td>";
            $return.="</tr>";
        }
           echo $return.="</tbody></table>";
        }else {
            echo "Não foram encontrados registros!";
        } 
    }
    ?>
    