    /* ── toggle password visibility ── */
    function togglePw(id, btn) {
      const input = document.getElementById(id);
      const isText = input.type === 'text';
      input.type = isText ? 'password' : 'text';
      btn.querySelector('svg').style.opacity = isText ? '1' : '0.5';
    }

    /* ── helpers ── */
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

    /* ── live validation ── */
    document.getElementById('fullName').addEventListener('blur', () => {
      const v = document.getElementById('fullName').value.trim();
      setError('wrap-name', 'err-name', v.length < 2);
    });

    document.getElementById('email').addEventListener('blur', () => {
      const v = document.getElementById('email').value.trim();
      setError('wrap-email', 'err-email', !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
    });

    document.getElementById('phone').addEventListener('blur', () => {
      const v = document.getElementById('phone').value.trim();
      setError('wrap-phone', 'err-phone', !/^0\d{8,9}$/.test(v));
    });

    document.getElementById('password').addEventListener('blur', () => {
      const v = document.getElementById('password').value;
      setError('wrap-password', 'err-password', v.length < 6);
    });

    document.getElementById('confirmPw').addEventListener('blur', () => {
      const p  = document.getElementById('password').value;
      const cp = document.getElementById('confirmPw').value;
      setError('wrap-confirm', 'err-confirm', p !== cp);
    });

    /* ── submit ── */
    document.getElementById('signupForm').addEventListener('submit', (e) => {
      e.preventDefault();

      const name  = document.getElementById('fullName').value.trim();
      const email = document.getElementById('email').value.trim();
      const phone = document.getElementById('phone').value.trim();
      const pw    = document.getElementById('password').value;
      const cpw   = document.getElementById('confirmPw').value;

      let valid = true;

      if (name.length < 2)                            { setError('wrap-name',     'err-name',     true); valid = false; }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { setError('wrap-email',    'err-email',    true); valid = false; }
      if (!/^0\d{8,9}$/.test(phone))                 { setError('wrap-phone',    'err-phone',    true); valid = false; }
      if (pw.length < 6)                              { setError('wrap-password', 'err-password', true); valid = false; }
      if (pw !== cpw)                                 { setError('wrap-confirm',  'err-confirm',  true); valid = false; }

      if (valid) {
        const btn = document.querySelector('.btn-create');
        btn.textContent = '✓ Account Created!';
        btn.style.background = 'linear-gradient(90deg,#38a169,#2f855a)';
        btn.disabled = true;
      }
    });