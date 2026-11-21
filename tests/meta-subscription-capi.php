<?php
declare(strict_types=1);
spl_autoload_register(static function (string $class): void { if (str_starts_with($class, 'App\\')) require dirname(__DIR__) . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php'; });
final class FakeHttps {
    public $context;
    private string $body = '{"events_received":1}';
    public function stream_open($path, $mode, $options, &$opened_path): bool { $options = stream_context_get_options($this->context); $GLOBALS['captured'][] = json_decode($options['http']['content'], true, 512, JSON_THROW_ON_ERROR); return true; }
    public function stream_read($count): string { $part = substr($this->body, 0, $count); $this->body = substr($this->body, strlen($part)); return $part; }
    public function stream_eof(): bool { return $this->body === ''; }
    public function stream_stat(): array { return []; }
}
stream_wrapper_unregister('https');
stream_wrapper_register('https', FakeHttps::class);
putenv('META_PIXEL_ID=123456789'); putenv('META_CAPI_ACCESS_TOKEN=test-token'); putenv('META_CAPI_ENABLED=true'); putenv('META_TEST_EVENT_CODE=TEST_LOCAL');
$_SERVER['HTTP_HOST']='example.test'; $_SERVER['HTTPS']='on'; $_SERVER['HTTP_USER_AGENT']='local-test';
$pageTitle='Teste'; $content=''; $showWhatsapp=false;
foreach (['/aula-completa-entenda-por-tras-do-dinheiro'=>false, '/assistir-aula-completa-entenda-por-tras-do-dinheiro'=>false, '/garantir-acesso-completo'=>true, '/garantir-acesso-completo-agora'=>true] as $path=>$offer) {
  $GLOBALS['captured']=[]; $_SERVER['REQUEST_URI']=$path;
  ob_start(); require dirname(__DIR__) . '/app/Views/layout.php'; $html=ob_get_clean();
  $events=array_map(static fn($p)=>$p['data'][0], $GLOBALS['captured']);
  if (count($events)!==($offer?2:1)) throw new RuntimeException('Número incorreto em '.$path);
  foreach ($events as $event) {
    if ($event['event_source_url'] !== 'https://example.test'.$path || $event['custom_data']['page_path'] !== $path) throw new RuntimeException('URL incorreta em '.$path);
    $pageName = App\Config\MetaTracking::pageName($path);
    if ($pageName === '' || ($event['custom_data']['page_name'] ?? '') !== $pageName || !str_contains($html, $pageName)) throw new RuntimeException('Nome da página incorreto em '.$path);
    if (!str_contains($html, 'eventID: "'.$event['event_id'].'"')) throw new RuntimeException('ID sem par no Pixel em '.$path);
  }
  if (array_column($events, 'event_name') !== ($offer?['PageView','ViewContent']:['PageView'])) throw new RuntimeException('Eventos incorretos em '.$path);
}
$GLOBALS['captured']=[]; $_SERVER['REQUEST_URI']='/leads/capture'; unset($_SERVER['HTTP_REFERER']);
App\Services\MetaConversionsApi::trackLead('lead_test_123', ['name'=>'Teste', 'email'=>'teste@example.com', 'whatsapp'=>'61999999999'], '/assistir-aula-completa-entenda-por-tras-do-dinheiro', '/assistir-aula-completa-entenda-por-tras-do-dinheiro');
$lead=$GLOBALS['captured'][0]['data'][0];
if ($lead['event_name'] !== 'Lead' || $lead['event_id'] !== 'lead_test_123' || $lead['event_source_url'] !== 'https://example.test/assistir-aula-completa-entenda-por-tras-do-dinheiro' || ($lead['custom_data']['page_name'] ?? '') !== 'Aula gratuita - ManyChat') throw new RuntimeException('Lead incorreto');
echo "PageView, ViewContent e Lead: URLs e IDs verificados sem envio externo.\n";
