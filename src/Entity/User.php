<?php

namespace Entity;

use ludk\Utils\Serializer;

class User
{
    public int $id;
    public string $nickname;
    public string $password;
    public string $mail;
    public string $profil_url_image;

    use Serializer;
}
