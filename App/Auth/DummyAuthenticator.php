<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\User;

/**
 * Class DummyAuthenticator
 * Basic implementation of user authentication
 * @package App\Auth
 */
class DummyAuthenticator implements IAuthenticator
{
    const LOGIN = "admin";
    const PASSWORD_HASH = '$2y$10$GRA8D27bvZZw8b85CAwRee9NH5nj4CQA6PDFMc90pN9Wi4VAWq3yq'; // admin
    const USERNAME = "Admin";

    /**
     * DummyAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function login($email, $password): bool
    {
        //&& password_verify($password, $loginHelp[0].getPassword() hashovanie
        $loginHelp = User::getAll('email = ?',[$email]);
        if ( $loginHelp != null && password_verify($password, $loginHelp[0]->getHeslo())) {
            $_SESSION['user'] = $loginHelp[0]->getEmail();
            return true;
        } else {
            return false;
        }
    }

    function registr($email): bool
    {
        $loginHelp = User::getAll('email = ?',[$email]);
        if ( $loginHelp != null ) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Logout the user
     */
    function logout() : void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     */
    function getLoggedUserName(): string
    {

        //return isset($_SESSION['user']) ? $_SESSION['user'] : throw new \Exception("User not logged in");
        $meno = User::getAll('email = ?', [$_SESSION['user']]);
        return $meno[0]->getMeno();
    }

    /**
     * Get the context of the logged-in user
     * @return bool
     */
    function isLoggedAdmin(): bool
    {
        // dokoncit
        return ($_SESSION['user'] == "cekel1@stud.uniza.sk" ? true : false);
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    function getLoggedUserContext(): mixed
    {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    function getLoggedUserId(): int
    {
        $idU = User::getAll('email = ?', [$_SESSION['user']]);
        return $idU[0]->getId();
    }
}