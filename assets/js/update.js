var Modal = document.getElementById('Modal');

Modal.addEventListener('show.bs.modal', function() {
    let maVar = document.getElementById('exampleFormControlSelect1').value;
    // je recupere l'element dans l'accordion qui a l'ID du select
    let var2 = document.getElementById('article-' + maVar);

    let title = var2.getAttribute('article-title');
    let content = var2.textContent;
    document.getElementById('newId').value = maVar;
    document.getElementById('ModalLabel').value = title;
    document.getElementById('ModalBody').value = content;
})

///////////////////////////////////
var bookModal = document.getElementById('updateBook');

bookModal.addEventListener('show.bs.modal', function() {
    let bookId = document.getElementById('updateBookSelect').value;

    let bookTitle = bookId.getAttribute('book-title');
    let bookResume = bookId.getAttribute('book-resume');
    document.getElementById('bookId').value = bookId;
    document.getElementById('updateBookTitle').value = bookTitle;
    document.getElementById('updateBookResume').value = bookResume;

})