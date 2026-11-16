<?php $formId = $formId ?? 'principal'; ?>
<form class="members-form" data-capture-form data-capture-endpoint="/leads/capture" data-thank-you-url="/garantir-acesso-completo" novalidate>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($leadFormToken, ENT_QUOTES, 'UTF-8') ?>">
    <input type="hidden" name="form_started_at" value="<?= (int) $leadFormStartedAt ?>">
    <div class="members-form__trap" aria-hidden="true"><label for="empresa-<?= $formId ?>">Não preencha</label><input id="empresa-<?= $formId ?>" name="company_website" tabindex="-1" autocomplete="off"></div>
    <div class="members-form__fields">
        <label for="nome-<?= $formId ?>">Seu nome<input id="nome-<?= $formId ?>" name="name" autocomplete="name" required></label>
        <label for="email-<?= $formId ?>">Seu e-mail<input id="email-<?= $formId ?>" name="email" type="email" autocomplete="email" required></label>
        <label for="whatsapp-<?= $formId ?>">WhatsApp com DDD<input id="whatsapp-<?= $formId ?>" name="whatsapp" type="tel" autocomplete="tel-national" inputmode="tel" placeholder="(00) 00000-0000" pattern="\(\d{2}\) \d{4,5}-\d{4}" data-whatsapp-input required></label>
    </div>
    <label class="members-form__consent"><input type="checkbox" name="consent" value="1" required><span>Quero receber informações sobre esta experiência por e-mail e WhatsApp.</span></label>
    <button type="submit" class="members-button">Enviar e acessar o material completo <span aria-hidden="true">↗</span></button>
    <p class="members-form__feedback" data-capture-feedback role="status" aria-live="polite"></p>
</form>
