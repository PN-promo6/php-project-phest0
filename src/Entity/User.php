<?php

namespace Entity;

use ludk\Utils\Serializer;

class User
{
    public $id;
    public $nickname;
    public $password;
    public $mail;
    public $profil_url_image;

    use Serializer;
}
