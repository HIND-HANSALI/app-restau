<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card text-black">
          <!-- <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i> -->
          <img src="https://images.lifestyleasia.com/wp-content/uploads/sites/3/2021/10/08125938/sam-moqadam-yxZSAjyToP4-unsplash-scaled.jpg"
            class="card-img-top" alt="plat Computer" />
          <div class="card-body">
            <div class="text-center">
              <h5 class="card-title">{{$plat -> title}}</h5>
              
            </div>
            <div>
              <div class="d-flex justify-content-between">
                <span>Price :</span><span>200DH</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Description :</span><span>Descriptionnnn</span>
              </div>
              <div class="d-flex justify-content-between">
                <span>Date :</span><span>date here</span>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</x-app-layout>