<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Wish-list</title>
    @php
      $totalWishes = count($wishes); // Tæller det samlede antal ønsker på ønskelisten
    @endphp
</head>
<body>
  <a href="/">
    <section class="wishListNameContainer">
      <fieldset>
        <h1 class="wishListTitle">{{ $wishlist->wish_list_name }}</h1> 
      </fieldset>
    </section>
  </a>
    
  <article class="wishContainer">
    @if ($wishes->count() > 0)
      @foreach ($wishes as $index => $wish)
        <a class="singleWishOuterLinkStyling" href="{{ $wish->wish_product_link }}" target="_blank">
          <article class="singleWishContainer">
            <p class="giftCount">{{ $index + 1 }} / {{ $totalWishes }}</p>
            <img src="{{ asset('storage/' . $wish->wish_product_image) ? asset('storage/' . $wish->wish_product_image) : asset('/storage/images/apple-touch-icon.png')}}" alt="{{ $wish->wish_product_name }}">
            <p class="giftName">{{ $wish->wish_product_name }}</p>
          </article>
        </a>  
      @endforeach
      <style>
         footer {
            height: auto;
            width: 96%;
            background-image: linear-gradient(110deg, #588cda, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
            animation: breathingBackgroundGradient 6s infinite alternate;
            background-size: 300%;
            background-position: right;
            border-radius: 25px 25px 0 0;
            display: flex; 
            flex-direction: column;
            justify-content: start;
            scroll-snap-align: start;
            padding-top: 2rem;
            padding-bottom: 2rem;
            margin: 0 auto;
          }
      </style>

    @else 
      <article class="emptyWishListContainer">
        <x-heroicon-o-gift class="giftImg"/>
        <p>Wow, denne ønskeliste er tom som en sparegris efter Black Friday - Det ændrer sig forhåbentligt snart!</p>
      
      <div class="buttonContainer">
        @auth
            <a class="cta-button" href="/user/wish-lists">Se dine ønskelister</a>
          @else
            <a class="cta-button" href="/user/login">Login</a>
            <a class="cta-button" href="/user/register">Opret dig her</a>
        @endauth
      </div>
      </article>
        <style>
          .emptyWishListContainer {
            display: flex;
            flex-direction: column;
            align-items: center; 
            text-align: center;
            font-size: 1.2rem;
            color: rgb(50, 50, 50)
          }

          .giftImg {
            width: 6rem;
            height: 6rem;
            animation: giftFalling 1s ease-in-out;
            color: black;
          }

          .emptyWishListContainer>p {
            margin-top: 1rem;
            width:70%;
          }
          
          footer {
            height: auto;
            width: 96%;
            background-image: linear-gradient(110deg, #588cda, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
            animation: breathingBackgroundGradient 6s infinite alternate;
            background-size: 300%;
            background-position: right;
            border-radius: 25px 25px 0 0;
            display: flex; 
            flex-direction: column;
            justify-content: center;
            padding-top: 2rem;
            padding-bottom: 2rem;
            margin: 0 auto;
          }


        </style>
    @endif
    
  </article>

    <footer>
        <h2 class="wishListAuthorName">{{ $wishlist->user->name }}'s Ønskeliste</h2>
        <h3>Det var alle mine ønsker!</h3>

        <div class="buttonContainer">
          @auth
              <a class="cta-button" href="/user/wish-lists">Se dine ønskelister</a>
            @else
              <a class="cta-button" href="/user/login">Login</a>
              <a class="cta-button" href="/user/register">Opret dig her</a>
          @endauth
        </div>
    </footer>

  @livewireScripts
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
    text-align: center;
  }
  
  html {
    min-height: 100vh;
    max-width: 768px; 
    overflow-y: scroll;
    scroll-snap-type: y mandatory;
  }
  
  body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100vh;
    max-width: 768px;
  }

  .wishListNameContainer {
    width: fit-content;
    margin-inline: auto;
    border-radius: 0 0 5vw 5vw;
    position: fixed;
    top:0;
    left: 50%;
    transform: translate(-50%);
    z-index: 100;
  }
  
  .wishListNameContainer>fieldset {
    border: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    padding: 1rem;
    border-radius: 0 0 22px 22px;
    background-image: linear-gradient(110deg, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
    animation: breathingBackgroundGradient 6s infinite alternate;
    background-size: 300%;
    background-position: right;
  }
  
  .wishListTitle {
    font-size: 1.2rem;
    color: #273076;
  }

  .singleWishOuterLinkStyling {
    text-decoration: none;
    height: 90vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    scroll-snap-align: start;
  }

  .singleWishContainer {
    font-size: 2rem;
    color: #273076;
    font-weight: 200;
    width: 350px;
    min-height: 22rem;
    max-height: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 12px;
    background-color: white;
    box-shadow: rgba(255, 255, 255, 0.2) 0px 0px 0px 1px inset, rgba(0, 0, 0, 0.9) 0px 0px 1px 2px;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 50px 30px;
  }

  .giftCount {
    min-height: 2rem;
    min-width: 2rem;
    display: flex;
    justify-content: center;
    align-items: center;
    align-self: flex-end;
    font-size: .8rem;
    color: #273076;
    border-radius: 100%;
    background-image: linear-gradient(110deg, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
    animation: breathingBackgroundGradient 6s infinite alternate;
    background-size: 300%;
    margin-right: .6rem;
    margin-top: .6rem;
  }

  .singleWishContainer>img {
    max-width: 15rem;
    max-height: 15rem;
    margin: .8rem 0;
    border-radius:5px;
  }
  .giftName {
    font-size: 1.6rem;
    font-weight: 200;
    color: #273076;
    text-align: center;
    padding: .5rem 1rem;
  }
  
  .buttonContainer {
    display: flex;
    justify-content: space-evenly;
    padding-top: 2rem;
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
  
  .wishListAuthorName {
    font-size: 1rem;
    text-align: center;
    margin-bottom: .25rem;
  }
  footer > h3 {
    color: #273076;
    font-size: 1.8rem;
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
    html {
      html {
      width: 100vw;
    }
    }

    .wishListNameContainer {
      height: fit-content;
      min-width: 20rem;
      margin: 0 auto;
    }

    .wishListNameContainer>fieldset {
      padding: 1.5rem;
    }

    body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 100svh;
      min-width: 100vw;
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
      height: auto;
      width: 65%;
      padding-top: 0rem;
      padding-bottom: 2rem;
      margin: 0 auto;
    }

    footer > h2 {
      color: #273076;
      margin-top: 2.5rem;
      font-size: 1.2rem
    } 
  }
</style>
    