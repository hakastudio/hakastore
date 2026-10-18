<?php
defined('ABSPATH') || exit;

$perk1_t = get_theme_mod('hakastore_perk_1_title', 'Instant Download 24/7');
$perk1_d = get_theme_mod('hakastore_perk_1_desc', 'File digital langsung aktif otomatis setelah pembayaran diverifikasi tanpa menunggu konfirmasi manual.');

$perk2_t = get_theme_mod('hakastore_perk_2_title', 'Pengiriman Cepat & Berresi');
$perk2_d = get_theme_mod('hakastore_perk_2_desc', 'Pengemasan rapi dan aman dengan bubble wrap. Resi kurir terintegrasi otomatis untuk pelacakan mudah.');

$perk3_t = get_theme_mod('hakastore_perk_3_title', 'Garansi Kepuasan 100%');
$perk3_d = get_theme_mod('hakastore_perk_3_desc', 'Dukungan penuh jika ada kendala unduhan file, serta garansi retur/tukar produk fisik hingga 7 hari.');

$perk4_t = get_theme_mod('hakastore_perk_4_title', 'Pembayaran Otomatis');
$perk4_d = get_theme_mod('hakastore_perk_4_desc', 'Dukung QRIS instan semua bank/e-wallet, Virtual Account BCA/Mandiri/BRI, serta GoPay, OVO, dan Dana.');
?>
<section class="vendors-section" id="keunggulan" aria-labelledby="perks-heading">
  <div class="container">
    <div class="section-header section-header--center reveal">
      <p class="section-eyebrow"><?php esc_html_e('Mengapa Belanja di Sini?','hakastore'); ?></p>
      <h2 class="section-title" id="perks-heading">
        <?php esc_html_e('Keunggulan Toko Resmi','hakastore'); ?> <em>HakaStore</em>
      </h2>
      <p class="section-subtitle">
        <?php esc_html_e('Kami berkomitmen memberikan kualitas produk terbaik, proses transaksi teraman, dan layanan purna jual yang responsif.','hakastore'); ?>
      </p>
    </div>
    <div class="vendors-grid">

      <div class="vendor-card reveal">
        <div class="vendor-card__avatar" style="border-color:var(--color-gold); color:var(--color-gold)">
          ⚡
          <span class="vendor-card__verified" style="background:var(--color-gold)">✓</span>
        </div>
        <div class="vendor-card__name"><?php echo esc_html($perk1_t); ?></div>
        <div class="vendor-card__category"><?php esc_html_e('Produk Digital Langsung Siap','hakastore'); ?></div>
        <p style="font-size:var(--text-xs); color:var(--color-text-muted); line-height:1.6; margin-top:0.5rem">
          <?php echo esc_html($perk1_d); ?>
        </p>
      </div>

      <div class="vendor-card reveal reveal-delay-1">
        <div class="vendor-card__avatar" style="border-color:#3B82F6; color:#3B82F6">
          🚚
          <span class="vendor-card__verified" style="background:#3B82F6">✓</span>
        </div>
        <div class="vendor-card__name"><?php echo esc_html($perk2_t); ?></div>
        <div class="vendor-card__category"><?php esc_html_e('Produk Fisik Terlacak','hakastore'); ?></div>
        <p style="font-size:var(--text-xs); color:var(--color-text-muted); line-height:1.6; margin-top:0.5rem">
          <?php echo esc_html($perk2_d); ?>
        </p>
      </div>

      <div class="vendor-card reveal reveal-delay-2">
        <div class="vendor-card__avatar" style="border-color:#10B981; color:#10B981">
          🛡️
          <span class="vendor-card__verified" style="background:#10B981">✓</span>
        </div>
        <div class="vendor-card__name"><?php echo esc_html($perk3_t); ?></div>
        <div class="vendor-card__category"><?php esc_html_e('Jaminan Kualitas Produk','hakastore'); ?></div>
        <p style="font-size:var(--text-xs); color:var(--color-text-muted); line-height:1.6; margin-top:0.5rem">
          <?php echo esc_html($perk3_d); ?>
        </p>
      </div>

      <div class="vendor-card reveal reveal-delay-3">
        <div class="vendor-card__avatar" style="border-color:#8B5CF6; color:#8B5CF6">
          💳
          <span class="vendor-card__verified" style="background:#8B5CF6">✓</span>
        </div>
        <div class="vendor-card__name"><?php echo esc_html($perk4_t); ?></div>
        <div class="vendor-card__category"><?php esc_html_e('QRIS, Bank, & E-Wallet','hakastore'); ?></div>
        <p style="font-size:var(--text-xs); color:var(--color-text-muted); line-height:1.6; margin-top:0.5rem">
          <?php echo esc_html($perk4_d); ?>
        </p>
      </div>

    </div>
  </div>
</section>
