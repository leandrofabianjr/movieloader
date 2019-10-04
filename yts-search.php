<?php include 'template-header.php' ?>

<section>
    <form method="post" action="search-title.php">
        <div class="form-group">
            <label for="title"></label>
            <input type="text" class="form-control" id="title" aria-describedby="title"
                   placeholder="Procure por um título">
        </div>

        <input type="submit" value="Procurar" class="btn btn-primary">
    </form>
</section>

<?php include 'template-footer.php' ?>