document.addEventListener('DOMContentLoaded', () => {

  /* ── toggle password visibility ── */
  function togglePw() {
    const input    = document.getElementById('password');
    const icon     = document.getElementById('eye-icon');
    const isHidden = input.type === 'password';
    input.type         = isHidden ? 'text' : 'password';
    icon.style.opacity = isHidden ? '0.5' : '1';
  }

  // make togglePw available to HTML onclick
  window.togglePw = togglePw;

  /* ── validation helper ── */
  function setError(wrapId, errId, show) {
    const wrap = document.getElementById(wrapId);
    const err  = document.getElementById(errId);
    if (show) {
      wrap.classList.add('error');
      wrap.classList.remove('success');
      err.classList.add('show');
    } else {
      wrap.classList.remove('error');
      wrap.classList.add('success');
      err.classList.remove('show');
    }
  }

  /* ── live validation on blur ── */
  document.getElementById('input').addEventListener('blur', () => {
    const v = document.getElementById('input').value.trim();
    setError('wrap-input', 'err-input', v.length < 1);
  });

  document.getElementById('password').addEventListener('blur', () => {
    const v = document.getElementById('password').value;
    setError('wrap-password', 'err-password', v.length < 1);
  });

  /* ── submit ── */
  document.getElementById('loginForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const input = document.getElementById('input').value.trim();
    const pw    = document.getElementById('password').value;

    let valid = true;

    if (input.length < 1) {
      setError('wrap-input', 'err-input', true);
      valid = false;
    } else {
      setError('wrap-input', 'err-input', false);
    }

    if (pw.length < 1) {
      setError('wrap-password', 'err-password', true);
      valid = false;
    } else {
      setError('wrap-password', 'err-password', false);
    }

    if (valid) {
      e.target.submit();
    }
  });

}); // ← end of DOMContentLoaded