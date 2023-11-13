<div>
    <section class="fullPageScroll" >
      <div class="spacer"></div>
      <a :href="wish.WishItemLink" target="_blank" loading="lazy">
        <img :src="wish.WishItemPicture" />
      </a>
    </section>
  </div>

  <script>
    export default {
      name: "WistListItem",
      props: {
        wish: Object
      }
    };
    </script>

  <style scoped>
    .fullPageScroll {
      scroll-snap-align: start;
      overflow-y: none;
      height: 100vh;
    }
    
    section {
      height: 100vh;
      padding: 15vw;
      background-image: rgb(54, 54, 54);
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