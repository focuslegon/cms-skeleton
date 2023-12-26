@extends('layouts.main')
@section('page')
    


<div
class="hero page-inner overlay"
style="background-image: url('/assets/images/hero_bg_1.jpg')"
>
<div class="container">
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-9 text-center mt-5">
      <h1 class="heading" data-aos="fade-up">Contact Us</h1>

      <nav
        aria-label="breadcrumb"
        data-aos="fade-up"
        data-aos-delay="200"
      >
        <ol class="breadcrumb text-center justify-content-center">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li
            class="breadcrumb-item active text-white-50"
            aria-current="page"
          >
            Contact
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
</div>

<div class="section">
    <div class="container">
      <div class="row">
        <div
          class="col-lg-4 mb-5 mb-lg-0"
          data-aos="fade-up"
          data-aos-delay="100"
        >
          <div class="contact-info">
            <div class="address mt-2">
              <i class="icon-room"></i>
              <h4 class="mb-2">Location:</h4>
              <p>
               {{settings('location')}}
              </p>
            </div>

            <div class="open-hours mt-4">
              <i class="icon-clock-o"></i>
              <h4 class="mb-2">Open Hours:</h4>
              <p>
               From: {{settings('working_time_from')}}
              </p>
              <p>
                To: {{settings('working_time_to')}}
               </p>
            </div>

            <div class="email mt-4">
              <i class="icon-envelope"></i>
              <h4 class="mb-2">Email:</h4>
              <p>{{ settings('email') }}</p>
            </div>

            <div class="phone mt-4">
              <i class="icon-phone"></i>
              <h4 class="mb-2">Call:</h4>
              <p>{{settings('phone_number_1')}}</p>
              <p>{{settings('phone_number_2')}}</p>
            </div>


            <div class="phone mt-4">
            <div class="widget">
               
            <ul class="list-unstyled social d-inline" style="display: block ruby !important; margin: 30px;">
                <li>
                  <a href="{{settings('instagram')}}"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="{{settings('twitter')}}"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="{{settings('facebook')}}"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="{{settings('linkedin')}}"><span class="icon-linkedin"></span></a>
                </li>
               
              </ul>
            </div>
            </div>


          </div>
        </div>
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <form class="contact-form" method="post" action="{{route('contact-us')}}">
                @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input
                  type="text"
                  name="name"
                  class="form-control"
                  placeholder="Your Name"
                />
                 <code class=" error-response name"></code>
            <br>
              </div>
              <div class="col-6 mb-3">
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  placeholder="Your Email"
                />
                 <code class=" error-response email"></code>
            <br>
              </div>
              <div class="col-12 mb-3">
                <input
                  type="text"
                  name="subject"
                  class="form-control"
                  placeholder="Subject"
                />
                 <code class=" error-response subject"></code>
            <br>
              </div>
              <div class="col-12 mb-3">
                <textarea
                  name="message"
                  id=""
                  cols="30"
                  rows="7"
                  class="form-control"
                  placeholder="Message"
                ></textarea>
                <code class=" error-response message"></code>
                <br>
              </div>

              <div class="col-12">
                <button class="btn btn-primary submit-form" type="submit">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection