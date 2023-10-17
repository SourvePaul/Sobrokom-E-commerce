<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow">Home </a>
                <i class="fa fa-arrow-right mr-2"></i> Pages 
                <i class="fa fa-arrow-right mr-2"></i> Contact us 
            </div>
        </div>
    </div>
    <section class="hero-2 bg-green">
        <div class="hero-content">
            <div class="container">
                <div class="text-center">
                    <h4 class="text-brand mb-20">Get in touch</h4>
                    <h1 class="mb-20 wow fadeIn animated font-xxl fw-900">
                        Let's Talk About <br>Your <span class="text-style-1">Idea</span>
                    </h1>
                    <p class="w-50 m-auto mb-50 wow fadeIn animated">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quam eius placeat, a quidem mollitia at accusantium reprehenderit pariatur provident nam ratione incidunt magnam sequi.</p>
                    <p class="wow fadeIn animated">
                        <a class="btn btn-brand btn-lg font-weight-bold text-white border-radius-5 btn-shadow-brand hover-up" href="{{route('about')}}">About Us</a>
                        <a class="btn btn-outline btn-lg btn-brand-outline font-weight-bold text-brand bg-white text-hover-white ml-15 border-radius-5 btn-shadow-brand hover-up" href="{{route('contact')}}">Support Center</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section-border pt-50 pb-50">
        <div class="container">
            <div id='map-panes' class="leaflet-map mb-50"></div>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="mb-15 text-brand">Office</h4>
                    41 #House, 6 #Road, E #Block<br>
                    Dhaka-1219<br>
                    <abbr title="Phone">Phone:</abbr> +880 31064735<br>
                    <abbr title="Email">Email: </abbr><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="294a46475d484a5d696c5f485b48074a4644">[email&#160;protected]</a><br>
                    <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fa fa-map-marker mr-10"></i>View map</a>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h4 class="mb-15 text-brand">Studio</h4>
                    205 North Michigan Avenue, Suite 810<br>
                    Chicago, 60601, USA<br>
                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                    <abbr title="Email">Email: </abbr><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c2f2322382d2f380c093a2d3e2d622f2321">[email&#160;protected]</a><br>
                    <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fa fa-map-marker mr-10"></i>View map</a>
                </div>
                <div class="col-md-4">
                    <h4 class="mb-15 text-brand">Shop</h4>
                    205 North Michigan Avenue, Suite 810<br>
                    Chicago, 60601, USA<br>
                    <abbr title="Phone">Phone:</abbr> (123) 456-7890<br>
                    <abbr title="Email">Email: </abbr><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9dfef2f3e9fcfee9ddd8ebfceffcb3fef2f0">[email&#160;protected]</a><br>
                    <a class="btn btn-outline btn-sm btn-brand-outline font-weight-bold text-brand bg-white text-hover-white mt-20 border-radius-5 btn-shadow-brand hover-up"> <i class="fa fa-map-marker mr-10"></i> View map</a>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 m-auto">
                    <div class="contact-from-area padding-20-row-col wow FadeInUp">
                        <h3 class="mb-10 text-center" style="font-weight: bold; font-size:30px;">DROP US A LINE</h3>
                        <p class="text-muted mb-30 text-center font-sm">Please Share Your Thought and Suggestions with us.</p>
                        <form class="contact-form-style text-center" id="contact-form" wire:submit.prevent="sendMessage">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-style mb-20">
                                        <input name="name" placeholder="Enter your full name..." type="text" wire:model="name">
                                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="email" placeholder="Enter Email" type="email" wire:model="email">
                                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="input-style mb-20">
                                        <input name="mobile" placeholder="Enter your mobile number" type="tel" wire:model="mobile">
                                        @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="textarea-style mb-30">
                                        <textarea name="message" placeholder="Message" wire:model="message"></textarea>
                                        @error('message')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <button class="submit submit-auto-width" type="submit">Send message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>