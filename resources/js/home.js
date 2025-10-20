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
