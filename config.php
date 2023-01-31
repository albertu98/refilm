<?php

    function getPepper()
    {
        return "asdfghjklexxrfvrtyuioojnb";
    }

    function hashPassword($password)
    {
        $pepper = hash_hmac("sha256", $password, getPepper());
        return password_hash($pepper, PASSWORD_BCRYPT);
    }