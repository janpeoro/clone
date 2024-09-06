document.addEventListener('DOMContentLoaded', function() {
    function showSection(sectionToShow) {
        document.querySelectorAll('.modal-form-sections > div').forEach(section => {
            section.style.display = 'none';
        });
        sectionToShow.style.display = 'block';
    }
  
    function validateSection(fields) {
        let valid = true;
        fields.forEach(({ id, errorId }) => {
            const value = document.getElementById(id).value.trim();
            const errorMessage = document.getElementById(errorId);
            if (!value) {
                errorMessage.style.display = 'block';
                valid = false;
            } else {
                errorMessage.style.display = 'none';
            }
        });
        return valid;
    }
  
    function resetForm() {
        document.getElementById('createClassForm').reset();
        document.querySelectorAll('.modal-form-sections > div').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById('section-1').style.display = 'block';
        document.querySelectorAll('.text-danger').forEach(errorMessage => {
            errorMessage.style.display = 'none';
        });
    }
  
    document.addEventListener('click', function(event) {
        if (event.target.matches('#next-to-2')) {
            if (validateSection([
                { id: 'className', errorId: 'error-message-1' },
                { id: 'section', errorId: 'error-message-1' }
            ])) {
                showSection(document.getElementById('section-2'));
            }
        } else if (event.target.matches('#back-to-1')) {
            showSection(document.getElementById('section-1'));
        } else if (event.target.matches('#next-to-3')) {
            if (validateSection([
                { id: 'subject', errorId: 'error-message-2' },
                { id: 'room', errorId: 'error-message-2' }
            ])) {
                showSection(document.getElementById('section-3'));
            }
        } else if (event.target.matches('#back-to-2')) {
            showSection(document.getElementById('section-2'));
        }
    });
  
    document.getElementById('createClassForm').addEventListener('submit', function(event) {
        if (!validateSection([
            { id: 'schedule', errorId: 'error-message-3' }
        ])) {
            event.preventDefault(); // Prevent form submission
        }
    });
  
    const createClassModal = new bootstrap.Modal(document.getElementById('createClassModal'));
    const joinClassModal = new bootstrap.Modal(document.getElementById('joinClassModal'));
  
    document.getElementById('create-class-option').addEventListener('click', function() {
        createClassModal.show();
    });
  
    document.getElementById('join-class-option').addEventListener('click', function() {
        joinClassModal.show();
    });
  
    // Reset form fields when the modal is hidden
    document.getElementById('createClassModal').addEventListener('hidden.bs.modal', function () {
        resetForm();
    });
  });