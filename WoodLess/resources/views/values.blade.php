@extends('layouts.base')

@section('title', 'WoodLess - About Us')
@section('content')
<style>
  /*-- -------------------------- -->
<---           Hero             -->
<--- -------------------------- -*/

/* Mobile - 360px */
#back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 1000;
    padding: 10px 20px;
    background-color: #007bff; 
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
@media only screen and (min-width: 0rem) {
  #hero-1619 {
    padding: var(--sectionPadding);
    /* 200px - 300px - leaving extra space for the navigation */
    padding-top: clamp(12.5rem, 31.95vw, 18.75rem);
    position: relative;
    z-index: 1;
  }
  #hero-1619 .cs-container {
    width: 100%;
    max-width: 80rem;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    /* 60px - 180px */
    gap: clamp(3.75rem, 13vw, 11.25rem);
  }
  #hero-1619 .cs-content {
    /* set text align to left if content needs to be left aligned */
    text-align: left;
    width: 100%;
    max-width: 48.75rem;
    display: flex;
    flex-direction: column;
    /* centers content horizontally, set to flex-start to left align */
    align-items: flex-start;
  }
  #hero-1619 .cs-topper {
    /* 13px - 16px */
    font-size: clamp(0.8125rem, 1.5vw, 1rem);
    line-height: 1.2em;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-align: center;
    text-transform: uppercase;
    margin-bottom: 0.25rem;
    color: var(--primary);
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    position: relative;
  }
  #hero-1619 .cs-chevron {
    --chevronColor: var(--primary);
    width: 3rem;
    height: auto;
  }
  #hero-1619 .cs-title {
    /* 39px - 61px */
    font-size: clamp(2.4375rem, 6.4vw, 3.8125rem);
    font-weight: 700;
    line-height: 1.2em;
    text-align: inherit;
    max-width: 100%;
    margin: 0 0 2.5rem 0;
    color: #fff;
    position: relative;
  }
  #hero-1619 .cs-text {
    /* 16px - 20px */
    font-size: clamp(1rem, 1.95vw, 1.25rem);
    line-height: 1.5em;
    text-align: inherit;
    width: 100%;
    /* 464px - 622px */
    max-width: clamp(29rem, 60vw, 38.785rem);
    margin: 0 0 2.5rem 0;
    color: #fff;
  }
  #hero-1619 .cs-button-solid {
    font-size: 1rem;
    /* 46px - 56px */
    line-height: clamp(2.875rem, 5.5vw, 3.5rem);
    text-decoration: none;
    font-weight: 700;
    margin: 0;
    color: #fff;
    padding: 0 1.5rem;
    background-color: var(--primary);
    display: inline-block;
    position: relative;
    z-index: 1;
  }
  #hero-1619 .cs-button-solid:before {
    content: '';
    position: absolute;
    display: block;
    height: 100%;
    width: 0%;
    background: #000;
    opacity: 1;
    top: 0;
    left: 0;
    z-index: -1;
    transition: width .3s;
  }
  #hero-1619 .cs-button-solid:hover:before {
    width: 100%;
  }
  #hero-1619 .cs-card-group {
    margin: 0;
    padding: 0;
    width: 100%;
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    /* 16px - 20px */
    gap: clamp(1rem, 2.3vw, 1.25rem);
  }
  #hero-1619 .cs-item {
    width: 100%;
    text-align: left;
    list-style: none;
    margin: 0;
    /* 24px - 32px */
    padding: clamp(1.5rem, 3vw, 2rem);
    background-color: #fff;
    box-shadow: 0px 12px 80px 0px rgba(26, 26, 26, 0.08);
    /* prevents padding from affecting height and width */
    box-sizing: border-box;
    grid-column: span 12;
    grid-row: span 1;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    position: relative;
    z-index: 1;
  }
  #hero-1619 .cs-icon {
    width: 3rem;
    height: auto;
    margin: 0 0 1.5rem 0;
  }
  #hero-1619 .cs-h3 {
    /* 20px - 25px */
    font-size: clamp(1.25rem, 2.5vw, 1.5625rem);
    line-height: 1.2em;
    font-weight: bold;
    text-align: inherit;
    margin: 0 0 1rem 0;
    color: var(--headerColor);
  }
  #hero-1619 .cs-item-text {
    /* 14px - 16px */
    font-size: clamp(0.875rem, 1.5vw, 1rem);
    line-height: 1.5em;
    max-width: 28.125rem;
    margin: 0;
    padding: 0;
    color: var(--bodyTextColor);
  }
  #hero-1619 .cs-background {
    width: 100%;
    height: 55%;
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -2;
  }
  #hero-1619 .cs-background:before {
    /* Overlay */
    content: '';
    width: 100%;
    height: 100%;
    background: #111926;
    opacity: .8;
    position: absolute;
    display: block;
    top: 0;
    left: 0;
    z-index: 1;
    /* prevents the cursor from interacting with it */
    pointer-events: none;
  }
  #hero-1619 .cs-background img {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    object-fit: cover;
    /* makes the top of the image start at the top of the parent */
    object-position: top;
  }
}
/* Tablet - 768px */
@media only screen and (min-width: 48rem) {
  #hero-1619 {
    padding-bottom: 0;
  }
  #hero-1619 .cs-container {
    align-items: flex-start;
  }
  #hero-1619 .cs-content {
    text-align: left;
    margin-left: 0;
    align-items: flex-start;
  }
  #hero-1619 .cs-item {
    grid-column: span 6;
  }
  #hero-1619 .cs-background {
    height: 87%;
  }
  #hero-1619 .cs-background:before {
    background: linear-gradient(90deg, #111926 21.41%, rgba(17, 25, 38, 0.72) 34.98%, rgba(17, 25, 38, 0) 62.53%);
    opacity: 1;
  }
}
/* Large Desktop - 1300px */
@media only screen and (min-width: 81.25rem) {
  #hero-1619 .cs-item {
    grid-column: span 3;
  }
}
/* Large Desktop Parallax Effect - 100px */
@media only screen and (min-width: 100rem) {
  #hero-1619 .cs-background {
    background:  src="{{asset('images/meeting-room-828547_1280.jpg')}}">
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    /* creates the parallax effect */
    background-attachment: fixed;
  }
  #hero-1619 .cs-background img {
    display: none;
  }
}
                                
                        
    </style>
    <section id="hero-1619">
    <div class="cs-container">
        <div class="cs-content">
        <a id="back-button" href="/about">Back</a>
            
            <h1 class="cs-title">Our Values</h1>
        
        </div>
        <ul class="cs-card-group">
            <li class="cs-item">
            <!-- <img class="cs-icon" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/speedometer.svg" alt="icon" width="48" height="48"> -->
                <h3 class="cs-h3">Innovation</h3>
                <p class="cs-item-text">
                Constantly pushing boundaries and exploring new ideas to stay ahead in the industry.
                </p>
            </li>
            <li class="cs-item">
                <!-- <img class="cs-icon" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/speedometer.svg" alt="icon" width="48" height="48"> -->
                <h3 class="cs-h3">Integrity</h3>
                <p class="cs-item-text">
                Upholding the highest ethical standards in all our actions and decisions.
                </p>
            </li>
            <li class="cs-item">
                <!-- <img class="cs-icon" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/Like.svg" alt="icon" width="48" height="48"> -->
                <h3 class="cs-h3">Customer-centric</h3>
                <p class="cs-item-text">
                Putting our customers' needs first and striving to exceed their expectations.
                </p>
            </li>
            <li class="cs-item">
                <!-- <img class="cs-icon" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/Like.svg" alt="icon" width="48" height="48"> -->
                <h3 class="cs-h3">Sustainability</h3>
                <p class="cs-item-text">
                Commitment to environmental responsibility and contributing positively to the communities we operate in.
                </p>
            </li>
        </ul>
    </div>

    <!-- Background Image, there's a background image in the CSS for the parallax effect you'll need to change as well if you swap out our images -->
    <picture class="cs-background">
        <source media="(max-width: 600px)" src="{{asset('images/meeting-room-828547_1280.jpg')}}">
        <source media="(min-width: 601px)" src="{{asset('images/meeting-room-828547_1280.jpg')}}">
        <img decoding="async" src="{{asset('images/meeting-room-828547_1280.jpg')}}"> alt="meeting" width="2250" height="1500" aria-hidden="true">
    </picture>
</section>
@endsection

