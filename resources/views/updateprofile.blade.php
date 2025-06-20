<!-- filepath: c:\Users\user\Desktop\lottery\lottery_apk\resources\views\changepassword.blade.php -->
<div class="modal fade" id="updateprofile" tabindex="-1" aria-labelledby="updateprofileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateprofileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <a href="{{  Auth::user()->image ? asset('images/user/'.Auth::user()->image) : asset('images/user/avatar-1.jpg') }}" class="glightbox " data-width="600px">
                  <img src="{{ Auth::user()->image ? asset('images/user/'.Auth::user()->image) : asset('images/user/avatar-1.jpg') }}" width="150px" alt="">
                    </a>
                </div>
                <form id="updateprofileForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="{{Auth::user()->name }}" name="name">
                        <span class="red-error" id="error_name"></span>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">phone </label>
                        <input type="text" class="form-control" id="phone" value="{{Auth::user()->phone }}" name="phone">
                        <span class="red-error" id="error_phone"></span>
                    </div>
                    <div class="mb-3">
                        <label for="profile_pic" class="form-label">Profile picture </label>
                        <input type="file" class="form-control" id="profile_pic"
                            name="profile_pic">
                        <span class="red-error" id="error_profile_pic"></span>
                    </div>
                    <div class="mb-3">
                        <button type="button"  onclick="updateprofile()"  class="btn btn-primary">Update Profile </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function updateprofile() {
        // Clear previous errors
        $('#error_name').text('');
        $('#error_phone').text('');
        $('#profile_pic').text('');

        var name = $('#name').val();

        var phone = $('#phone').val();
        var profile_pic = $('#profile_pic')[0].files[0];

         var formdata = new FormData();

        formdata.append('name',name);
        formdata.append('phone',phone);
        formdata.append('image',profile_pic);
        formdata.append( "_token",'{{ csrf_token() }}');

        $.ajax({
            url: '{{ route('update.profile') }}',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formdata,
            success: function(response) {
                if (response.status === 'success') {
                    $('#updateprofile').modal('hide');
                    $('#updateprofileForm')[0].reset();
                    window.location.reload();
                }
                else{
                    alert("hi ")
                }
            },
            error: function(xhr) {
                var res = xhr.responseJSON;
                if (res && res.errors) {
                    if (res.errors.name) {
                        $('#error_name').text(res.errors.name[0]);
                    }
                    if (res.errors.phone) {
                        $('#error_phone').text(res.errors.phone[0]);
                    }
                    if (res.errors.image) {
                        $('#profile_pic').text(res.errors.image[0]);
                    }
                } else {
                    alert('An unexpected error occurred.');
                }
            }
        });
    }

     const lightbox = GLightbox({
    selector: '.glightbox',

  });

</script>
