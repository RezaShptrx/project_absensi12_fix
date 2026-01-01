function animateCounter(element) {
    const target = +element.getAttribute('data-target');
    const increment = target / 100;
    let current = 0;

    const updateCount = () => {
        if (current < target) {
            current += increment;
            element.innerText = Math.ceil(current);
            setTimeout(updateCount, 20);
        } else {
            element.innerText = target + (target >= 100 ? '+' : '');
        }
    };

    updateCount();
}

function animateRandomText(element) {
    const finalChar = element.getAttribute('data-final');
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let iterations = 0;
    const duration = 2500;
    const intervalTime = 100;
    const totalSteps = duration / intervalTime;

    const interval = setInterval(() => {
        let randomString = '';
        for (let i = 0; i < finalChar.length; i++) {
            randomString += chars[Math.floor(Math.random() * chars.length)];
        }

        element.textContent = randomString;
        iterations++;

        if (iterations >= totalSteps) {
            clearInterval(interval);
            element.textContent = finalChar;
        }
    }, intervalTime);
}

const observerOptions = {
    root: null,
    threshold: 0.5
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (!entry.isIntersecting) return;

        const counterEl = entry.target.querySelector('[data-target]');
        if (counterEl && !counterEl.classList.contains('counted')) {
            animateCounter(counterEl);
            counterEl.classList.add('counted');
        }

        const textEl = entry.target.querySelector('.accreditation-text');
        if (textEl && !textEl.classList.contains('revealed')) {
            setTimeout(() => {
                animateRandomText(textEl);
            }, 300);
            textEl.classList.add('revealed');
        }
    });
}, observerOptions);

document.querySelectorAll('.stats-card').forEach(card => {
    observer.observe(card);
});
