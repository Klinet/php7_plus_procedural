<?php
function createMailHeader()
{
    $fejlec = "From: " . ADMIN_EMAIL . "\r\n";
    $fejlec .= "Reply-To: " . ADMIN_EMAIL . "\r\n";
    $fejlec .= "Mime-Version: 1.0\r\n";
    $fejlec .= "Content-type: text/html; charset=UTF-8\r\n";
    $fejlec .= "X-Priority: 1\r\n";
    $fejlec .= "X-Mailer: Php/" . phpversion() . "\r\n";
    return $fejlec;
}
