@extends('layouts.user-layout')
@section('content')
<div class="container contact" style="display:block;">
	<section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-body row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center d-flex align-items-center justify-content-center">
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6667.9692057919865!2d44.416356!3d33.319218!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1364c767ce8958d2!2zZmx5ZHViYWkg2YHZhNin2Yog2K_YqNmK!5e0!3m2!1sar!2siq!4v1624527994130!5m2!1sar!2siq" width="100%" height="525" style="border:white solid 2px; padding:8px; background-color:white" allowfullscreen="" loading="lazy"></iframe> --}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.7890186174776!2d44.444743364498414!3d33.31065395037116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1557818d4a795455%3A0x691cb99259d60cc6!2z2LTYsdmD2Kkg2KfZhNiq2YrZhtipINmE2YTYrdmE2YjZhCDYp9mE2YXZg9iq2KjZitip!5e0!3m2!1sen!2siq!4v1668598636570!5m2!1sen!2siq" width="100%" height="525" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="inputName" class="form-control" />
              </div>
              <div class="form-group">
                <label for="inputEmail">E-Mail</label>
                <input type="email" id="inputEmail" class="form-control" />
              </div>
              <div class="form-group">
                <label for="inputSubject">Subject</label>
                <input type="text" id="inputSubject" class="form-control" />
              </div>
              <div class="form-group">
                <label for="inputMessage">Message</label>
                <textarea id="inputMessage" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Send message">
              </div>
            </div>
          </div>
        </div>
  
      </section>
</div>


@endsection
