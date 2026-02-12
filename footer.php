<footer class="page-footer" style="margin-top: 120px; box-shadow: 0px 0px 2px white; background-color: rgb(255, 228, 196)">
  <div class="row wide-container">
    <div class="col s3">
      <h4 class="brown-text bold underline">Roti Sri Bakery</h4>
      <p class="black-text text-lighten-4">Your favorite Bakery.</p>
    </div>
    <div class="col s2">
      <h5 class="brown-text bold"  style=' text-decoration: underline'>Support</h5>
      <p><a class='dropdown-trigger brown-text bold' href='#' data-target='dropdown1'>Customer Care 
        <i class='material-icons' style=' text-decoration: none !important; display: inline-flex; vertical-align: top;'>arrow_drop_down</i>
      </a></p>
      <ul id='dropdown1' class='dropdown-content brown'>
        <li><a href='aboutUs.php' class='black-text bold'>About Us</a></li>
        <li class='divider' tabindex='-1'></li>
        <li class='divider' tabindex='-1'></li>
        <li><a href='contactUs.php' class='black-text bold'>Contact Us</a></li>
      </ul>
    </div>
    <div class="col s2">
      <h5 class="brown-text bold">Find Us</h5>
      <p class="black-text bold">
        Monday to Sunday : <br> 11.00am to 8.00pm
      </p>
      <p class="black-text bold">
        Roti Sri Bakery Vmall, <br>
        Universiti Utara Malaysia, <br> Changlun, 06010 Kedah
      </p>
    </div>
    <div class="col s2">
      <h5 class="brown-text bold">Social</h5>
      <a class="waves-effect waves-light blue lighten-1 btn" style="margin: 2px;">
        <i class="fa fa-facebook fa-fw"></i> Facebook
      </a>
      <a class="waves-effect waves-light pink lighten-1 btn" style="margin: 2px;">
        <i class="fa fa-instagram fa-fw"></i> Instagram
      </a>
    </div>
    <div class="col s3">
      <h5 class="brown-text bold ">Our Partners</h5>
      <img src="static\images\Partner.png" />
    </div>
  </div>
  <div class="footer-copyright" style="padding-bottom: 20px;">
    <div class="wide-container underline">© 2024 Roti Sri Bakery All rights reserved.</div>
  </div>

  <script>
    $(document).ready(function() {
      $('.dropdown-trigger').dropdown({
        coverTrigger: false
      });

      $('#pagination').pageMe({
        pagerSelector:'#myPager',
        activeColor: 'blue',
        prevText:'Previous',
        nextText:'Next',
        showPrevNext:true,
        hidePageNumbers:false,
        perPage:5
      });
      
    })
  </script>

</footer>