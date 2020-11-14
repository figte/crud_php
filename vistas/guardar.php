<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar</title>
     <!-- agregando los asset: CSS y JS -->
    <?php require "template/asset.php";?>
</head>
<body>
    <!-- agregando el navbar del template-->
    <?php require "template/navbar.php";?>
    <h1 class="text-center">Nuevo Cliente</h1>  
    
    <form class="container mb-4" action="guardar" method="post">

        <div>
            <label for="nombre">nombre</label>
            <input class="form-control" type="text" name="nombre" placeholder="Digite su nombre" required>
        </div>
        <br>
        <div>
            <label for="direccion">Direccion</label>
            <textarea class="form-control" name="direccion"  cols="20" rows="5" required></textarea>
        </div>
        <br>
        <div>
            <label for="dui">Dui</label>
            <input class="form-control" type="number" name="dui" required>
        </div>
        <br>
        <div>
            <label for="teleofno">Telefono</label>
            <input class="form-control" type="tel" name="telefono" required>
        </div>
        <br>
        <div>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" required>
        </div>

        <br>
        <button class="btn btn-primary" type="submit"> Guardar</button>
        <button class="btn btn-warning" type="reset">Cancelar</button>

        <a class="btn btn-danger" href="index">regregsar</a>
        
    </form>
    <!-- agregando el footer del template -->
    <?php require "template/footer.php";?>
</body>
</html>