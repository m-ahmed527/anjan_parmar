<?php

namespace App\Interfaces;

interface LoginRepositoryInterface
{
    public function attemptLogin($remember = false);
}
