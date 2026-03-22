/* ─────────────────────────────────────────────
   IDonation — Shared JavaScript
   Usage: Both donation.blade.php & list.blade.php
   ───────────────────────────────────────────── */

(function () {
    "use strict";

    /* ── Theme Toggle ── */
    const html = document.documentElement;
    const toggleBtn = document.getElementById("themeToggle");

    // Auto-detect OS preference on first visit
    const savedTheme =
        localStorage.getItem("idonation_theme") ||
        (window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light");
    html.setAttribute("data-theme", savedTheme);

    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            const next =
                html.getAttribute("data-theme") === "dark" ? "light" : "dark";
            html.setAttribute("data-theme", next);
            localStorage.setItem("idonation_theme", next);
        });
    }

    /* ── Amount Presets (donation form only) ── */
    const amountInput = document.getElementById("amount");
    const presetBtns = document.querySelectorAll(".preset-btn");

    if (amountInput && presetBtns.length) {
        presetBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                amountInput.value = btn.dataset.value;
                presetBtns.forEach((b) => b.classList.remove("active"));
                btn.classList.add("active");
            });
        });

        // Remove active class when user manually types
        amountInput.addEventListener("input", () => {
            presetBtns.forEach((b) => b.classList.remove("active"));
        });
    }

    /* ── Donation Form Submit ── */
    const donationForm = document.getElementById("donation_form");

    if (donationForm) {
        donationForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const btn = document.getElementById("submitBtn");
            const btnText = btn ? btn.querySelector(".btn-text") : null;

            if (btn) {
                btn.classList.add("loading");
            }
            if (btnText) {
                btnText.textContent = "Memproses…";
            }

            $.post("/donation", {
                _method: "POST",
                _token: document.querySelector('meta[name="csrf-token"]')
                    .content,
                donor_name: document.getElementById("donor_name").value,
                donor_email: document.getElementById("donor_email").value,
                donation_type: document.getElementById("donation_type").value,
                amount: document.getElementById("amount").value,
                note: document.getElementById("note").value,
            })
                .done(function (data) {
                    snap.pay(data.snap_token, {
                        onSuccess: function () {
                            window.location.href = "/";
                        },
                        onPending: function () {
                            window.location.href = "/";
                        },
                        onError: function () {
                            alert("Pembayaran gagal");
                        },
                    });
                })
                .fail(function () {
                    if (btn) {
                        btn.classList.remove("loading");
                    }
                    if (btnText) {
                        btnText.textContent = "Kirim Donasi";
                    }
                    alert("Terjadi kesalahan. Silakan coba lagi.");
                });
        });
    }
})();
