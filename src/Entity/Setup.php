<?php

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Setup
{
    public int $id;
    public string $title;
    public string $price;
    public string $description;
    public string $url_photo_setup;
    public User $user;

    use Serializer;
}
