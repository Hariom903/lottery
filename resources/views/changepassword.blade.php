<!-- filepath: c:\Users\user\Desktop\lottery\lottery_apk\resources\views\changepassword.blade.php -->
<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="changepasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changepasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="changePasswordForm">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <span class="red-error" id="error_current_password"></span>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                        <span class="red-error" id="error_new_password"></span>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation">
                        <span class="red-error" id="error_new_password_confirmation"></span>
                    </div>
                    <div class="mb-3">
                        <button type="button" onclick="chapassword()" class="btn btn-primary">Change Password</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function chapassword() {
        // Clear previous errors
        $('#error_current_password').text('');
        $('#error_new_password').text('');
        $('#error_new_password_confirmation').text('');

        var currentPassword = $('#current_password').val();
        var newPassword = $('#new_password').val();
        var confirmPassword = $('#new_password_confirmation').val();

        if (newPassword !== confirmPassword) {
            $('#error_new_password_confirmation').text('New password and confirm password do not match.');
            return;
        }

        $.ajax({
            url: '{{ route('change.password') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                current_password: currentPassword,
                new_password: newPassword,
                new_password_confirmation: confirmPassword
            },
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#changepassword').modal('hide');
                    $('#changePasswordForm')[0].reset();
                    window.location.reload();
                }
            },
            error: function(xhr) {
                var res = xhr.responseJSON;
                if (res && res.errors) {
                    if (res.errors.current_password) {
                        $('#error_current_password').text(res.errors.current_password[0]);
                    }
                    if (res.errors.new_password) {
                        $('#error_new_password').text(res.errors.new_password[0]);
                    }
                    if (res.errors.new_password_confirmation) {
                        $('#error_new_password_confirmation').text(res.errors.new_password_confirmation[0]);
                    }
                } else {
                    alert('An unexpected error occurred.');
                }
            }
        });
    }
</script>
