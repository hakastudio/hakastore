<?php
/**
 * HakaStore - Site Footer (Customizer & Back to Top Ready)
 */
defined('ABSPATH') || exit;

$footer_desc = get_theme_mod('hakastore_footer_text', 'Toko resmi terpercaya untuk produk digital dan fisik berkualitas. Dikirim dan dilayani langsung oleh tim resmi HakaStore dengan jaminan kepuasan pelanggan.');
$ig_link     = get_theme_mod('hakastore_instagram', 'https://instagram.com');
$wa_num      = get_theme_mod('hakastore_whatsapp', '6281234567890');
?>
</main><!-- /#main-content -->

<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="footer-main">

      <!-- Brand column -->
      <div class="footer-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-brand__logo" aria-label="HakaStore Beranda">
          <div class="site-brand__logo" aria-hidden="true">H</div>
          <span class="footer-brand__name">Haka<span>Store</span></span>
        </a>
        <p class="footer-brand__desc">
          <?php echo esc_html($footer_desc); ?>
        </p>
        <div class="footer-social" aria-label="<?php esc_attr_e('Media Sosial & WhatsApp','hakastore'); ?>">
          <?php if ($ig_link): ?>
          <a href="<?php echo esc_url($ig_link); ?>" target="_blank" rel="noopener" class="footer-social__link" aria-label="Instagram">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
          </a>
          <?php endif; ?>
          <?php if ($wa_num): ?>
          <a href="https://wa.me/<?php echo esc_attr($wa_num); ?>" target="_blank" rel="noopener" class="footer-social__link" aria-label="WhatsApp Admin" title="Chat WhatsApp">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.067-2.227-.565-1.956-.808-3.203-2.793-3.298-2.924-.099-.13-1.047-1.393-1.047-2.656 0-1.263.66-1.884.894-2.14.234-.256.51-.32.68-.32.17 0 .341.002.49.009.158.007.37-.06.577.442.213.518.725 1.767.788 1.897.063.13.104.282.02.447-.082.164-.124.266-.245.41-.123.144-.26.32-.37.43-.124.124-.252.257-.108.506.144.249.638 1.053 1.368 1.705.94.84 1.734 1.1 1.983 1.224.248.125.393.104.538-.063.145-.166.62-.724.786-.972.166-.248.33-.207.558-.124.228.083 1.45.684 1.698.808.248.125.414.187.476.29.062.104.062.602-.082 1.007z"/></svg>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Catalog links -->
      <div class="footer-col">
        <h3 class="footer-col__title"><?php esc_html_e('Kategori Produk','hakastore'); ?></h3>
        <ul class="footer-col__links">
          <li><a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="footer-col__link"><?php esc_html_e('Semua Produk','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(add_query_arg('filter_type', 'digital', wc_get_page_permalink('shop'))); ?>" class="footer-col__link"><?php esc_html_e('⚡ Produk Digital','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(add_query_arg('filter_type', 'physical', wc_get_page_permalink('shop'))); ?>" class="footer-col__link"><?php esc_html_e('📦 Produk Fisik','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(add_query_arg('orderby', 'popularity', wc_get_page_permalink('shop'))); ?>" class="footer-col__link"><?php esc_html_e('Produk Terpopuler','hakastore'); ?></a></li>
        </ul>
      </div>

      <!-- Buyer Account Links -->
      <div class="footer-col">
        <h3 class="footer-col__title"><?php esc_html_e('Akun Pembeli','hakastore'); ?></h3>
        <ul class="footer-col__links">
          <li><a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="footer-col__link"><?php esc_html_e('Masuk / Daftar Akun','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="footer-col__link"><?php esc_html_e('Riwayat Pesanan','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(wc_get_account_endpoint_url('downloads')); ?>" class="footer-col__link"><?php esc_html_e('Unduhan Digital Saya','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="footer-col__link"><?php esc_html_e('Keranjang Belanja','hakastore'); ?></a></li>
        </ul>
      </div>

      <!-- Support links -->
      <div class="footer-col">
        <h3 class="footer-col__title"><?php esc_html_e('Layanan Pelanggan','hakastore'); ?></h3>
        <ul class="footer-col__links">
          <li><a href="<?php echo esc_url(home_url('/#cara-kerja')); ?>" class="footer-col__link"><?php esc_html_e('Panduan Pembelian','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/tentang-kami')); ?>" class="footer-col__link"><?php esc_html_e('Tentang Kami','hakastore'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/garansi')); ?>" class="footer-col__link"><?php esc_html_e('Garansi & Retur','hakastore'); ?></a></li>
          <?php if ($wa_num): ?>
          <li><a href="https://wa.me/<?php echo esc_attr($wa_num); ?>" target="_blank" rel="noopener" class="footer-col__link" style="color:var(--color-gold); font-weight:600">💬 Hubungi via WhatsApp</a></li>
          <?php endif; ?>
        </ul>
      </div>

    </div><!-- /.footer-main -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
      <p class="footer-bottom__copy">
        &copy; <?php echo date('Y'); ?>
        <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_theme_mod('hakastore_store_label', 'HakaStore Official Store')); ?></a>.
        <?php esc_html_e('Hak cipta dilindungi.','hakastore'); ?>
      </p>

      <div class="footer-payment" aria-label="<?php esc_attr_e('Metode Pembayaran','hakastore'); ?>">
        <span class="footer-payment__label"><?php esc_html_e('Metode Bayar:','hakastore'); ?></span>
        <span class="payment-icon">Transfer Bank</span>
        <span class="payment-icon">QRIS</span>
        <span class="payment-icon">GoPay</span>
        <span class="payment-icon">OVO</span>
        <span class="payment-icon">Dana</span>
      </div>
    </div>

  </div><!-- /.container -->
</footer>

<!-- Floating Back to Top Button -->
<button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Kembali ke atas','hakastore'); ?>" title="<?php esc_attr_e('Kembali ke atas','hakastore'); ?>">
  <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/></svg>
</button>

<?php wp_footer(); ?>
</body>
</html>
