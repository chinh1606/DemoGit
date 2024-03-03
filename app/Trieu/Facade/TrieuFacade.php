<?php
namespace App\Trieu\Facade;
// use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Facade;
class TrieuFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Trieu';
    }
}


?>
