

<body>
    <?php
    include('mostrar_productos.php');
    ?>
    <script>
        
        var serie = prompt("Ingrese el nuevo stock");

        document.location.href='modificando_final.php?id=<?php echo $_REQUEST['id'];?>&sport='+serie;
    </script>                     
</body>