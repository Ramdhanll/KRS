<?php

class login extends Controller
{
    public function index()
    {
        if (isset($_SESSION['admin'])) {
            header("Location: admin");
            exit();
        } elseif (isset($_SESSION['username'])) {
            header("Location: profile");
            exit();
        }
        $this->view('login/index');
    }
}
