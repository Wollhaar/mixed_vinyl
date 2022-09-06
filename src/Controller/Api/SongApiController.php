<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SongApiController extends AbstractController
{
    #[Route('/api/song/{id<\d+>}', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): JsonResponse
    {
        $tracks = ['',
            ['song' => 'September', 'artist' => 'Earth, Wind and Fire', 'url' => 'https://www.youtube.com/watch?v=Gs069dndIYk'],
            ['song' => 'Hurt', 'artist' => 'Johnny Cash', 'url' => 'https://www.youtube.com/watch?v=8AHCfZTRGiI'],
            ['song' => 'Lonely Day', 'artist' => 'System of a Down', 'url' => 'https://www.youtube.com/watch?v=DnGdoEa1tPg'],
            ['song' => 'Mindestens in 1000 Jahren', 'artist' => 'Frittenbude', 'url' => 'https://www.youtube.com/watch?v=GgWmUXwPpDY'],
            ['song' => 'Teenage Dirtbag', 'artist' => 'Wheatus', 'url' => 'https://www.youtube.com/watch?v=FC3y9llDXuM'],
            ['song' => 'On Melancholy Hill', 'artist' => 'Gorillaz', 'url' => 'https://www.youtube.com/watch?v=04mfKJWDSzI'],
        ];
        if (is_array($tracks[$id])) {
            $tracks[$id]['id'] = $id;
        }

        $logger->info('Returning API response for song {songId}', [
            'songId' => $id,
        ]);
        return $this->json($tracks[$id] ?? []);
    }
}