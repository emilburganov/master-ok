closeModalButton.onclick = () => {
    modalContainer.classList.remove("active");
}

openModalButton.onclick = () => {
    modalContainer.classList.add("active");
}

modalContainer.onclick = () => {
    modalContainer.classList.remove("active");
}

modal.onclick = (event) => {
    event.stopPropagation();
}
