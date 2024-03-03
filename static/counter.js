function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)
    );
}

function handleIntersection(entries, observer) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            startCounting(entry.target);
            observer.unobserve(entry.target);
        }
    });
}

function startCounting(target) {
    let currentValue = 0;
    const finalValue = parseInt(target.getAttribute('data-final-value'), 10);
    const duration = 2000; // milliseconds
    const interval = 10; // milliseconds
    const steps = duration / interval;
    const increment = finalValue / steps;

    const updateCounter = () => {
        if (currentValue < finalValue) {
            currentValue += increment;
            target.textContent = Math.round(currentValue);
            requestAnimationFrame(updateCounter);
        } else {
            target.textContent = finalValue;
            target.classList.add('is-visible');
        }
    };

    updateCounter();
}

const counters = document.querySelectorAll('.counter');
counters.forEach(counter => {
    const observer = new IntersectionObserver(handleIntersection, { threshold: 0.5 });
    observer.observe(counter);
});

// Set data-final-value attribute for each counter
document.getElementById('counter1').setAttribute('data-final-value', '4000');
document.getElementById('counter2').setAttribute('data-final-value', '18');