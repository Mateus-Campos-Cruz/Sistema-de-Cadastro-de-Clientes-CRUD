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

        <?php
            if(isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        ?>

        <a href="add_new.php" class="btn btn-dark mb-3">Adicionar Novo</a>
        
        <table class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Primeiro nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">Email</th>
            <th scope="col">Gênero</th>
            <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>

            <?php
                include "connect.php";

                $sql = "SELECT * FROM `cliente`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['first_name']?></td>
                    <td><?php echo $row['last_name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['gender']?></td>
                    
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark">
                            <i class="fa-solid fa-pen-to-square fs-5 me-3"></i>
                        </a>
                        <a href="delete.php?id=<?php echo $row['id']?>" class="link-dark">
                            <i class="fa-solid fa-trash fs-5"></i>
                        </a>
                    </td>
                
                </tr> 
            <?php
                }
            ?>           
        </tbody>
        </table>
    </div>

     <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>