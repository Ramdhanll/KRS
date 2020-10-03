<?php
class Logout extends Controller
{
    public function index()
    {
        unset($_SESSION['username']);
        unset($_SESSION['admin']);
        session_unset();
        session_destroy();
        $_SESSION = array();
        header('Location: ' . BASEURL);
    }
}
