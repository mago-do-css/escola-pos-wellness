(() => {
    const board = document.querySelector('.kanban');
    if (!board) return;
    const feedback = document.querySelector('.kanban-feedback');
    let dragged = null;
    let pan = null;
    document.querySelectorAll('[data-kanban-scroll]').forEach(button => button.addEventListener('click', () => board.scrollBy({left: Number(button.dataset.kanbanScroll) * board.clientWidth * 0.75, behavior: 'smooth'})));
    board.addEventListener('pointerdown', event => {
        if (event.pointerType !== 'mouse' || event.button !== 0 || event.target.closest('.kanban__card, a, button, select, input')) return;
        pan = {x: event.clientX, scroll: board.scrollLeft, id: event.pointerId};
        board.setPointerCapture(event.pointerId);
        board.classList.add('is-panning');
    });
    board.addEventListener('pointermove', event => { if (pan && pan.id === event.pointerId) board.scrollLeft = pan.scroll - (event.clientX - pan.x); });
    const stopPan = () => { pan = null; board.classList.remove('is-panning'); };
    board.addEventListener('pointerup', stopPan);
    board.addEventListener('pointercancel', stopPan);
    board.addEventListener('lostpointercapture', stopPan);
    const counts = () => board.querySelectorAll('.kanban__column').forEach(column => { column.querySelector('[data-count]').textContent = column.querySelectorAll('.kanban__card').length; });
    async function move(card, column) {
        const oldColumn = card.closest('.kanban__column');
        const select = card.querySelector('select');
        const previous = oldColumn.dataset.status;
        const status = column.dataset.status;
        if (previous === status) return;
        select.disabled = true;
        try {
            const body = new URLSearchParams({id: card.dataset.id, status, csrf: board.dataset.csrf});
            const response = await fetch('/admin/leads/status', {method: 'POST', body, credentials: 'same-origin'});
            if (!response.ok || !(await response.json()).ok) throw new Error('Falha');
            column.querySelector('.kanban__cards').prepend(card);
            select.value = status;
            counts();
            feedback.textContent = 'Etapa atualizada.';
        } catch (_) { select.value = previous; feedback.textContent = 'Não foi possível atualizar. Tente novamente.'; }
        finally { select.disabled = false; }
    }
    board.addEventListener('dragstart', event => { dragged = event.target.closest('.kanban__card'); if (dragged) event.dataTransfer.setData('text/plain', dragged.dataset.id); });
    board.addEventListener('dragend', () => { dragged = null; });
    board.addEventListener('dragover', event => { if (dragged && event.target.closest('.kanban__column')) event.preventDefault(); });
    board.addEventListener('drop', event => { const column = event.target.closest('.kanban__column'); if (dragged && column) { event.preventDefault(); move(dragged, column); } });
    board.addEventListener('change', event => { if (event.target.matches('select')) { const card = event.target.closest('.kanban__card'); const column = Array.from(board.querySelectorAll('.kanban__column')).find(item => item.dataset.status === event.target.value); if (column) move(card, column); } });
})();
