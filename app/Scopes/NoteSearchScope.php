<?php

namespace App\Scopes;

class NoteSearchScope extends SearchScope
{
    protected $searchColumns = ['name', 'content'];
}
