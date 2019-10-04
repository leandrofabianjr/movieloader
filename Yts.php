<?php

namespace movieloader;

class Yts
{
    const LIST_MOVIES = 'list_movies.json';

    public function listMovies() {
        $rest = new Http();
        $req = $rest->request(Http::GET, "https://yts.lt/api/v2/list_movies.json");
        if ($req->status === 'ok') {
            return $req->data;
        }
        return [];
    }


}