
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,100;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
        
    </head>
    <body >
        <x-name-and-year-banner class="positionSticky"/>
        <div class="sky">    
        <div v-if="wishes" class="fullPageScroll">
            <img class="arrowImg" src="{{ asset('storage/images/arrow.png') }}" alt="Pilen peger på ønsket">
            <div class="hvidSky">
                <p class="skyInstructionText">Klik på billedet for at finde ønsket</p>
            </div>
        </div>

            <x-wish-list-item/>

            {{-- <WishListItem v-for="(wish, index) in wishes" :key="index" :wish="wish"></WishListItem> --}}
            <footer>
              <p>Det var årets ønsker god Jul!</p>
            </footer>
          </div>

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
      max-width: 768px;
    }
    
    html {
      height: 100vh;
      overflow-y: scroll;
      scroll-snap-type: y mandatory;
    }
    
    body {
      background-color: rgb(79, 77, 77);
    }
    
    .positionSticky {
      position: fixed;
      top:0;
      left: 50%;
      transform: translate(-50%);
    }
    
    .arrowImg {
      position: relative;
      width: 20vw;
      top: 6.5vh;
      left: 74vw;
      rotate: 100deg;
    }
    
    .hvidSky {
      width: 40vw;
      display: flex;
      justify-content: center;
      position: relative;
      top: 10vh;
      left: 50vw;
      padding: 8vw;
      background-image: url('/storage/images/Sky.png');
      background-repeat: no-repeat;
      background-size: contain;
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
    
    .sky {
      position: fixed;
      margin-top: 1vh;
    }
    
    footer {
      height: 15vh;
      width: 100vw;
      background-image: linear-gradient(45deg, #3f5f58ad, #517d74ab, rgb(34, 64, 41), rgb(22, 60, 45), rgb(13, 47, 33), rgb(5, 24, 16));
      animation: skyGradient 6s infinite alternate;
      background-size: 300%;
      background-position: right;
      border-radius: 25px 25px 0 0;
    }
    
    footer > p {
      color: white;
      font-size: 5vw;
      padding: 4vw;
    }
    
    @keyframes skyGradient {
      0% {
        background-position: right;
      }
    
      100% {
        background-position: left;
      }
    }
    
    
    </style>
    