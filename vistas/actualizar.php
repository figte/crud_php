<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <!-- agregando los asset: CSS y JS -->
    <?php require "template/asset.php";?>
</head>
<body>
    <!-- agregando el navbar del template-->
    <?php require "template/navbar.php";?>
    <h1 class="text-center"> Modificar Cliente</h1>  
    
    <form class="container mb-4" action="actualizar" method="post">
        <div>
            <label for="id">ID</label>
            <input class="form-control" type="number" name="id"  <?php echo "value='".$cliente['id']."'"; ?>  readonly>
        </div>
        <br>
        <div>
            <label for="nombre">nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Digite su nombre" <?php echo "value='".$cliente['nombre']."'"; ?> required >
        </div>
        <br>
        <div>
            <label for="direccion">Direccion</label>
            <textarea class="form-control" name="direccion"  cols="20" rows="5" required><?php echo $cliente['direccion'];?></textarea>
        </div>
        <br>
        <div>
            <label for="dui">Dui</label>
            <input class="form-control" type="number" name="dui" <?php echo "value='".$cliente['DUI']."'"; ?> required>
        </div>
        <br>
        <div>
            <label for="teleofno">Telefono</label>
            <input class="form-control" type="tel" name="telefono"<?php echo "value='".$cliente['telefono']."'"; ?> required>
        </div>
        <br>
        <div>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" <?php echo "value='".$cliente['email']."'"; ?> required>
        </div>

        <br>
        <button class="btn btn-primary" type="submit"> Modificiar</button>
        <button class="btn btn-warning" type="reset">Cancelar</button>

        <a class="btn btn-danger" href="index">regregsar</a>
        
    </form>
    <!-- agregando el footer del template -->
    <?php require "template/footer.php";?>
</body>
</html>