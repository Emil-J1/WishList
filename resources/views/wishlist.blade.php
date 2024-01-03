<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wish-list</title>
</head>
<body>
  <section class="wishListNameContainer">
    <fieldset>
      <h1 class="wishListTitle">{{ $wishlist->wish_list_name }}</h1> 
    </fieldset>
  </section>
    
  <article class="wishContainer">
    {{-- <img class="arrowImg" src="{{ asset('storage/images/arrow.png') }}" alt="Pilen peger på ønsket">
    
    <div class="hvidSky">
      <p class="skyInstructionText">Click the image and find the wish.</p>
    </div> --}}
  
    @if ($wishes->count() > 0)
      @foreach ($wishes as $wish)
        <a class="singleWishOuterLinkStyling" href="{{ $wish->wish_product_link }}" target="_blank">
          <p class="singleWishContainer">{{ $wish->wish_product_name }}</p>
        </a>  
      @endforeach
      <style>
         footer {
          height: 12rem;
          background-image: linear-gradient(110deg, #588cda, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
          animation: breathingBackgroundGradient 6s infinite alternate;
          background-size: 300%;
          background-position: right;
          border-radius: 25px 25px 0 0;
          display: flex; 
          flex-direction: column;
          justify-content: start;
          padding-top: 2vh;
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


.wishListNameContainer {
    width: fit-content;
    max-width: 70%;
    margin-inline: auto;
    border-radius: 0 0 5vw 5vw;
    position: fixed;
    top:0;
    left: 50%;
    transform: translate(-50%);
  }
  
  .wishListNameContainer>fieldset {
    border: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    min-width: 50vw;
    padding: 3vw;
    border-radius: 0 0 5vw 5vw;
    background-image: linear-gradient(110deg, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
    animation: breathingBackgroundGradient 6s infinite alternate;
    background-size: 300%;
    background-position: right;
    backdrop-filter: blur(50px);
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
    justify-content: center;
    align-items: center;
    scroll-snap-align: start;
  }
  
  .wishContainer {
    position: relative;
  }
  .singleWishContainer {
    font-size: 3rem;
    color: #273076;
    font-weight: 200;
    width: 18rem;
    height: 18rem;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 12px;
    box-shadow: rgba(255, 255, 255, 0.2) 0px 0px 0px 1px inset, rgba(0, 0, 0, 0.9) 0px 0px 1px 2px;
    box-shadow: rgba(0, 0, 0, 0.2) 0px 60px 50px 30px;
  }
  
  .arrowImg {
    position: relative;
    bottom: 0;
    left:10%;
    float: right;
    rotate: 100deg;
    background-color: red;
  }
  
  .hvidSky {
    width: 250px;
    position: relative;
    top: 0;
    left: 10%;
    /* padding: 8vw; */
    background-image: url('/storage/images/Sky.png');
    background-repeat: no-repeat;
    background-size: contain;
    background-color: blue
  }
  
  .skyInstructionText {
    display: flex;
    text-align: center;
    color: black;
    padding-top: 1rem
    font-size: 3.5vw;
    text-shadow: .1px .1px #000;
    font-weight: 200;
  }
  
  .wishListAuthorName {
    font-size: 1rem;
    text-align: center;
    margin-bottom: .25rem;
  }
  footer > h3 {
    color: #273076;
    font-size: 5vw;
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
    