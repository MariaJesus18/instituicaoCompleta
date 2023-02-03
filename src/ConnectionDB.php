<?php
$nome = $_POST['nome'];
$idEnd = $_POST['idEnd'];
$status = $_POST['status'];

$conn = new PDO('mysql:host=127.0.0.1:3307;dbname=db_instituicaocompleta', 'root', 'usbw');


$stmt = $conn->prepare("INSERT INTO tb_alunos (alu_nome, alu_end_id, alu_status) VALUES ('".$nome."', '".$idEnd."', '".$status."');");
$stmt->execute();
// echo "'".$nome."', '".$idEnd."', '".$status."";

$stmt = $conn->prepare("SELECT * FROM tb_alunos");
$stmt->execute([]); 

$data = $stmt->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    // echo "<table>"; 
    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Nome</th><th>Endereço</th><th>Status</th></tr>";
   
echo "<tr><td>".$row["alu_nome"]."</td><td>".$row["alu_end_id"]." ".$row["alu_status"]."</td></tr> </table>";
}
