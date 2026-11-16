<?php
declare(strict_types=1);

namespace App\Config;

final class Assinatura
{
    /** Edite os títulos, descrições e URLs das miniaturas quando as aulas estiverem prontas. */
    public const LESSONS = [
        ['Observe uma situação', 'Comece com uma cena concreta da sua relação com o dinheiro.', ''],
        ['Acompanhe a sequência', 'Investigue o que acontece antes, durante e depois.', ''],
        ['Olhe para o contexto', 'Perceba os pensamentos e sentimentos presentes na situação.', ''],
        ['Aprofunde a investigação', 'Explore a função que um comportamento pode exercer.', ''],
    ];

    /** Somente depoimentos reais identificáveis e autorizados: ['nome' => '', 'texto' => '', 'autorizado' => true]. */
    public const TESTIMONIALS = [];
}
