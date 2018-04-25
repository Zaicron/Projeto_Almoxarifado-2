 < html > 
 < head > 
     < title > Adicionando < / title > 
 < / head > 
 
 < body > 
 <?php 
 //including the database connection file 
 include_once("conexao.php"); 
 
 if (isset($_POST['submit'])){     
     $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
     $quantidade = mysqli_real_escape_string($conexao, $_POST['quantidade']);
             
     // checking empty fields
     if(empty($nome) || empty($quantidade)){                 
         if (empty($nome)){ 
             echo   "<font color='red'>Nome não preenchido.</font><br/>" ; 
         } 
        
         if ( empty ( $quantidade ) )   { 
             echo   "<font color='red'>Quantidade não preenchido.</font><br/>" ; 
         } 
        
         //link to the previous page 
         echo   "<br/><a href='javascript:self.history.back();'>Voltar</a>" ; 
     }   else   {  
         // if all the fields are filled (not empty)              
         //insert data to database 
         $resultado = mysqli_query ($conexao, "INSERT INTO produtos (nome, quantidade) VALUES('$nome','$quantidade')"); 
        
         //display success message 
         echo   "<font color='green'>Cadastrado com sucesso." ; 
         echo   "<br/><a href='relatorio.php'>Visualizar</a>" ; 
     } 
 } 
 ?> 
 < / body > 
 < / html > 