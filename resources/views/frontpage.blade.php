<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Frontpage</title>
</head>

<body>
  <header>
    <h1>Your Wishlist app</h1>
  </header>

  <section class="hero-section">
    
    {{-- <a href="/user/wish-lists"><x-heroicon-o-gift class="giftImg"/></a> --}}
    
    <div class="gift3D">
      <script type="module" src="https://unpkg.com/@splinetool/viewer@1.0.25/build/spline-viewer.js"></script>
      <spline-viewer url="https://prod.spline.design/LlRHPRDcTdUUNZDL/scene.splinecode"></spline-viewer>
    </div>

    <h2>Welcome to your Wishlist webapplication!</h2>
    <p class="description">Create and manage your wishlists effortlessly.</p>
    <div class="buttonContainer">
      @auth
          <a class="cta-button" href="/user/wish-lists">See your Wishlists</a>
        @else
          <a class="cta-button" href="/user/login">Login</a>
          <a class="cta-button" href="/user/register">Sign-up</a>
      @endauth
    </div>
  </section>

  {{-- <div class="featured-wishlists">
    <!-- Add featured wishlist cards dynamically -->
    @foreach($wishlists as $wishlist)
        <div class="wishlist-card">
            <h3>{{ $wishlist->wish_list_name }}</h3>
            <p>{{ $wishlist->users.name }}</p>
            <a href="{{ route('view-wishlist', ['id' => $wishlist->id]) }}">View Wishlist</a>
        </div>
    @endforeach
  </div> --}}

  <footer>
    <h2>It's never to late to make <br> a wish!</h2>
  </footer>
  
</body>
</html>





<style>
  #app {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: black;
    font-size: 2vw;
  }
  
  * {
    font-family: 'Josefin Sans', sans-serif;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    max-width: 768px;
    text-align: center;
  }
  
  body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100vh;
    max-width: 768px;
  }

  header {
    height: 3rem;
    width: 60%;
    background-image: linear-gradient(110deg, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
    animation: breathingBackgroundGradient 6s infinite alternate;
    background-size: 300%;
    border-radius: 0 0 25px 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
  }
  header > h1 {
    font-size: 1.2rem;
    color: #273076;
  }

  .gift3D {
    /* display: none !important;
    visibility: hidden !important; */
    height: 30vh;
  }

  .giftImg {
    width: 6rem;
    height: 6rem;
    margin: 0 auto;
    animation: giftFalling 1s ease-in-out;
    color: black;
  }
    
  .hero-section {
    display: flex;
    flex-direction: column;
    justify-content: space-evenly; 
    min-height: 70vh;
    padding: 2rem;
    text-align: center;
    z-index: 10;
  }

  .description {
    font-size: 1rem;
    margin: 0 auto;
    width: 80%;
    color: rgb(50, 50, 50)
  }

  .buttonContainer {
    display: flex;
    justify-content: space-evenly;
    margin: 0 auto;
    width: 100%;
  }

  .cta-button {
    border: solid 2px #273076;
    padding: .5rem 1.5rem;
    color: #273076;
    text-decoration: none;
    border-radius: 5px;
    width: auto;
    height: 2.5rem;
    display: flex; 
    justify-content: center;  
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.15) 2.5px 12px 25px, rgba(0, 0, 0, 0.05) 0px 8px 25px;
  }
  .cta-button:hover {
    background-color: #273076;
    color: white;
    transition: all 0.2s ease-in-out;
    cursor: pointer;
  }      

  .featured-wishlists {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 2rem;
  }

  .wishlist-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 1rem;
    margin: 1rem;
    width: 300px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  footer {
    height: 10rem;
    background-image: linear-gradient(110deg, #588cda, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
    animation: breathingBackgroundGradient 4s infinite alternate;
    background-size: 300%;
    background-position: right;
    border-radius: 25px 25px 0 0;
    display: flex; 
    justify-content: center; 
    align-items: center;
  }
  
  footer > h2 {
    color: #273076;
    padding: 4vw;
    font-size: 1.2rem
  }
  
  @keyframes breathingBackgroundGradient {
    0% {
      background-position: right;
    }
  
    100% {
      background-position: left;
    }
  }

  @keyframes giftFalling {
    0% {
      transform: translateY(-100vh);
    }
  
    100% {
      transform: translateY(0);
    }
  }
  
</style>
    