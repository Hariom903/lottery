<!-- filepath: resources/views/emails/contact.blade.php -->
<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Topic:</strong> {{ $data['Topic'] }}</p>
@if(!empty($data['subTopic']))
<p><strong>Sub Topic:</strong> {{ $data['subTopic'] }}</p>
@endif
<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
