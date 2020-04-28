<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Setup
{
    public $id;
    public $title;
    public $price;
    public $description;
    public $url_photo_setup;
    public User $user;

    use Serializer;
}
