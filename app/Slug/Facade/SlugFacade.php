<?php
namespace App\Slug\Facade;

// use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Facade;

class SlugFacade extends Facade
{
    protected static function getFacadeAccessor()
    {

        return 'Slug';
    }
}
?>
