@extends('layout.app')
@section('content')
<h1 class="fw-bold mb-3 gradient-text">Contact Support</h1>
<p class="fs-5 mb-4">Need assistance? Our team is here to help with any questions related to the Library System.</p>


<div class="row">
<div class="col-md-6">
<form class="row g-3">
<div class="col-md-6">
<label class="form-label">Name</label>
<input type="text" class="form-control" placeholder="Your Name">
</div>
<div class="col-md-6">
<label class="form-label">Email</label>
<input type="email" class="form-control" placeholder="Your Email">
</div>
<div class="col-12">
<label class="form-label">Message</label>
<textarea class="form-control" rows="4" placeholder="Write your message here..."></textarea>
</div>
<div class="col-12 text-end">
<button class="btn-purple">Send Message</button>
</div>
</form>
</div>


<div class="col-md-6 text-center">
<img src="/images/library_contact.png" class="img-fluid rounded shadow" alt="Contact">
</div>
</div>
@endsection