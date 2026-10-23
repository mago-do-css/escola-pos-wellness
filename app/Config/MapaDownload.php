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

    /** Material apresentado após a captura, como continuidade opcional do Mapa. */
    public const UPSELL_VIDEO_URL = '/assets/videos/vsl-upsell-29-47.mp4';
    public const UPSELL_POSTER_URL = '/assets/images/vsl-upsell-29-47-thumbnail.png';
    public const NEXT_PRODUCT_URL = '/por-tras-do-dinheiro';
}
