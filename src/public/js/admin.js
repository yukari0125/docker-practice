document.addEventListener('DOMContentLoaded', () => {
  const modal = document.querySelector('.js-modal');
  const deleteForm = document.getElementById('deleteForm');

  if (!modal) return;

  // どの「詳細」ボタンでも反応する（後から出てきてもOK）
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('.detail-btn');
    if (!btn) return;

    e.preventDefault(); // aタグでも遷移しない

    modal.querySelector('[data-field="name"]').textContent = btn.dataset.name || '';
    modal.querySelector('[data-field="gender"]').textContent = btn.dataset.gender || '';
    modal.querySelector('[data-field="email"]').textContent = btn.dataset.email || '';
    modal.querySelector('[data-field="tel"]').textContent = btn.dataset.tel || '';
    modal.querySelector('[data-field="address"]').textContent = btn.dataset.address || '';
    modal.querySelector('[data-field="building"]').textContent = btn.dataset.building || '';
    modal.querySelector('[data-field="category"]').textContent = btn.dataset.category || '';
    modal.querySelector('[data-field="content"]').textContent = btn.dataset.content || '';

    if (deleteForm) deleteForm.action = `/admin/${btn.dataset.id}`;
    modal.setAttribute('aria-hidden', 'false'); 
    modal.classList.add('is-open');
  });

  // 閉じる
  document.querySelectorAll('.js-close-modal').forEach(btn => {
    btn.addEventListener('click', () => modal.classList.remove('is-open'));
    modal.setAttribute('aria-hidden', 'true');  
  });
});
