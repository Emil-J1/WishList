<div>
    <form class="colorPicker" action="">
        <fieldset class="hello">
          <p>Ønskeseddel 2023</p> 
      </fieldset>
    </form>
</div>
  
  <script>
  export default {
    name: "PickColorScheme",
    props: {
      textTest123: String,
    },
  };
  </script>
  
  <style scoped> 
  legend {
    font-size: 4vw;
  }
  
  .visually-hidden {
    width: auto;
    clip: rect(0 0 0 0);
    clip-path: inset(50%);
    overflow: hidden;
    /* position: absolute; */
    white-space: nowrap;
  }
  
  form {
    width: fit-content;
    margin-inline: auto;
    border-radius: 0 0 5vw 5vw;
  }
  
  .colorPicker>fieldset {
    border: 0;
    display: flex;
    justify-content: space-evenly;
    min-width: 50vw;
    width: fit-content;
    margin-inline: auto;
    gap: 4vw;
    padding: 3vw;
    border-radius: 0 0 5vw 5vw;
  
    background-image: linear-gradient(45deg, #3f5f58ad, #517d74ab, rgb(34, 64, 41), rgb(22, 60, 45), rgb(13, 47, 33), rgb(5, 24, 16));
    animation: skyGradient 6s infinite alternate;
    background-size: 300%;
    background-position: right;
    border: .2px solid #fff;
    border-top: none;
  }
  
  .colorPicker input[type="radio"] {
    height: 3.5vw;
    width: 3.5vw;
    appearance: none;
    border: 2px solid var(--radioColor, currentColor);
    border-radius: 50%;
    color: white;
  }
  
  p {
    font-size: 4vw;
    font-weight: 300;
    color: white;
  }
  
  
  @keyframes skyGradient {
    0% {
      background-position: left;
    }
  
    100% {
      background-position: right;
    }
  }
  </style>
  