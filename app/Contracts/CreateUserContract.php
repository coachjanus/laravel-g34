<?php

namespace App\Contracts;

use App\Models\User;

interface CreateUserContract
{
    public function __invoke(array $data): User;
}
