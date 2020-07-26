<?php 
include 'header.php';
include 'functions.php';
?>
        <section class="browse">
            <div class="category-buttons">
            <form method="post" action="browseTable.php" class="browse_btn">
                <button type="submit" class="btn btn-primary btn-lg" name="type" value="dpa">Dehydro-Phenyl-Alanine</button>
            </form>
            <form method="post" action="browseTable.php" class="browse_btn">
                <button type="submit" class="btn btn-primary btn-lg" name="type" value="aib">Amino-Iso-Butyric Acid</button>
            </form>
            </div>
        </section>
<?php footer(); ?>