<?php

use movieloader\Yts;

$yts = new Yts();
$res = $yts->listMovies();
$movies = $res->movies;
?>

<?php include 'template-header.php' ?>

<section>
    <h2>Últimos filmes do YTS</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Capa</th>
            <th scope="col">Título</th>
            <th scope="col">IMDB</th>
            <th scope="col">Ano</th>
            <th scope="col">Sinopse</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($movies as $movie) : ?>
            <tr>
                <th scope="row"><img src="<?= $movie->medium_cover_image ?>"  alt="<?= $movie->title ?>"></th>
                <td><?= $movie->title ?></td>
                <td><a href="https://www.imdb.com/title/<?= $movie->imdb_code ?>"><?= $movie->rating ?></a></td>
                <td><?= $movie->year ?></td>
                <td><?= $movie->synopsis ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include 'template-footer.php' ?>