const counterDisplay = document.querySelector("#counter > div > p")
for (let i = 1; i <= +counterDisplay.dataset.count; i++) {
    setTimeout(() => {
        console.log(counterDisplay.innerHTML = i);
    }, 100 * i)
}


closeModalButton.onclick = () => {
    modalContainer.classList.remove("active");
}

openModalButton.onclick = () => {
    modalContainer.classList.add("active");
}

modalContainer.onclick = (event) => {
    modalContainer.classList.remove("active");
}

modal.onclick = (event) => {
    event.stopPropagation();
}

