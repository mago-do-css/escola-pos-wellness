<?php

declare(strict_types=1);

namespace App\Config;

final class MapaDownload
{
    /**
     * Coloque o PDF final neste caminho antes de publicar a página.
     * Também pode ser trocado por uma URL completa de um CDN ou armazenamento externo.
     */
    public const FILE_URL = '/assets/downloads/mapa-do-dinheiro.pdf';

    public const FILE_NAME = 'mapa-do-dinheiro.pdf';
}
