document.querySelectorAll("#counter > div > p").forEach((counter) => {

    for (let i = 1; i <= +counter.dataset.count; i++) {
        setTimeout(() => {
            counter.innerHTML = i;
        }, 100 * i)
    }
});
