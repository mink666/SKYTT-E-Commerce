document.addEventListener('DOMContentLoaded', () => { // init khi DOM sẵn
  const root = document.querySelector('[data-hero]'); if (!root) return; // chọn hero
  const track = root.querySelector('[data-hero-track]');                 // dải slide
  const slides = [...track.children];                                    // các slide
  const prev = root.querySelector('[data-hero-prev]');                   // nút trái
  const next = root.querySelector('[data-hero-next]');                   // nút phải
  const dotsWrap = root.querySelector('[data-hero-dots]');               // chấm
  let i = 0, t, ms = 5000, n = slides.length;                            // state

  track.style.width = `${n * 100}%`;                                     // tổng chiều rộng
  slides.forEach(s => s.style.width = `${100 / n}%`);                    // mỗi slide = 1/n

  const dots = slides.map((_, k) => {                                    // tạo dots
    const b = document.createElement('button');
    b.className = 'w-2.5 h-2.5 rounded-full bg-white/60 hover:bg-white ring-1 ring-black/10';
    b.onclick = () => go(k); dotsWrap.appendChild(b); return b;
  });

  const render = () => {                                                  // cập nhật UI
    track.style.transform = `translateX(-${(100 / n) * i}%)`;
    dots.forEach((d, k) => d.style.opacity = k === i ? '1' : '0.6');
  };

  const go = k => { i = (k + n) % n; render(); restart(); };             // nhảy tới k
  prev?.addEventListener('click', () => go(i - 1));                      // prev
  next?.addEventListener('click', () => go(i + 1));                      // next

  const start = () => { if (n > 1) t = setInterval(() => go(i + 1), ms); }; // auto-play
  const stop = () => { if (t) clearInterval(t); };                        // dừng
  const restart = () => { stop(); start(); };                             // reset

  root.addEventListener('mouseenter', stop);                              // hover dừng
  root.addEventListener('mouseleave', start);                             // ra chuột chạy

  render(); start();                                                      // khởi động
});

// ===== Best-seller carousel (1-2-3 cột) =====
(function () {
  const roots = document.querySelectorAll('[data-carousel]'); // chọn tất cả carousel
  if (!roots.length) return;

  roots.forEach((root) => {
    const track = root.querySelector('[data-carousel-track]');       // track
    const items = [...root.querySelectorAll('[data-carousel-item]')]; // item
    const prev  = root.querySelector('[data-carousel-prev]');        // nút prev
    const next  = root.querySelector('[data-carousel-next]');        // nút next
    const dotsW = root.querySelector('[data-carousel-dots]');        // dots wrap
    let cols = 1, page = 0, pages = 1;

    const computeCols = () => {                                       // cols responsive
      const w = window.innerWidth;
      if (w >= 1024) return 3; // lg
      if (w >= 768)  return 2; // md
      return 1;                 // sm
    };

    function layout() {                                               // set width & pages
      cols = computeCols();
      items.forEach(it => it.style.width = `${100 / cols}%`);         // mỗi item 1/cols
      pages = Math.max(1, Math.ceil(items.length / cols));            // tổng số trang
      page = Math.min(page, pages - 1);                               // không vượt trang cuối
      buildDots();
      render();
    }

    function render() {                                               // translate theo trang
      track.style.transform = `translateX(-${page * 100}%)`;
      dots.forEach((d, i) => d.classList.toggle('opacity-100', i === page));
      dots.forEach((d, i) => d.classList.toggle('opacity-40', i !== page));
    }

    function go(p) { page = (p + pages) % pages; render(); }          // chuyển trang
    prev?.addEventListener('click', () => go(page - 1));
    next?.addEventListener('click', () => go(page + 1));

    let dots = [];
    function buildDots() {                                            // tạo dots ngắn
      dotsW.innerHTML = '';
      dots = Array.from({ length: pages }).map((_, i) => {
        const el = document.createElement('span');
        el.className = 'w-8 h-1 rounded-full bg-slate-300 opacity-40 cursor-pointer'; // “gạch” mảnh
        el.onclick = () => go(i);
        dotsW.appendChild(el);
        return el;
      });
    }

    window.addEventListener('resize', () => layout());                // reflow khi resize
    layout();                                                         // khởi tạo
  });
})();
