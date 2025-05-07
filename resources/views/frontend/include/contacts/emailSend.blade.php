
<div class="p-4 bg-grey rounded-10px">
    <form name="contactForm" id="contact_form" class="position-relative z1000" method="post" action="{{ route('emailSend') }}">
        @csrf
        <div class="field-set">
            <input type="text" name="name" id="name" class="form-control no-border" placeholder="Your Name" required>
        </div>

        <div class="field-set">
            <input type="text" name="email" id="email" class="form-control no-border" placeholder="Your Email" required>
        </div>

        <div class="field-set">
            <input type="text" name="phone" id="phone" class="form-control no-border" placeholder="Your Phone" required>
        </div>

        <div class="field-set">
            <input type="text" name="subject" id="subject" class="form-control no-border" placeholder="Subject" required>
        </div>

        <div class="field-set mb20">
            <textarea name="message" id="message" class="form-control no-border" placeholder="Your Message" required></textarea>
        </div>
            
        
        {{-- <div class="g-recaptcha" data-sitekey="6LdW03QgAAAAAJko8aINFd1eJUdHlpvT4vNKakj6"></div> --}}
        <div id='submit' class="mt20">
            <input type='submit' id='send_message' value='Send Message' class="btn-main">
        </div>

        <div id="success_message" class='success'>
            Your message has been sent successfully. Refresh this page if you want to send more messages.
        </div>
        <div id="error_message" class='error'>
            Sorry there was an error sending your form.
        </div>
    </form>
</div>