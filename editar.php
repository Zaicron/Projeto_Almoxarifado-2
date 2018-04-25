<?php
// including the database connection file
include_once("conexao.php");

if(isset($_POST['Atualizar']))
{	

	$codigo = mysqli_real_escape_string($conexao, $_POST['codigo']);
	
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	$quantidade = mysqli_real_escape_string($conexao, $_POST['quantidade']);
		
	// checking empty fields
	if(empty($nome) || empty($quantidade)) {	
			
		if(empty($nome)) {
			echo "<font color='red'>Nome esta vazio.</font><br/>";
		}
		
		if(empty($quantidade)) {
			echo "<font color='red'>Quantidade esta vazio.</font><br/>";
		}		
	} else {	
		//updating the table
		$resultado = mysqli_query($conexao, "UPDATE produtos SET nome='$nome',quantidade='$quantidade' WHERE codigo=$codigo");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: relatorio.php");
	}
}
?>
<?php
//getting id from url
$codigo = $_GET['codigo'];

//selecting data associated with this particular id
$resultado = mysqli_query($conexao, "SELECT * FROM produtos WHERE codigo=$codigo");

while($resposta = mysqli_fetch_array($resultado))
{
	$nome = $resposta['nome'];
	$quantidade = $resposta['quantidade'];
}
?>
<html>
<head>	
	<title>Editar</title>
</head>

<body>
	<a href="relatorio.php">Relatorio</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Nome</td>
				<td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
			</tr>
			<tr> 
				<td>quantidade</td>
				<td><input type="text" name="quantidade" value="<?php echo $quantidade;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="codigo" value=<?php echo $_GET['codigo'];?>></td>
				<td><input type="submit" name="Atualizar" value="Atualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>