<h1>{{ $wishlist->wish_list_name }} {{ $wishlist->wish_list_year }}</h1>
<h2>{{ $wishlist->users.name }}</h2>

@foreach ($wishes as $wish)
    <p>{{ $wish->name }}</p>
@endforeach


  <style scoped>
    .fullPageScroll {
      scroll-snap-align: start;
      overflow-y: none;
      height: 100vh;
    }
    
    section {
      height: 100vh;
      padding: 15vw;
      background-image: linear-gradient(110deg, #588cda, #a1d4e7, #D7F1FE, #E2E8FF, #C7CDFF, #D4BBFF, #C8C8FE, #E3C5FE);
      color: white;
    }
    
    .spacer {
      padding-top: 35%;
    }
    
    img {
      width: 80%;
      
    }
    
    a {
      color: black;
    }
    
    h1 {
      padding: 5vw 0 0.5vw 0vw;
      font-size: 5vw;
    }
    
    h2 {
      font-size: 3vw;
    }
    </style>