<!-- ============================================ -->
<!--                     FAQ                      -->
<!-- ============================================ -->
@extends('layouts.base')

@section('title', 'WoodLess - faq')
@section('content')
<style>
/*-- -------------------------- -->
<---            FAQ             -->
<--- -------------------------- -*/

/* Mobile - 360px */
@media only screen and (min-width: 0rem) {
    #faq-1193 {
        padding: var(--sectionPadding);
        position: relative;
        overflow: hidden;
    }
    #faq-1193 .cs-container {
        width: 100%;
        /* chnages to 1280px at desktop */
        max-width: 36.5rem;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* 40px - 48px */
        gap: clamp(2.5rem, 5vw, 3rem);
    }
    #faq-1193 .cs-content {
        text-align: left;
        max-width: 39.375rem;
    }

    #faq-1193 .cs-title {
        /* 20 characters wide including spaces */
        max-width: 20ch;
        margin: 0 0 2rem 0;
    }
    #faq-1193 .cs-faq-group {
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 1rem;
    }
    #faq-1193 .cs-faq-item {
        list-style: none;
        width: 100%;
        background-color: #f7f7f7;
        padding: 1.25rem;
        box-sizing: border-box;
        transition: border-bottom 0.3s;
    }
    #faq-1193 .cs-faq-item.active {
        border-color: var(--primaryLight);
    }
    #faq-1193 .cs-faq-item.active .cs-button {
        color: var(--primary);
    }
    #faq-1193 .cs-faq-item.active .cs-button:before {
        background-color: var(--primaryLight);
        transform: rotate(315deg);
    }
    #faq-1193 .cs-faq-item.active .cs-button:after {
        background-color: var(--primaryLight);
        transform: rotate(-315deg);
    }
    #faq-1193 .cs-faq-item.active .cs-item-p {
        height: auto;
        padding-top: 1rem;
        opacity: 1;
    }
    #faq-1193 .cs-button {
        /* 16px - 20px */
        font-size: clamp(1rem, 2vw, 1.25rem);
        line-height: 1.2em;
        text-align: left;
        font-weight: bold;
        padding: 0;
        border: none;
        background: transparent;
        color: var(--headerColor);
        display: block;
        width: 100%;
        position: relative;
        transition:
            background-color 0.3s,
            color 0.3s;
    }
    #faq-1193 .cs-button:hover {
        cursor: pointer;
    }
    #faq-1193 .cs-button:before {
        /* left line */
        content: "";
        width: 0.5rem;
        height: 0.125rem;
        background-color: var(--headerColor);
        opacity: 1;
        border-radius: 50%;
        position: absolute;
        display: block;
        top: 45%;
        right: 0.25rem;
        transform: rotate(45deg);
        /* animate the transform from the left side of the x axis, and the center of the y */
        transform-origin: left center;
        transition: transform 0.5s;
    }
    #faq-1193 .cs-button:after {
        /* right line */
        content: "";
        width: 0.5rem;
        height: 0.125rem;
        background-color: var(--headerColor);
        opacity: 1;
        border-radius: 50%;
        position: absolute;
        display: block;
        top: 45%;
        right: 0.0625rem;
        transform: rotate(-45deg);
        /* animate the transform from the right side of the x axis, and the center of the y */
        transform-origin: right center;
        transition: transform 0.5s;
    }
    #faq-1193 .cs-button-text {
        width: 90%;
        display: block;
    }
    #faq-1193 .cs-item-p {
        /* 14px - 16px */
        font-size: clamp(0.875rem, 1.5vw, 1rem);
        line-height: 1.5em;
        width: 90%;
        max-width: 33.8125rem;
        height: 0;
        margin: 0;
        padding: 0;
        opacity: 0;
        color: var(--bodyTextColor);
        /* clips the text so it doesn't show up */
        overflow: hidden;
        transition:
            opacity 0.3s,
            padding-bottom 0.3s;
    }
    #faq-1193 .cs-image-group {
        /* we use ems for everything in the container so they pull their value for em from the font size of this parent instead of the root element (html). This font size scales with the view width of the screen and stops when the font size equals the value of 1em (16px) and stops growing */
        font-size: min(2.43vw, 1em);
        width: 37.375em;
        height: 42.375em;
        display: block;
        position: relative;
    }
    #faq-1193 .cs-picture {
        display: block;
        position: absolute;
        z-index: 1;
    }
    #faq-1193 .cs-picture1 {
        width: 37.625em;
        height: 38.0625em;
        top: 0;
        left: 0;
    }
    #faq-1193 .cs-picture1 img {
        position: absolute;
        top: 0;
        left: 0;
        height: 95%;
        width: 100%;
        object-fit: cover;
    }
    
}
/* Desktop - 1024px */
@media only screen and (min-width: 64rem) {
    #faq-1193 .cs-container {
        max-width: 80rem;
        flex-direction: row;
        justify-content: space-between;
        align-items: stretch;
    }
    #faq-1193 .cs-content {
        width: 55%;
    }
    #faq-1193 .cs-image-group {
        font-size: min(1.4vw, 1em);
        height: auto;
        min-height: 42.375rem;
    }
    #faq-1193 .cs-picture1 {
        height: 90%;
    }
}
</style>
<section id="faq-1193">
    <div class="cs-container">
        <div class="cs-image-group">
            <picture class="cs-picture cs-picture1">
                <!--Mobile Image-->
                <source media="(max-width: 600px)" srcset="{{ asset('images\bedroom-8512933_1280.jpg') }}"
                <!--Tablet and above Image-->
                <source media="(min-width: 601px)" srcset="{{ asset('images\bedroom-8512933_1280.jpg') }}">
                <img loading="lazy" decoding="async" src="{{ asset('images\bedroom-8512933_1280.jpg') }}"> 
    
            </picture>
        </div>
        <div class="cs-content">
           
            <h2 class="cs-title">Frequently Asked Questions</h2>
            <ul class="cs-faq-group">
                <!-- Active class added as default -->
                <li class="cs-faq-item active">
                    <button class="cs-button">
                        <span class="cs-button-text">
                        What makes your furniture sustainable
                        </span>
                    </button>
                    <p class="cs-item-p">
                    Our sustainable furniture is made from responsibly sourced materials 
                    such as reclaimed wood, bamboo, or recycled materials. We prioritize 
                    eco-friendly manufacturing processes and strive to minimize our carbon footprint.
                    </p>
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                            What is your refund policy ?
                        </span>
                    </button>
                    <p class="cs-item-p">
                    What is your return policy?

                   We want you to be completely satisfied with your purchase. 
                   If for any reason you're not happy with your furniture, you can return 
                   it within 30 days  for a full refund or exchange. Please refer to our return policy for more details.
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                           What is your estiated shipping time?
                        </span>
                    </button>
                    <p class="cs-item-p">
                    Do you offer shipping options for large furniture items?

 We offer shipping options for all our furniture items, including larger pieces such as sofas and dining tables.
  Our shipping partners handle deliveries carefully and efficiently, ensuring that your furniture arrives safely 
  at your doorstep within 14 days.
                    </p>
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                        What steps do you take to minimize environmental impact?
                        </span>
                    </button>
                    <p class="cs-item-p">
                    We take several measures to minimize our environmental impact, 
                    including using eco-friendly materials, reducing waste in production processes,
                     and offsetting carbon emissions from shipping. We're committed to sustainability
                      every step of the way.
                    </p>
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                        Do you have a showroom where I can see the furniture in person?
                        </span>
                    </button>
                    <p class="cs-item-p">
                    As of present we  primarily operate online, However we are opening showroom locations in
                     select cities where you can view our furniture collections in person. 
                     So keep your eyes out for upddates on these.
                    </p>
                </li>
            </ul>
        </div>
    </div>
    <script>
    const faqItems = Array.from(document.querySelectorAll('.cs-faq-item'));
    for (const item of faqItems) {
        const onClick = () => {
            item.classList.toggle('active')
        }
        item.addEventListener('click', onClick)
    }
</script>
@endsection


                