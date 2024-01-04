<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Wish-list</title>
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
    {{-- <img class="arrowImg" src="{{ asset('storage/images/arrow.png') }}" alt="Pilen peger på ønsket"> --}}
    
    {{-- <div class="hvidSky">
      <p class="skyInstructionText">Click the image and find the wish.</p>
    </div> --}}
  
    @if ($wishes->count() > 0)
      @foreach ($wishes as $wish)
        <a class="singleWishOuterLinkStyling" href="{{ $wish->wish_product_link }}" target="_blank">
          <article class="singleWishContainer">
            <img src="{{ $wish->wish_product_image ? $wish->wish_product_image : '/storage/images/gift-icon-without-background.png'}}" alt="{{ $wish->wish_product_name }}">
            <p>{{ $wish->wish_product_name }}</p>
          </article>
        </a>  
      @endforeach
      <style>
         footer {
            background-image: linear-gradient(110deg, #588cda, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
            animation: breathingBackgroundGradient 6s infinite alternate;
            background-size: 300%;
            background-position: right;
            border-radius: 25px 25px 0 0;
            display: flex; 
            flex-direction: column;
            justify-content: start;
            padding-top: 2rem;
            height: 30vh;
            scroll-snap-align: start;
          }
      </style>

    @else 
      <article class="emptyWishListContainer">
        <x-heroicon-o-gift class="giftImg"/>
        <p>Wow this wishlist is still empty - Lets hope someone fill it out soon!</p>
      
      <div class="buttonContainer">
        @auth
            <a class="cta-button" href="/user/wish-lists">See your Wishlists</a>
          @else
            <a class="cta-button" href="/user/login">Login</a>
            <a class="cta-button" href="/user/register">Sign-up</a>
        @endauth
      </div>
      </article>
        <style>
          body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
            max-width: 768px;
          }

          
          .emptyWishListContainer {
            height: 55vh;
            display: flex;
            flex-direction: column;
            justify-content: end;
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
            height: 10rem;
            background-image: linear-gradient(110deg, #588cda, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
            animation: breathingBackgroundGradient 6s infinite alternate;
            background-size: 300%;
            background-position: right;
            border-radius: 25px 25px 0 0;
            display: flex; 
            flex-direction: column;
            justify-content: center;
          }
        </style>
    @endif
    
  </article>

    <footer>
        <h2 class="wishListAuthorName">{{ $wishlist->user->name }}'s Wishlist</h2>
        <h3>That was all my wishes 🎁!</h3>

        <div class="buttonContainer">
          @auth
              <a class="cta-button" href="/user/wish-lists">See your Wishlists</a>
            @else
              <a class="cta-button" href="/user/login">Login</a>
              <a class="cta-button" href="/user/register">Sign-up</a>
          @endauth
        </div>
    </footer>

  @livewireScripts
</body>
</html>


<style scoped>

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
    
    html {
      min-height: 100vh;
      max-width: 768px; 
      overflow-y: scroll;
      scroll-snap-type: y mandatory;
    }

  body {
    max-width: 768px;
  }

.wishListNameContainer {
    width: fit-content;
    min-width: 55%;
    max-width: 350px;
    padding: 0 1rem 1rem 1rem;
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
    padding: 3vw;
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

  .wishContainer {
    position: relative;
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
  .singleWishContainer>img {
    max-width: 12rem;
    max-height: 15rem;
    margin-bottom: 1rem;
  }
  .singleWishContainer>p {
    font-size: 1.6rem;
    font-weight: 200;
    color: #273076;
    text-align: center;
    padding: 0 1rem;
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
    
    .wishListNameContainer {
      left: 370px;
      transform: translate(-200px);
    }
    
    .wishListNameContainer>fieldset {
      width: 50vw;
      max-width: 400px;
      padding: 1.2rem;
    }
  }

  /* .arrowImg {
    position: relative;
    top: 30vh;
    left: -8vw;
    float: right;
    rotate: 100deg;
    width: 150px;
  } */
  
  /* .hvidSky {
    height: 150px;
    position: relative;
    top: 40vh;
    right: 0;
    padding: 8vw;
    background-image: url('/storage/images/Sky.png');
    background-repeat: no-repeat;
    background-size: contain;
    background-color: #273076
  }
  
  .skyInstructionText {
    display: flex;
    text-align: center;
    color: black;
    padding-top: 1rem
    font-size: 3.5vw;
    text-shadow: .1px .1px #000;
    font-weight: 200;
  } */
</style>
    