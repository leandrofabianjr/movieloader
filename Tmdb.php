<?php

namespace movieloader;

class Tmdb {

    public function __construct() {
        if (!Session::get(Session::AccessToken)) {
            if (!Session::get(Session::RequestToken)) {
                $this->requestAccessToken();
            } else {
                $this->createAccessToken();
            }
        }
    }

    public function requestAccessToken() {
        $http = new Http();

        $url = 'https://api.themoviedb.org/4/auth/request_token';
        $headers = [ 'authorization: Bearer ' . TMDB_TOKEN, 'content-type: application/json;charset=utf-8' ];
        $res = $http->request(Http::POST, $url, $headers);

        if ($res && $res->success) {
            $requestToken = $res->request_token;
            Session::set(Session::RequestToken, $requestToken);
            Session::rem(Session::AccessToken);
            Session::set(Session::NewWindow, 'https://www.themoviedb.org/auth/access?request_token=' . $requestToken);
        }
    }

    public function createAccessToken() {
        $http = new Http();

        $url = 'https://api.themoviedb.org/4/auth/access_token';
        $headers = [ 'authorization: Bearer ' . TMDB_TOKEN, 'content-type: application/json;charset=utf-8' ];
        $postFields = [ 'request_token' => Session::get(Session::RequestToken) ];
        $res = $http->request(Http::POST, $url, $headers, $postFields);
        if ($res && $res->success) {
            Session::set(Session::AccountId, $res->account_id);
            Session::set(Session::AccessToken, $res->access_token);
            Session::rem(Session::RequestToken);
        } else {
            Session::rem(Session::AccessToken);
        }
    }

    public function watchlist() {
        $http = new Http();
        $headers = [ 'authorization: Bearer ' . TMDB_TOKEN, 'content-type: application/json;charset=utf-8' ];
        $res = $http->request(Http::GET, 'https://api.themoviedb.org/4/account/'.Session::get(Session::AccountId).'/movie/watchlist', $headers);
        return $res;
    }
}