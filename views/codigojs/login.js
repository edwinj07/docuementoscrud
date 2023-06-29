$(document).ready(function() {
    $('#logout').click(function(e) {
        e.preventDefault();
        $.get('index.php?logout=1', function() {
            window.location.href = 'login.php';
        });
    });
});