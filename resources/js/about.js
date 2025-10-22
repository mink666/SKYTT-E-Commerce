document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.scroll-card');
    let current = 0, lock = true;

    function showCard(idx) {
        cards.forEach((c, i) => {
            c.classList.toggle('active', i === idx);
        });
    }

    window.addEventListener('scroll', () => {
        if (!lock) return;
        const container = document.getElementById('scroll-cards-container');
        const rect = container.getBoundingClientRect();
        if(rect.top < window.innerHeight / 3 && current < cards.length - 1) {
            lock = false;
            setTimeout(() => {
                current = (current + 1) % cards.length;
                showCard(current);
                lock = true;
            }, 400);
        }
    });
});
