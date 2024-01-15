openModalButtonUpdate.onclick = () => {
    modalContainerUpdate.classList.add("active");
}

modalContainerUpdate.onclick = () => {
    modalContainerUpdate.classList.remove("active");
}

modalUpdate.onclick = (event) => {
    event.stopPropagation();
}