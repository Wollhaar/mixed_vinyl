<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{
    #[Route('/')]
    public function favorites(): Response
    {
        return new Response('<h1>Favorite Vinyls</h1>');
    }

    #[Route('/categories/{category}')]
    public function category(string $category = null): Response
    {
        $title = 'All Categories';
        if ($category) {
            $title = u(str_ireplace('-', ' ', $category))->title(true);
        }
        return new Response('<h2>Vinyl Categories</h2><h3>' . $title . '</h3>');
    }
}