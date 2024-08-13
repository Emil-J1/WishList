<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Forside</title>
</head>

<body>
  <header>
    <h1>Din ønskeliste</h1>
  </header>

  <section class="hero-section">
    
    <a href="/user/wish-lists"><x-heroicon-o-gift class="giftImg"/></a>

    <div class="descriptionContainer">
      <h2>Del din ønskeliste med dem du holder af!</h2>
      <p class="description">Opret og del din ønskeliste med få klik.</p>
    </div>
    <div class="buttonContainer">
      @auth
          <a class="cta-button" href="/user/wish-lists">Se dine ønskelister</a>
        @else
          <a class="cta-button" href="/user/login">Login</a>
          <a class="cta-button" href="/user/register">Opret konto</a>
      @endauth
    </div>
  </section>

  {{-- <div class="featured-wishlists">
    <!-- Add featured wishlist cards dynamically -->
    @foreach($wishlists as $wishlist)
        <div class="wishlist-card">
            <h3>{{ $wishlist->wish_list_name }}</h3>
            <p>{{ $wishlist->users.name }}</p>
            <a href="{{ route('view-wishlist', ['id' => $wishlist->id]) }}">Se ønskeliste</a>
        </div>
    @endforeach
  </div> --}}

  <footer>
    <h2>Det er aldrig for sent at få <br> opfyldt sine ønsker!</h2>
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
    height: 100%;
    overflow: hidden;
  }

  body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100svh;
    max-width: 768px;
  }

  header {
    height: 5rem;
    width: 60%;
    margin: auto;
    background-image: linear-gradient(110deg, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
    animation: breathingBackgroundGradient 6s infinite alternate;
    background-size: 300%;
    border-radius: 0 0 25px 25px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  header > h1 {
    height: 4.5rem;
    margin-top: 2.5rem;
    font-size: 1.2rem;
    color: #273076;
  }


  .giftImg {
    width: 6rem;
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
  .descriptionContainer {
    display: flex;
    flex-direction: column;
    font-family: ;
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
    font-weight: bold;
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
    width: 90%;
    background-image: linear-gradient(110deg, #588cda, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
    animation: breathingBackgroundGradient 4s infinite alternate;
    background-size: 300%;
    background-position: right;
    border-radius: 25px 25px 0 0;
    display: flex; 
    justify-content: center;
    align-items: center;
    align-self: center;
  }
  
  footer > h2 {
    color: #273076;
    margin-top: 3rem;
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

  @media only screen and (min-width: 769px) {

  * {
    max-width: 100vw;
  }
  
  header {
    height: 5rem;
    width: 40%;
  }

  body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 100svh;
    max-width: 100vw;
    place-items: center;
  }

  .description {
    font-size: 1.2rem;
  }

  .hero-section {
    display: flex;
    flex-direction: column;
    justify-content: center; 
    min-height: 70vh;
    padding: 8rem 0;
  }

  footer {
    width: 60%;
  }

  footer > h2 {
    color: #273076;
    margin-top: 5rem;
    font-size: 1.2rem
  }
}
  
</style>
    