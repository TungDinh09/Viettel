<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/admin/register',
       '/admin/login',
       '/admin/logout',
    //    '/product/filter',
       '/order/insert',
       '/category/insert',
       '/category/destroy/*',
       '/Order/accept/*',
       '/Order/unaccept/*',
       "/Order/destroy/*",
       "/product/insert",
       "/category/update/*",
       "/product/update/*",
       "/product/update1",
    ];
}
