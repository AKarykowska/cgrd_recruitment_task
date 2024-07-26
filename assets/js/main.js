// Get the elements
var editButtons = document.querySelectorAll('.edit-button');
var formTitle = document.getElementById('news-form-title');
var idInput = document.getElementById('id-input');
var titleInput = document.getElementById('title-input');
var descriptionInput = document.getElementById('description-input');
var submitButton = document.getElementById('news-form-submit-btn');
var closeEditButton = document.getElementById('close-edit-btn');

// Handle the click event on the edit buttons
editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Get the entry data
        var entryId = this.dataset.id;
        var entryTitle = this.parentElement.previousElementSibling.previousElementSibling.textContent;
        var entryDescription = this.parentElement.previousElementSibling.textContent;

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