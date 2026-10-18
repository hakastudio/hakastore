<?php defined('ABSPATH') || exit; ?>
<section class="how-it-works" id="cara-kerja" aria-labelledby="how-heading">
  <div class="container">
    <div class="how-it-works__inner">

      <div class="reveal">
        <div class="section-header">
          <p class="section-eyebrow"><?php esc_html_e('Mudah & Cepat','hakastore'); ?></p>
          <h2 class="section-title" id="how-heading">
            <?php esc_html_e('Cara','hakastore'); ?> <em><?php esc_html_e('Berbelanja','hakastore'); ?></em>
          </h2>
          <p class="section-subtitle">
            <?php esc_html_e('Proses pembelian di HakaStore dirancang untuk cepat dan aman, hanya dalam 4 langkah.','hakastore'); ?>
          </p>
        </div>

        <div class="how-it-works__steps">
          <div class="step-item">
            <div class="step-item__num" aria-hidden="true">01</div>
            <div class="step-item__body">
              <h3 class="step-item__title"><?php esc_html_e('Pilih Produk','hakastore'); ?></h3>
              <p class="step-item__desc"><?php esc_html_e('Telusuri ribuan produk digital dan fisik. Gunakan filter kategori dan harga untuk menemukan yang tepat.','hakastore'); ?></p>
            </div>
          </div>
          <div class="step-item">
            <div class="step-item__num" aria-hidden="true">02</div>
            <div class="step-item__body">
              <h3 class="step-item__title"><?php esc_html_e('Tambah ke Keranjang','hakastore'); ?></h3>
              <p class="step-item__desc"><?php esc_html_e('Masukkan produk pilihan ke keranjang. Kamu bisa belanja dari beberapa penjual sekaligus.','hakastore'); ?></p>
            </div>
          </div>
          <div class="step-item">
            <div class="step-item__num" aria-hidden="true">03</div>
            <div class="step-item__body">
              <h3 class="step-item__title"><?php esc_html_e('Bayar Aman','hakastore'); ?></h3>
              <p class="step-item__desc"><?php esc_html_e('Pilih metode pembayaran favoritmu: transfer bank, QRIS, GoPay, OVO, atau Dana. Pembayaran aman dan terenkripsi.','hakastore'); ?></p>
            </div>
          </div>
          <div class="step-item">
            <div class="step-item__num" aria-hidden="true">04</div>
            <div class="step-item__body">
              <h3 class="step-item__title"><?php esc_html_e('Terima Produk','hakastore'); ?></h3>
              <p class="step-item__desc"><?php esc_html_e('Produk digital langsung bisa diunduh setelah pembayaran. Produk fisik dikirim ke alamatmu dalam 1-3 hari kerja.','hakastore'); ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="how-it-works__visual reveal reveal-delay-2" aria-hidden="true">
        <div style="display:flex;flex-direction:column;gap:1.5rem">
          <div style="display:flex;align-items:center;gap:1rem;padding:1.25rem;background:var(--color-surface);border-radius:var(--radius-lg);border:1px solid var(--color-border)">
            <div style="width:48px;height:48px;background:var(--color-gold-muted);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0">✅</div>
            <div>
              <div style="font-family:var(--font-heading);font-size:var(--text-sm);font-weight:700;color:var(--color-text);margin-bottom:.25rem">Pembayaran Berhasil</div>
              <div style="font-size:var(--text-xs);color:var(--color-text-muted)">Pesanan #HKT-2024-001 dikonfirmasi</div>
            </div>
          </div>
          <div style="display:flex;align-items:center;gap:1rem;padding:1.25rem;background:var(--color-surface);border-radius:var(--radius-lg);border:1px solid var(--color-border-gold)">
            <div style="width:48px;height:48px;background:var(--color-gold-muted);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0">📥</div>
            <div>
              <div style="font-family:var(--font-heading);font-size:var(--text-sm);font-weight:700;color:var(--color-gold);margin-bottom:.25rem">Produk Digital Siap Diunduh</div>
              <div style="font-size:var(--text-xs);color:var(--color-text-muted)">Template UI Pro v2.0 tersedia</div>
            </div>
          </div>
          <div style="display:flex;align-items:center;gap:1rem;padding:1.25rem;background:var(--color-surface);border-radius:var(--radius-lg);border:1px solid var(--color-border)">
            <div style="width:48px;height:48px;background:rgba(96,165,250,.12);border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;font-size:1.5rem;flex-shrink:0">🚚</div>
            <div>
              <div style="font-family:var(--font-heading);font-size:var(--text-sm);font-weight:700;color:var(--color-text);margin-bottom:.25rem">Produk Fisik Dikirim</div>
              <div style="font-size:var(--text-xs);color:var(--color-text-muted)">Estimasi tiba: 2 hari kerja</div>
            </div>
          </div>
          <div style="padding:1.25rem;background:var(--color-surface);border-radius:var(--radius-lg);border:1px solid var(--color-border)">
            <div style="font-size:var(--text-xs);color:var(--color-text-muted);margin-bottom:.75rem">Metode Pembayaran Tersedia</div>
            <div style="display:flex;gap:.5rem;flex-wrap:wrap">
              <span class="payment-icon">Transfer Bank</span>
              <span class="payment-icon">QRIS</span>
              <span class="payment-icon">GoPay</span>
              <span class="payment-icon">OVO</span>
              <span class="payment-icon">Dana</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
