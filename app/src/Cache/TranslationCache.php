<?php

namespace App\Cache;

use App\Repository\TranslationRepository;
use Symfony\Component\Cache\Adapter\AbstractAdapter;

class TranslationCache
{
    private TranslationRepository $repository;
    private AbstractAdapter $cache;

    public function __construct(AbstractAdapter $cache, TranslationRepository $repository)
    {
        $this->cache = $cache;
        $this->repository = $repository;
    }

    public function findForLanguage($languageId, $phrase): ?string
    {
        $key = sprintf("translation;%d;%s", $languageId, $phrase);

        // this will check if the key is in cache it will return otherwise it will add into cache

        return $this->cache->get($key, function (\Symfony\Contracts\Cache\ItemInterface $item) use ($languageId, $phrase) {

            // this for just for debugging
            echo "Adding $phrase to cache...";

            return $this->repository->findForLanguage($languageId, $phrase);
        });
    }
}