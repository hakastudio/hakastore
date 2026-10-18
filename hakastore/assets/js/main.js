/**
 * HakaStore Marketplace & Official Store - Main JavaScript
 */

(function () {
  'use strict';

  // --- Fixed Header scroll shadow & backdrop ---
  const header = document.getElementById('site-header');
  if (header) {
    const onScroll = () => {
      header.classList.toggle('scrolled', window.scrollY > 15);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  // --- Floating Back to Top Button ---
  const backToTopBtn = document.getElementById('back-to-top');
  if (backToTopBtn) {
    const checkScrollTop = () => {
      if (window.scrollY > 300) {
        backToTopBtn.classList.add('is-visible');
      } else {
        backToTopBtn.classList.remove('is-visible');
      }
    };
    window.addEventListener('scroll', checkScrollTop, { passive: true });
    checkScrollTop();

    backToTopBtn.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // --- Mobile menu toggle ---
  const navToggle    = document.getElementById('nav-toggle');
  const mobileMenu   = document.getElementById('mobile-menu');
  const iconMenu     = document.getElementById('icon-menu');
  const iconClose    = document.getElementById('icon-close');

  if (navToggle && mobileMenu) {
    navToggle.addEventListener('click', () => {
      const isOpen = mobileMenu.classList.toggle('is-open');
      mobileMenu.hidden = !isOpen;
      navToggle.setAttribute('aria-expanded', String(isOpen));
      if (iconMenu)  iconMenu.style.display  = isOpen ? 'none'  : '';
      if (iconClose) iconClose.style.display = isOpen ? ''      : 'none';
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileMenu.classList.contains('is-open')) {
        mobileMenu.classList.remove('is-open');
        mobileMenu.hidden = true;
        navToggle.setAttribute('aria-expanded', 'false');
        if (iconMenu)  iconMenu.style.display  = '';
        if (iconClose) iconClose.style.display = 'none';
        document.body.style.overflow = '';
        navToggle.focus();
      }
    });

    // Close mobile menu when clicking outside
    mobileMenu.addEventListener('click', (e) => {
      if (e.target.tagName === 'A') {
        mobileMenu.classList.remove('is-open');
        mobileMenu.hidden = true;
        navToggle.setAttribute('aria-expanded', 'false');
        if (iconMenu)  iconMenu.style.display  = '';
        if (iconClose) iconClose.style.display = 'none';
        document.body.style.overflow = '';
      }
    });
  }

  // --- Scroll-reveal animation ---
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach((el) => observer.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add('is-visible'));
  }

  // --- Tab panels ---
  document.querySelectorAll('.tab-nav').forEach((nav) => {
    const buttons = nav.querySelectorAll('.tab-btn');
    buttons.forEach((btn) => {
      btn.addEventListener('click', () => {
        const target = document.getElementById(btn.getAttribute('aria-controls'));
        if (!target) return;
        buttons.forEach((b) => {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        nav.closest('.product-tabs')?.querySelectorAll('.tab-panel').forEach((p) => p.classList.remove('active'));
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');
        target.classList.add('active');
      });
    });
  });

  // --- Product gallery thumbnail switch ---
  const galleryThumbs = document.querySelectorAll('.product-gallery__thumb');
  const mainImg       = document.getElementById('main-product-img');
  galleryThumbs.forEach((thumb) => {
    thumb.addEventListener('click', () => {
      galleryThumbs.forEach((t) => t.classList.remove('active'));
      thumb.classList.add('active');
      if (mainImg) {
        const newSrc = thumb.dataset.img;
        if (newSrc) {
          mainImg.style.opacity = '0';
          setTimeout(() => { mainImg.src = newSrc; mainImg.style.opacity = '1'; }, 150);
        }
      }
    });
  });

  // --- Add to cart AJAX ---
  document.querySelectorAll('.add-to-cart-btn').forEach((btn) => {
    btn.addEventListener('click', async () => {
      const productId = btn.dataset.productId;
      if (!productId) return;
      btn.disabled = true;
      const originalText = btn.innerHTML;
      btn.textContent = '...';

      try {
        const resp = await fetch('/?wc-ajax=add_to_cart', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `product_id=${productId}&quantity=1`,
        });
        const cartCount = document.getElementById('cart-count');
        if (cartCount) {
          const current = parseInt(cartCount.textContent) || 0;
          cartCount.textContent = current + 1;
        }
        btn.textContent = '✓ Ditambahkan';
        setTimeout(() => {
          btn.disabled = false;
          btn.innerHTML = originalText;
        }, 1800);
      } catch {
        btn.disabled = false;
        btn.innerHTML = originalText;
      }
    });
  });

})();
