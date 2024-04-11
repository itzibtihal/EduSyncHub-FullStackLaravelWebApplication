@extends('shared.navbar')


@section('main-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
<link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">


    <h1>Meet the STAFF</h1>

    <style>
        /*=============== GOOGLE FONTS ===============*/
@import url("https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@400;500;600&display=swap");

/*=============== VARIABLES CSS ===============*/
:root {
  /*========== Colors ==========*/
  /*Color mode HSL(hue, saturation, lightness)*/
  --first-color: hsl(38, 92%, 58%);
  --first-color-light: hsl(38, 100%, 78%);
  --first-color-alt: hsl(32, 75%, 50%);
  --second-color: hsl(195, 75%, 52%);
  --dark-color: hsl(212, 40%, 12%);
  --white-color: hsl(212, 4%, 95%);
  --body-color: hsl(212, 42%, 15%);
  --container-color: hsl(212, 42%, 20%);

  /*========== Font and typography ==========*/
  /*.5rem = 8px | 1rem = 16px ...*/
  --body-font: "Bai Jamjuree", sans-serif;
  --h2-font-size: 1.25rem;
  --normal-font-size: 1rem;
}

/*=============== BASE ===============*/
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}



a {
  text-decoration: none;
}

img {
  display: block;
  max-width: 100%;
  height: auto;
}

/*=============== CARD ===============*/
.containers {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.card__container {
  padding-block: 5rem;
}

.card__content {
  margin-inline: 1.75rem;
  border-radius: 1.25rem;
  overflow: hidden;
}

.card__article {
  width: 300px; /* Remove after adding swiper js */
  border-radius: 1.25rem;
  overflow: hidden;
}

.card__image {
  position: relative;
  background-color: var(--first-color-light);
  padding-top: 1.5rem;
  margin-bottom: -.75rem;
}

.card__data {
  background-color: #c7dcf3;
  padding: 1.5rem 2rem;
  border-radius: 1rem;
  text-align: center;
  position: relative;
  z-index: 10;
}

.card__img {
  width: 180px;
  margin: 0 auto;
  position: relative;
  z-index: 5;
}

.card__shadow {
  width: 200px;
  height: 200px;
  background-color: var(--first-color-alt);
  border-radius: 50%;
  position: absolute;
  top: 3.75rem;
  left: 0;
  right: 0;
  margin-inline: auto;
  filter: blur(45px);
}

.card__name {
  font-size: var(--h2-font-size);
  color: var(--second-color);
  margin-bottom: .75rem;
}

.card__description {
  font-weight: 500;
  margin-bottom: 1.75rem;
}

.card__button {
  display: inline-block;
  background-color: var(--first-color-light);
  padding: .75rem 1.5rem;
  border-radius: .25rem;
  color: var(--dark-color);
  font-weight: 600;
}

/* Swiper class */
.swiper-button-prev:after,
.swiper-button-next:after {
  content: "";
}

.swiper-button-prev,
.swiper-button-next {
  width: initial;
  height: initial;
  font-size: 3rem;
  color: var(--second-color);
  display: none;
}

.swiper-button-prev {
  left: 0;
}

.swiper-button-next {
  right: 0;
}

.swiper-pagination-bullet {
  background-color: hsl(212, 32%, 40%);
  opacity: 1;
}

.swiper-pagination-bullet-active {
  background-color: var(--second-color);
}

/*=============== BREAKPOINTS ===============*/
/* For small devices */
@media screen and (max-width: 320px) {
  .card__data {
    padding: 1rem;
  }
}

/* For medium devices */
@media screen and (min-width: 768px) {
  .card__content {
    margin-inline: 3rem;
  }

  .swiper-button-next,
  .swiper-button-prev {
    display: block;
  }
}

/* For large devices */
@media screen and (min-width: 1120px) {
  .card__container {
    max-width: 1120px;
  }

  .swiper-button-prev {
    left: -1rem;
  }
  .swiper-button-next {
    right: -1rem;
  }
}
    </style>

    <section class="containers" style="margin-top: -100px">
        <div class="card__container swiper">
            <div class="card__content">
                <div class="swiper-wrapper">


                    @foreach($users as $user)
                    <article class="card__article swiper-slide">
                        <div class="card__image">
                            @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar" class="card__img">
                        @else
                                <img src="{{ asset('assets/img/avatar-1.png') }}" alt="default-avatar" class="card__img">
                            @endif
                            <div class="card__shadow"></div>
                        </div>
                    
                        <div class="card__data">
                            <h3 class="card__name" style="color: rgb(0, 0, 0)">{{ $user->firstname }} {{ $user->lastname }}</h3>
                            <p class="card__description" style="color: rgb(36, 36, 36)">
                                {{ $user->email }},<br> {{ $user->phone }} <br>
                                @if($user->institution_name)
                                    {{ $user->institution_name }}
                                @else
                                    No institution
                                @endif
                            </p>
                    
                            <a href="#" class="card__button">Send message!</a>
                        </div>
                    </article>
                    @endforeach
                    

                   
                </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
                <i class="ri-arrow-right-s-line"></i>
            </div>

            <div class="swiper-button-prev">
                <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
     
    <script>
        let swiperCards = new Swiper(".card__content", {
            loop: true,
            spaceBetween: 32,
            grabCursor: true,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                600: {
                    slidesPerView: 2,
                },
                968: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

@endsection

@section('right-section')
    <div class="right-section">
        <div class="nav">
            <button id="menu-btn">
                <span class="material-icons-sharp">
                    menu
                </span>
            </button>
            <div class="dark-mode">
                <span class="material-icons-sharp active">
                    light_mode
                </span>
                <span class="material-icons-sharp">
                    dark_mode
                </span>
            </div>

            <div class="profile">
                <div class="info">
                    <p>Hey, <b>{{ Auth::user()->lastname }}</b></p>
                    <small class="text-muted">{{ Auth::user()->role()->first()->name }}</small>
                </div>
                <div class="profile-photo">
                    <img src="{{ asset('assets/images/profile-1.jpg') }}">
                </div>
            </div>

        </div>
        <!-- End of Nav -->





        <div class="user-profile">
            <div class="logo">
                <img src="{{ asset('assets/images/edubg.png') }}" id="logo-image">
                <h2>EduSyncHub</h2>
                <p>Espace Educatif </p>
            </div>
        </div>

        <div class="reminders">
            <div class="header">
                <h2>Reminders</h2>
                <span class="material-icons-sharp">
                    notifications_none
                </span>
            </div>

            <div class="notification">
                <div class="icon">
                    <span class="material-icons-sharp">
                        volume_up
                    </span>
                </div>
                <div class="content">
                    <div class="info">
                        <h3>Workshop</h3>
                        <small class="text_muted">
                            08:00 AM - 12:00 PM
                        </small>
                    </div>
                    <span class="material-icons-sharp">
                        more_vert
                    </span>
                </div>
            </div>

            <div class="notification deactive">
                <div class="icon">
                    <span class="material-icons-sharp">
                        edit
                    </span>
                </div>
                <div class="content">
                    <div class="info">
                        <h3>Workshop</h3>
                        <small class="text_muted">
                            08:00 AM - 12:00 PM
                        </small>
                    </div>
                    <span class="material-icons-sharp">
                        more_vert
                    </span>
                </div>
            </div>

            <div class="notification add-reminder">
                <div>
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>Add Reminder</h3>
                </div>
            </div>

        </div>

    </div>
@endsection
