<?php

function sessionControl($session)
{
    if(isset($session['login'])) {
        return true;
    }  else {
        return false;
    }
}