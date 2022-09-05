<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response
    {
        $tracks = [
            ['song' => 'September', 'artist' => 'Earth, Wind and Fire'],
            ['song' => 'Hurt', 'artist' => 'Johnny Cash'],
            ['song' => 'Lonely Day', 'artist' => 'System of a Down'],
            ['song' => 'Mindestens in 1000 Jahren', 'artist' => 'Frittenbude'],
            ['song' => 'Teenage Dirtbag', 'artist' => 'Wheatus'],
            ['song' => 'On Melancholy Hill', 'artist' => 'Gorillaz'],
        ];

        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'Home of Vinyls',
            'tracks' => $tracks
        ]);
    }

    #[Route('/favorites')]
    public function favorites(): Response
    {
        return $this->render('vinyl/favorites.html.twig', [
            'title' => 'Favorite Vinyls'
        ]);
    }

    #[Route('/categories/{category}/{genre}')]
    public function category(string $category = null, string $genre = null): Response
    {
        $title = 'All Categories';
        if ($category) {
            $title = u(str_ireplace('-', ' ', $category))->title(true);
        }

        return $this->render('vinyl/category.html.twig', [
            'title' => 'Vinyl Categories',
            'subtitle' => $title,
            'genre' => $genre
        ]);
    }
}