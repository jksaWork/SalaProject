<?php

function IsClient() : bool
{
    return auth()->guard('client')->check();
}
