<?php
defined('ABSPATH') || exit;

$b_title = get_theme_mod('hakastore_banner_title', 'Daftar Akun Pembeli & Dapatkan Akses Penuh');
$b_desc  = get_theme_mod('hakastore_banner_desc', 'Buat akun pembeli untuk menikmati kemudahan riwayat pesanan, unduh ulang file digital kapan saja seumur hidup, dan simpan alamat pengiriman favoritmu.');
?>
<section class="promo-banner" id="member" aria-labelledby="member-heading">
  <div class="container">
    <div class="promo-banner__inner">
      <div class="promo-banner__content reveal">
        <p class="promo-banner__tag"><?php esc_html_e('Akun Pelanggan Resmi','hakastore'); ?></p>
        <h2 class="promo-banner__title" id="member-heading">
          <?php echo esc_html($b_title); ?>
        </h2>
        <p class="promo-banner__desc">
          <?php echo esc_html($b_desc); ?>
        </p>
        <div class="promo-banner__actions">
          <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="btn btn--primary btn--lg" id="promo-daftar-btn">
            <?php esc_html_e('Daftar Akun Pembeli','hakastore'); ?>
          </a>
          <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn btn--ghost btn--lg" id="promo-shop-btn">
            <?php esc_html_e('Lihat Semua Produk','hakastore'); ?>
          </a>
        </div>
      </div>
      <div class="promo-banner__visual reveal reveal-delay-2" aria-hidden="true">
        <div style="display:flex;flex-direction:column;gap:1rem">
          <div style="display:flex;align-items:center;gap:1rem;padding:1rem 1.25rem;background:var(--color-surface);border:1px solid var(--color-border);border-radius:var(--radius-lg)">
            <span style="font-size:1.5rem;flex-shrink:0">📁</span>
            <div>
              <div style="font-family:var(--font-heading);font-size:var(--text-sm);font-weight:700;color:var(--color-text)">Arsip Unduhan Digital Seumur Hidup</div>
              <div style="font-size:var(--text-xs);color:var(--color-text-muted)">File yang dibeli tersimpan aman dan bisa diunduh kapan saja</div>
            </div>
          </div>
          <div style="display:flex;align-items:center;gap:1rem;padding:1rem 1.25rem;background:var(--color-surface);border:1px solid var(--color-border);border-radius:var(--radius-lg)">
            <span style="font-size:1.5rem;flex-shrink:0">🚚</span>
            <div>
              <div style="font-family:var(--font-heading);font-size:var(--text-sm);font-weight:700;color:var(--color-text)">Pelacakan Resi Otomatis</div>
              <div style="font-size:var(--text-xs);color:var(--color-text-muted)">Pantau status pengiriman pesanan fisikmu secara real-time</div>
            </div>
          </div>
          <div style="display:flex;align-items:center;gap:1rem;padding:1rem 1.25rem;background:var(--color-surface);border:1px solid var(--color-border);border-radius:var(--radius-lg)">
            <span style="font-size:1.5rem;flex-shrink:0">🎁</span>
            <div>
              <div style="font-family:var(--font-heading);font-size:var(--text-sm);font-weight:700;color:var(--color-text)">Voucher Diskon Pembeli Setia</div>
              <div style="font-size:var(--text-xs);color:var(--color-text-muted)">Dapatkan potongan harga khusus promo setiap bulannya</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
