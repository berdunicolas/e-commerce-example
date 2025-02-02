let popoverList = [];
let updatePopoverList = function (){
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
    popoverList = [...popoverTriggerList]
        .map(popover => new bootstrap.Popover(popover));
}

export { updatePopoverList };