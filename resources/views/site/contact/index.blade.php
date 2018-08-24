<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="animated" data-animation="fadeInUp">تماس با ما</span> <span class="small-border animated" data-animation="fadeInUp"></span></h1>
        </div>
        <div class="col-md-8 animated" data-animation="fadeInUp" data-delay="200" data-speed="5">
            <form action='{{url('send')}}' id='contact_form' method="get" name="contactForm">
                <div class="row">
                    @include('flash::message')
                    <div class="col-md-6">
                        <div class='error' id='email_error'>لطفا آدرس صحیح ایمیل خود را وارد کنید.</div>
                        <div>
                            <input class="form-control" id='email' name='email' placeholder="ایمیل" type='text'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class='error' id='name_error'>لطفا نام خود را وارد کنید.</div>
                        <div>
                            <input class="form-control" id='name' name='name' placeholder="نام" type='text'>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class='error' id='message_error'>لطفا پیام خود را وارد کنید</div>
                        <div>
                            <textarea class="form-control" id='message' name='message' placeholder="پیام شما"></textarea>
                        </div>
                    </div>
                    <div class='success' id='mail_success'>پیام شما با مووفقیت ارسال شد.</div>
                    <div class='error' id='mail_fail'>با عرض پوزش، ارسال پیام با خطا مواجه شد.</div>
                    <div class="col-md-12">
                        <p id='submit'><input class="btn btn-border" type='submit' value='ارسال پیام'></p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <address>
                <span>
                    <i class="fa fa-map-marker fa-lg"></i>
                    {{ json_decode($setting['address'])->{0}->address }}
                </span>
                <span>
                    <i class="fa fa-phone fa-lg"></i>
                    {{ json_decode($setting['phone'])->{0}->number }}
                </span>
                <span>
                    <i class="fa fa-envelope-o fa-lg"></i>
                    <a href="mailto:{{ json_decode($setting['email'])->{0}->email }}">
                        {{ json_decode($setting['email'])->{0}->email }}
                    </a>
                </span>
            </address>
        </div>
    </div>
</div>