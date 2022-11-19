<?php

namespace App\Models\Enums;

enum CapabilityTag: int
{
    case LogIn = 1;
    case Author = 2;
    case DeletePost = 3;
    case SeeHidden = 4;
    case AdminUsers = 5;
}
