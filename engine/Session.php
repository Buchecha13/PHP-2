<?php


namespace app\engine;


class Session
{
    public function start() {
        session_start();
    }

    public function destroy() {
        session_destroy();
    }

    public function regenerateId() {
        session_regenerate_id();
    }

    public function getId() {
        return session_id();
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function setAuth($key, $value) {
        $_SESSION['auth'][$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key];
    }

    public function getAuth($key) {
        return $_SESSION['auth'][$key];
    }
}