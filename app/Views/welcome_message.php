<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UPN 212 Teziutlán</title>
    <meta name="description" content="Universidad Pedagógica Nacional Unidad 212 Teziutlán">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>


<header>

    <div class="navbar">
        <ul>
            
        </ul>
    </div>

    <div class="jumbotron">

        <h1>Sistema de asignación de cargas horarias</h1>

    </div>

</header>



<section>

    <h1>About this page</h1>

    

</section>

<div class="further">

    <section>

        <h1>Go further</h1>

        <h2>
            Learn
        </h2>

        <p></p>

    </section>

</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p>Page rendered in {elapsed_time} seconds</p>

        <p>Environment: <?= ENVIRONMENT ?></p>

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> UPN 212 Teziutlán. Developed by edegantea.</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>" type="text/javascript"></script>

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
