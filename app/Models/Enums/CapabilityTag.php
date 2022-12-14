<?php

namespace App\Models\Enums;

enum CapabilityTag: int
{
    case LogIn = 1;
    case Author = 2;
    case DeletePost = 3;
    case SeeHidden = 4;
    case AdminUsers = 5;

    public function getText():string
    {
        switch ($this){
            case self::LogIn:
                return 'Log in';
            case self::Author:
                return 'Author posts';
            case self::DeletePost:
                return 'Delete posts';
            case self::SeeHidden:
                return 'See hidden posts';
            case self::AdminUsers:
                return 'Handle users';
        }

        return '';
    }
}
