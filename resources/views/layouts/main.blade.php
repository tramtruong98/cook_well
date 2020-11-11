<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{URL::asset('front/images/bg_1.jpg')}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
            <p><a href="#" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{URL::asset('front/images/bg_2.jpg')}});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
            <p><a href="#" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
        @foreach ($categories as $category)
        <div class="col-md-2 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <a href="/category/{{ $category->id }}">
            @if ($category-> name == "Vegetarian")
            <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-salad"></span>
            </div>     
            @endif
            @if ($category-> name == "Breakfast")
            <div class="icon bg-color-2 active d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-coffee-cup"></span>
            </div>     
            @endif
            @if ($category-> name == "Daily meal")
            <div class="icon bg-color-3 active d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-cereal"></span>
            </div>     
            @endif
            @if ($category-> name == "Vietnamese cuisine")
            <div class="icon bg-color-4 active d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-woman"></span>
            </div>     
            @endif
            @if ($category-> name == "Western food")
            <div class="icon bg-color-5 active d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-cheese"></span>
            </div>     
            @endif
            @if ($category-> name == "Sweets")
            <div class="icon bg-color-5 active d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-cupcake"></span>
            </div>     
            @endif
              </a>
              <div class="media-body">
                <h3 class="heading">{{ $category->name}}</h3>
              </div>
            </div>      
          </div>         
        @endforeach
</div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Our Recipes</span>
        <h2 class="mb-4">Publised By Community</h2>
        <p>Best recipes by own users</p>
      </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="/blog/{{ $post->id }}" class="img-prod"><img class="img-fluid" src="{{ $post->image }}" alt="Colorlib Template">
                        
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="/blog/{{ $post->id }}">{{ $post->course->name }}</a></h3>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            @endforeach
        </div>
    </div>
</section>