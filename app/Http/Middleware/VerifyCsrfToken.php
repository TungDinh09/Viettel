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
       "/admin/delete/*",
       '/order/insert',
       '/Order/accept/*',
       '/Order/unaccept/*',
       "/Order/destroy/*",
       "/category/update/*",
       '/category/insert',
       '/category/destroy/*',
       '/product/update/*',
       "/product/insert",
       "/product/delete/*",
       '/blog/insert',
       '/blog/update/*',
       '/blog/destroy/*',
       

    ];
}
