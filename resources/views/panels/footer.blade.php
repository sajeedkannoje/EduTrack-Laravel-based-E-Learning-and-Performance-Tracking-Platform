<!-- BEGIN: Footer-->
<footer class="footer footer-light {{($configData['footerType'] === 'footer-hidden') ? 'd-none':''}} {{$configData['footerType']}}">
  <p class="clearfix mb-0">
    <span class="float-md-start text-black d-block d-md-inline-block mt-25">COPYRIGHT &copy;
      <script>document.write(new Date().getFullYear())</script><br class="footer-br-display"><a class="ms-25 margin-left-none" href="{{config('setting.url.site-url')}}" target="_blank">

          <i id="dashboard-footer-green-text" class="text-primary fw-bold">Follow For Now</i>
      </a>,
      <span class="d-sm-inline-block">All rights Reserved</span>
    </span>
    {{-- <span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span> --}}
  </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
<script type="text/javascript">
$(document).ready(function(){
$('.link-list-item .g-text').attr('target', '_blank');
});
$(document).ready(function(){
$('.single-section-content a').attr('target', '_blank');
});
</script>
