document.getElementById('signupForm').addEventListener('submit', function(event) {
    var password = document.querySelector('input[name="password"]').value;
    var confirmPassword = document.querySelector('input[name="confirmPassword"]').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match');
        event.preventDefault();
    }
});

function removeSubAdmins() {
    var checkboxes = document.querySelectorAll('input[name="selectedSubAdmins"]:checked');
    var selectedSubAdmins = Array.from(checkboxes).map(function(checkbox) {
        return checkbox.value;
    });

    if (selectedSubAdmins.length > 0) {
        // Send the selected sub-admin IDs to the server for removal
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the server response, e.g., display a success message
                alert(xhr.responseText);
            }
        };

        xhr.open('POST', 'remove_subadmins.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('selectedSubAdmins=' + JSON.stringify(selectedSubAdmins));
    } else {
        alert('Please select at least one Sub-Admin to remove.');
    }
}
