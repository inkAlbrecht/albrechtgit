<?php
function conectar(){
    $conn=pg_connect("host=localhost dbname=agenda_db user=seu_usuario password=sua_senha");
    if(!$conn){
        die("erro ao conectar com o banco de dados");
    }
    return $conn;
}

functon adicionar_contato($nome, $telefone, $email, $endereço){
    $conn=conectar();
    $query="INSERT INTO contatos (nome, telefone, email) VALUES ($1, $2, $3)";
    $resultt=pg_query_params($conn, $query, array($nome, $telefone, $email, $endereço));

    if(!$result){
        echo "Erro ao adicionar contato.";
    }
    pg_close($conn);
}

if($_SERVER["REQUEST METHOD"]== "POST"{
    $NOME=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $email=$_POST['emai'];
    $endereço=$_POST['endereço'];
    adicionar_contato($nome, $telefone, $email, $endereço);
}
?>

<tbody>
                    <?php
                    $conn=conectar();
                    $rsult=pg_query($conn, "SELECT * FROM contatos");

                    if($result){
                        while($row=pg_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>" htmlspacialchars($row['nome']) "</td>";
                                echo "<td>" htmlspecialchars($row['telefone']) "</td>";
                                echo "<td>" hrmlspecialchars($row['email']) "</td>";
                                echo "<td>" hrmlspecialchars($row['endereço']) "</td>";
                            echo "</tr>"
                        }
                    }
                    pg_close($conn);
                    ?>
                    </tbody>