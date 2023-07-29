<?php
include "connect.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `cliente` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Data update successfully!");
    }else{
        echo "Failed ". mysqli_connect_error($conn);
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Cadastro de Clientes</title>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color:#000080; color:white;">
    Sistema de Cadastro de Clientes
    </nav>
    
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edite as informações do clientes</h3>
            <p class="text-muted">Clique em "Atualizar" depois das alterações</p>
        </div>

        <?php        
        $sql = "SELECT * FROM `cliente` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

                <div class="col">
                    <label class="form-label">Primeiro nome: </label>
                    <input type="text" class="form-control" name="first_name"
                    value="<?php echo $row['first_name']?>">
                </div>

                <div class="col">
                    <label class="form-label">Sobrenome: </label>
                    <input type="text" class="form-control" name="last_name"
                    value="<?php echo $row['last_name']?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email: </label>
                    <input type="email" class="form-control" name="email"
                    value="<?php echo $row['email']?>">
                </div>

                <div class="form-group mb-3">
                    <label>Gênero</label> &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                    id="male" value="male" <?php echo ($row['gender']=='male')?"cheked":"";?>>
                    <label for="male" class="form-input-label">Masculino</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender"
                    id="female" value="female" <?php echo ($row['gender']=='female')?"cheked":"";?>>
                    <label for="female" class="form-input-label">Feminino</label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Atualizar</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>

     <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>