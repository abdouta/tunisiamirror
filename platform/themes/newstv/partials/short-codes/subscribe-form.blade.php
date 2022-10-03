<div class="sidebar-subscribe">
    <h4>{{__("Subscribe To")}} <br>{{__("To Get Latest")}}<span>{{__("Updates")}}</span> {{__("News")}}</h4>
    <!-- Newsletter Form -->
    <form
          id="subscribe-form" name="mc-embedded-subscribe-form"
          class="subscribe-form validate" >

        <div id="mc_embed_signup_scroll">
            <input id="csrf" name="csrf" type="hidden" value=" {{ csrf_token() }}">
            <label for="mce-EMAIL" class="d-none">Subscribe to our mailing list</label>
            <input type="email" value="" name="EMAIL" class="email" id="mce-email"
                   placeholder="{{__('Your email address')}}" required>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                                                                                      name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef"
                                                                                      tabindex="-1" value=""></div>
            <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button">{{__('Submit')}}</button>
        </div>
    </form>

</div>
<div class="custom-model-main">
    <div class="custom-model-inner">
        <div class="close-btn">×</div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
               <p id="pop-up-text"></p>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>
<script>


</script>
