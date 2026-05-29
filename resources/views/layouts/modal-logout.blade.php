<div id="modal-logout"
     style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.5);
            backdrop-filter:blur(4px); align-items:center; justify-content:center;">
    <div style="background:white; border-radius:20px; padding:2rem; max-width:360px; width:90%;
                text-align:center; box-shadow:0 20px 60px rgba(0,0,0,0.2);">
        <div style="font-size:3rem; margin-bottom:1rem;">👋</div>
        <h5 style="font-weight:700; margin-bottom:0.5rem; color:#1a1a1a;">Yakin ingin keluar?</h5>
        <p style="color:#888; font-size:0.9rem; margin-bottom:1.5rem;">Kamu akan keluar dari sesi ini.</p>
        <div style="display:flex; gap:0.75rem;">
            <button onclick="tutupModalLogout()"
                    style="flex:1; padding:0.75rem; border-radius:12px; border:1px solid #e0e0e0;
                           background:white; color:#555; font-weight:600; cursor:pointer;">
                Batal
            </button>
            <button id="btn-logout-confirm"
                    style="flex:1; padding:0.75rem; border-radius:12px; border:none;
                           background:linear-gradient(135deg,#ef4444,#dc2626); color:white;
                           font-weight:600; cursor:pointer;">
                Ya, Logout
            </button>
        </div>
    </div>
</div>

<script>
let _logoutFormId = null;

function konfirmasiLogout(e, formId) {
    e.preventDefault();
    _logoutFormId = formId;
    document.getElementById('modal-logout').style.display = 'flex';
}

function tutupModalLogout() {
    document.getElementById('modal-logout').style.display = 'none';
}

document.getElementById('btn-logout-confirm').addEventListener('click', function() {
    document.getElementById(_logoutFormId).submit();
});

document.getElementById('modal-logout').addEventListener('click', function(e) {
    if (e.target === this) tutupModalLogout();
});
</script>