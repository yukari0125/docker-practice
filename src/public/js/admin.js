document.addEventListener('DOMContentLoaded', () => {
  const modal = document.querySelector('.js-modal');
  const closeBtns = document.querySelectorAll('.js-close-modal');
  const deleteForm = document.getElementById('deleteForm');

  if (!modal) return;

  // 詳細ボタン
  document.querySelectorAll('.detail-btn').forEach(btn => {
    btn.addEventListener('click', () => {

      modal.querySelector('[data-field="name"]').textContent = btn.dataset.name || '';
      modal.querySelector('[data-field="gender"]').textContent = btn.dataset.gender || '';
      modal.querySelector('[data-field="email"]').textContent = btn.dataset.email || '';
      modal.querySelector('[data-field="tel"]').textContent = btn.dataset.tel || '';
      modal.querySelector('[data-field="address"]').textContent = btn.dataset.address || '';
      modal.querySelector('[data-field="building"]').textContent = btn.dataset.building || '';
      modal.querySelector('[data-field="category"]').textContent = btn.dataset.category || '';
      modal.querySelector('[data-field="content"]').textContent = btn.dataset.content || '';

      if (deleteForm) {
        deleteForm.action = `/admin/${btn.dataset.id}`;
      }

      // ★ これが一番大事
      modal.classList.add('is-open');
    });
  });

  // 閉じる
  closeBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      modal.classList.remove('is-open');
    });
  });
});
