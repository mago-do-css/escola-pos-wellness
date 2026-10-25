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
    public const UPSELL_VIDEO_URL = '/assets/videos/mapa-do-dinheiro-vsl-3.mp4';
    public const UPSELL_POSTER_URL = '/assets/images/vsl-upsell-29-47-thumbnail.webp';
    /** Variação da VSL e da capa usada na página de agradecimento do Mapa. */
    public const THANK_YOU_UPSELL_VIDEO_URL = '/assets/videos/vsl-page-2.mp4';
    public const THANK_YOU_UPSELL_POSTER_URL = '/assets/images/por-tras/thumbnail-vsl-por-tras-ab.png';
    public const NEXT_PRODUCT_URL = '/por-tras-do-dinheiro';
}
