<?php

class SystemEmailer
{
    public function notify($email, $message)
    {
        echo "sending message: $message to $email <br>";
    }
}