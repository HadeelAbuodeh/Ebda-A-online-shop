@extends('User.app')
 @section('sign')
           <div class="d-flex justify-content-center flex-wrap ">

           <h1 class="ml3">WELCOME TO EBDA'A SHOP</h1><br><br>
          
           </div>
          
 <!--javascript for title animation  -->     
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script>var textWrapper = document.querySelector('.ml3');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
anime.timeline({loop: true})
  .add({
    targets: '.ml3 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 2250,
    delay: (el, i) => 150 * (i+1)
  }).add({
    targets: '.ml3',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });</script>

<div class="d-flex justify-content-center flex-wrap ">
         <h4 > FOR GIFTS AND MORE"</h4>
           </div>
           <br><br>
           <h3 class="mx-5"><i class="fa fa-navicon	"></i> Categories<hr></h3>

           <div class="d-flex justify-content-center flex-wrap ">
            @foreach($categories->chunk(4) as $chunk)
               <div class="card-group d-flex justify-content-center flex-wrap fade-in-image ">
                    @foreach($chunk as $category)
                      <a href="{{route('shp',$category)}}">
                      <div class="card bg-white text-white fade-in " style="max-width: 18rem;">
                      <img class="card-img-top category-image mx-2 " src="{{ URL::asset('/storage/'.$category->photo) }}" alt="Card image">
                      <div class="card-img-overlay">
                      <h5 class="card-title">{{$category->name}}</h5>
                       </div>
                        </div>
                        </a>
          @endforeach
            
            </div>
           @endforeach
           </div>
           <br><br><br><br>
           <div class=""id="about">
           <h3 class="mx-5  pt-3"><i class="fa fa-navicon	"></i> About Us<hr></h3>
           <div class="container ">
           <div class="row">
             <div class="col-6 text-center ">
              <p class="big">Ebda'a shop :we are an online shop for all kinds of gifts that you can imagine for all events ,we can make your own gift as you like with every thing you want , we also provide different collection from toys , different kinds and brands of perfuns , and some of international and local brands of makeup ,we help you to be special with your gift ,because the gift is avery kind thing even it was so simple . </p> 
             </div>
             <div class="col-6 text-center mt-5">
             <img src="/photos/logo3.jpg" class="img-fluid myimage">

             </div>
           </div>
           </div></div>
           <br><br><br><br>
           <div class="bg-dark">
             <div class="container">
           <div class="row py-4">
            <div class="col-sm-6 text-white mt-3">
              <h3>Contact with us :</h3>

            <a href="https://www.facebook.com/%D8%A5%D8%A8%D8%AF%D8%A7%D8%B9-%D9%84%D9%84%D9%87%D8%AF%D8%A7%D9%8A%D8%A7-%D9%88%D8%A7%D9%84%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%A7%D8%AA-2324370374263111" class="fa fi fa-facebook text-decoration-none mx-2"></a>
            <a href="https://www.instagram.com/ebdaa_for_gifts/?hl=en" class="fa fi fa-instagram mx-2"></a>
            <a  <i class='fa fi fa-whatsapp mx-2'></i><a class="vr" ></a></div>
             <div class="col-6 text-center mt-3 text-white">
             <h3>Call us :</h3>
             

             <p><a href="mailto:ebdaaforgifts.33@gmail.com?subject=subject" class="text-decoration-none text-white">ebdaaforgifts.33@gmail.com <i class="fa fa-envelope" aria-hidden="true"></i></a></p>
             <p>Nablus-ma'amon street-in-<br>
               front of Emam Ali school and mousqe <i class="fa fa-map-marker" aria-hidden="true"></i></p>
             </div>
           </div>
           </div></div>
           </div>
           @endsection