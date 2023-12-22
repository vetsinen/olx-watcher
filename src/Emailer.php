<?php

class MockEmailer
{
    public function notify($email, $message)
    {
        echo "sending message: $message to $email <br>";
    }
}