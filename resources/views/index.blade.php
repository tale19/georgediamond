@extends('layouts.master')

@section('title', 'Home')

@section('content')

  <div class="page-header">
    <div class="container">
      <div id="header-holder">
        <h1>Magic of George Diamond</h1>
        <h2>A show that has toured the entire world</h2>
      </div>
      {{-- <img src="images/background.png" alt="Background image" class="img-responsive visible-xs mobile-background"> --}}
      <div id="superfinalist">
        <span>Serbia's Got Talent<span style="display:inline-block; font-family: sans-serif; font-size: 1em;">&trade;</span> superfinalist</span>
        <a href="https://youtu.be/DSj25fuuE2o?t=6m8s" target="_blank" class="btn-lg">Watch on YouTube</a>
      </div> <!-- #superfinalist -->
    </div>  <!--container -->
  </div> <!--page-header -->

  <div id="index-content">

    <div id="intro" class="section-separator">
      <h3 class="index-subtitle">WHO IS GEORGE DIAMOND?</h3>
    </div>
    <section id="about-george" class="container-fluid">
      <div class="container">
        <span>George Diamond is a professional illusionist, magician and quick change artist, specializing in grand illusion, quick costume changes, stage magic, comedy magic and mentalism. Years of experience, a very specific performance style, as well as wide repertoire and unique choice of magic and illusions make his shows dazzling and entertaining for audiences of all ages, interests and countries.</span>
      </div>
    </section>

    <div id="wdyg" class="section-separator">
      <h3 class="index-subtitle">WHAT DO YOU GET?</h3>
    </div>
    <section id="offer" class="container-fluid">
      <div class="container">  
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="subtitle">Variety</div>
            <div class="image"><img src="/storage/images/magician-yellow.png"></div>
            <div class="subtext">There's an act for everyone: from your kid's birthday party to large stage shows</div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="subtitle">Experience</div>
            <div class="image"><img src="/storage/images/world-720.png"></div>
            <div class="subtext">George has had hundreds of international performances</div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="subtitle">Proven quality</div>
            <div class="image"><img src="/storage/images/magician-bow-orange.png"></div>
            <div class="subtext">Thousands of satisfied spectators have enjoyed George's shows</div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="subtitle">Flexible pricing</div>
            <div class="image"><img src="/storage/images/numbers-money.png"></div>
            <div class="subtext">We offer a pricing structure that will ensure you get the best value for your money</div>
          </div>
        </div> <!-- #numbers.row -->
      </div> <!-- .container -->
    </section> <!-- .container-fluid -->


    <div class="container">
      <div id="booking-box" class="jumbotron">
        <div>
          <h1>Making your event magical!</h1>
          <p>George Diamond is a world class entertainer, presenting shows that everyone will enjoy. From small shows, ideal for private parties, to big stage grandiose events for hundreds of guests, he will turn your special event into a memorable illusionary journey to a world of the impossible, and his lavish Vegas style shows will be an experience your guests will remember for a very long time!</p>
        </div>
        <hr>
        <div id="amazing-shows">
          <ul id="amazing-shows-list">
            <li class="amazing-show">amazing grand illusions</li>
            <li class="amazing-show">breathtaking quick costume changes</li>
            <li class="amazing-show">exotic mysteries of Chinese masks</li>
            <li class="amazing-show">hilarious comedy magic</li>
            <li class="amazing-show">classy stage magic</li>
            <li class="amazing-show">telepathy and mentalism</li>
            <li class="amazing-show" style="font-style: italic; text-transform: none;">... and much, much more</li>
          </ul>
          <img src="/storage/images/jumbotron-img.png" alt="jumbotron image" class="hidden-xs">
        </div> <!-- #amazing shows -->
        <div class="buttons">
          <p>You got me! Show me where to book!</p>
          <a href="/contact" type="button" class="btn btn-block btn-outline-primary">Book now!</a>
          <p>This sounds awesome! I want to find out more about George!</p>
          <a href="/about" type="button" class="btn btn-block btn-default text-success">Biography and credits</a>
          <p>Still uncertain? Don't take our word for it, check out his shows in action!</p>
          <a href="/shows" type="button" class="btn btn-block btn-default text-success">Shows</a>
        </div>
      </div>  <!-- jumbotron -->
    </div>  <!-- jumbotron container -->
    
  </div> <!-- #content -->

@endsection

@section('customScripts')
  <script type="text/javascript" src="js/index.js"></script>
@endsection
