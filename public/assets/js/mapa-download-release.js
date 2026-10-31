(function () {
    'use strict';
    const page = document.querySelector('[data-download-release]');
    if (!page) return;

    const duration = 15000;
    const startedAt = performance.now();
    const video = page.querySelector('[data-release-video]');
    const playButton = page.querySelector('[data-video-play]');
    const kicker = page.querySelector('[data-release-kicker]');
    const progress = page.querySelector('[data-release-progress]');
    const percent = page.querySelector('[data-release-percent]');
    const status = page.querySelector('[data-release-status]');
    const track = page.querySelector('[data-release-track]');
    const material = page.querySelector('[data-release-material]');
    const coverLabel = page.querySelector('[data-release-cover-label]');
    const buttons = Array.from(page.querySelectorAll('[data-release-download]'));
    const buttonTexts = Array.from(page.querySelectorAll('[data-release-button-text]'));
    const feedback = page.querySelector('[data-release-feedback]');
    const browserHelp = page.querySelector('[data-in-app-browser-help]');
    const downloadUrl = page.dataset.downloadUrl;
    const inAppBrowser = /Instagram|FBAN|FBAV|FB_IAB|Messenger/i.test(navigator.userAgent);

    if (inAppBrowser && browserHelp) browserHelp.hidden = false;

    if (playButton && video) {
        playButton.addEventListener('click', function () {
            playButton.hidden = true;
            video.defaultMuted = false;
            video.muted = false;
            video.volume = 1;
            const playAttempt = video.play();
            if (playAttempt && typeof playAttempt.then === 'function') {
                playAttempt.catch(function () {
                    playButton.hidden = false;
                });
            }
        });
    }

    function unlock() {
        material.classList.remove('is-locked');
        material.classList.add('is-ready');
        buttons.forEach(function (item) { item.disabled = false; });
        buttonTexts.forEach(function (item) { item.textContent = 'Baixar meu Mapa em PDF'; });
        coverLabel.textContent = 'Download disponível';
        status.textContent = 'Seu Mapa está pronto para baixar';
        if (kicker) kicker.textContent = 'Seu Mapa está pronto';
    }

    function update(now) {
        const value = Math.min(100, Math.round(((now - startedAt) / duration) * 100));
        progress.style.width = value + '%';
        percent.textContent = value + '%';
        track.setAttribute('aria-valuenow', String(value));
        if (value < 100) window.requestAnimationFrame(update);
        else unlock();
    }

    window.requestAnimationFrame(update);

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            if (button.disabled || !downloadUrl) return;
            const target = document.querySelector('iframe[name="mapa-download-target"]');
            const separator = downloadUrl.includes('?') ? '&' : '?';
            buttons.forEach(function (item) { item.classList.add('is-requested'); });
            buttonTexts.forEach(function (item) { item.textContent = 'Download solicitado'; });
            feedback.textContent = inAppBrowser ? 'Enviamos o arquivo para o navegador. Se ele não aparecer, use a orientação abaixo.' : 'O download foi solicitado. Você pode continuar nesta página.';
            if (target) target.src = downloadUrl + separator + 'download=' + Date.now();
            window.setTimeout(function () {
                buttons.forEach(function (item) { item.classList.remove('is-requested'); });
                buttonTexts.forEach(function (item) { item.textContent = 'Baixar novamente'; });
            }, 3500);
        });
    });
}());
