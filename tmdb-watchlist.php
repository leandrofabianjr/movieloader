<?php

use movieloader\Tmdb;

$tmdb = new Tmdb();
$res = $tmdb->watchlist();
$movies = $res->results;
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
                <th scope="row"><img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2<?= $movie->poster_path ?>"  alt="<?= $movie->title ?>"></th>
                <td><?= $movie->title ?> (<?= $movie->original_title ?>)</td>
                <td><a href="https://www.imdb.com/title/<?= $movie->imdb_code ?>"><?= $movie->vote_average ?></a></td>
                <td><?= $movie->release_date ?></td>
                <td><?= $movie->overview ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php include 'template-footer.php' ?>
