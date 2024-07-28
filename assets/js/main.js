// Get the elements
const editButtons = document.querySelectorAll('.edit-button');
const formTitle = document.getElementById('news-form-title');
const idInput = document.getElementById('id-input');
const titleInput = document.getElementById('title-input');
const descriptionInput = document.getElementById('description-input');
const submitButton = document.getElementById('news-form-submit-btn');
const closeEditButton = document.getElementById('close-edit-btn');

// Handle the click event on the edit buttons
editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the entry data
        const entryId = this.dataset.id;
        const entryTitle = this.parentElement.previousElementSibling.previousElementSibling.textContent;
        const entryDescription = this.parentElement.previousElementSibling.textContent;

        // Update the form
        formTitle.textContent = 'Edit News';
        idInput.value = entryId;
        titleInput.value = entryTitle;
        descriptionInput.value = entryDescription;
        submitButton.name = 'update';
        submitButton.textContent = 'Save';
        closeEditButton.style.display = 'block';
    });
});

// Handle the click event on the close button
closeEditButton.addEventListener('click', function() {
    // Revert the form
    formTitle.textContent = 'Create News';
    titleInput.value = '';
    descriptionInput.value = '';
    submitButton.name = 'create';
    submitButton.textContent = 'Create';
    this.style.display = 'none';
});