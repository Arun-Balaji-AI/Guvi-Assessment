$(document).ready(function(){
    var username = localStorage.getItem('username'); // Retrieve username from localStorage
    if (username) {
        $.ajax({
            type: 'GET',
            url: './php/profile.php',
            data: { username: username }, // Send username to profile.php
            success: function(response) {
                if (response.error) {
                    console.error('Error fetching user data:', response.error);
                } else {
                    $('#name label').text('Name: ' + response.name);
                    $('#email label').text('E-mail: ' + response.email);
                    $('#dob label').text('Date of Birth: ' + response.dob);
                    $('#contact label').text('Phone Number: ' + response.contact);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching user data:', error);
            }
        });
    } else {
        console.error('Username not found in localStorage.');
    }
});
