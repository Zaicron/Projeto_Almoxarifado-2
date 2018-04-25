<?php
//including the database connection file
include_once("conexao.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$resultado = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY nome"); // using mysqli_query instead
?>

<html>
    <head>
        <title>Almoxarifado - Relatórios</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/reset.css">
        <link rel="stylesheet" type="text/css" href="CSS/inicio.css">
        <link rel="stylesheet" href="CSS/alterar-usuario.css">
    </head>
    
    <body>
        <h1 class="titulo-principal">Almoxarifado</h1>
        
        <aside class="navegacao-solicitacao">
            <h1 class="titulo-navegacao">Solicitação</h1>
            <nav> 
                <ul>
                    <li><a href="cadastra-requisicao.php"><div class="link">Cadastrar requisição de produto</div></a></li>
                    <li><a href="cadastra-compra.php"><div class="link">Cadastrar requisição de compra</div></a></li>
                    <li><a href="altera-requisicao.php"><div class="link">Alterar requisição de produto</div></a></li>
                    <li><a href="altera-compra.php"><div class="link">Alterar requisição de compra</div></a></li>
                    <li><a href="baixa-produto.php"><div class="link">Baixar requisição de produro</div></a></li>
                    <li><a href="baixa-compra.php"><div class="link">Baixar requisição de compra</div></a></li>
                    <li><a href="inventario.php"><div class="link">Inventario para contagem</div></a></li>
                    <li><div class="link">Informações do Usuario logado</div></li>
                </ul>
            </nav>
        </aside>
        
        <div class="corpo-principal">
                      
                 <table width='80%' border=0>

                <tr bgcolor='#CCCCCC'>
                    <td>Nome</td>
                    <td>Quantidade</td>
                    <td>Atualizar</td>
                </tr>
                     
                <?php 
                     
                while($resposta = mysqli_fetch_array($resultado)) { 		
                    echo "<tr>";
                    echo "<td>".$resposta['nome']."</td>";
                    echo "<td>".$resposta['quantidade']."</td>";
                    
                    echo "<td><a href=\"editar.php?codigo=$resposta[codigo]\">Editar</a> | <a href=\"deletar.php?codigo=$resposta[codigo]\" onClick=\"return confirm('Você tem certeza que deseja deletar?')\">Deletar</a></td>";		
                }
                     
                ?>
                     
                </table>
            
        </div>
        
        <aside class="navegacao-lancamento">
            <h1 class="titulo-navegacao">Lançamento</h1>
            <nav> 
                <ul>
                    <li><a href="cadastra-nf.php"><div class="link">Cadastrar nota fiscal</div></a></li>
                    <li><a href="altera-nf.php"><div class="link">Alterar nota fiscal</div></a></li>
                    <li><a href="cadastra-fornecedor.php"><div class="link">Cadastrar fornecedor</div></a></li>
                    <li><a href="altera-fornecedor.php"><div class="link">Alterar cadastro de fornecedor</div></a></li>
                    <li><a href="cadastra-produto.php"><div class="link">Cadastrar produto</div></a></li>
                    <li><a href="altera-produto.php"><div class="link">Alterar cadastro de produto</div></a></li>
                    <li><a href="cadastra-usuario.php"><div class="link">Cadastrar novo usuario</div></a></li>
                    <li><a href="alterar-usuario.php"><div class="link">Alterar cadastro de usuario</div></a></li>
                    <li><a href="relatorio.php"><div class="link">Relatórios</div></a></li>
                </ul>
            </nav>
        </aside>
        
        <footer class="rodape-pagina">
            &copy; Fortes Company
        </footer>
    </body>
</html>