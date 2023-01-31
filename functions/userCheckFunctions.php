<?php

    function checkPasswordLen($p)
    {
        return !((strlen($p) < 2 || strlen($p) > 12));
    }

    function checkBlank($p)
    {
        if (empty($p)) {
            return true;
        }
        return false;
    }

