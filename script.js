jQuery(document).ready(function($) {
    $('#user-menu-button').click(function() {
        $('#user-dropdown').toggleClass('hidden');
    });

    // Prevent dropdown from closing when clicking inside it
    $('#user-dropdown').click(function(event) {
        event.stopPropagation();
    });

    // Close dropdown when clicking outside of it
    $(document).click(function(event) {
        if (!$(event.target).closest('#user-menu-button').length && !$(event.target).closest('#user-dropdown').length) {
            $('#user-dropdown').addClass('hidden');
        }
    });
});
