document.addEventListener('DOMContentLoaded', () => {
    // TICKER DUPE LOGIC
    const itemToClone = document.querySelector(".ticker__item");
    const container = document.querySelector(".ticker__inner");
    const numberOfClones = 2;
    var elementWidth = itemToClone.offsetWidth;

    for (let i = 0; i < numberOfClones; i++) {
        const clone = itemToClone.cloneNode(true);
        container.appendChild(clone);
    }

    const animationDuraction = {
        duration: 40000,
        iterations: Infinity,
    };

    var animationValues = [{
        left: `${0}px`
    }, {
        left: `${-elementWidth}px`
    }];
    const heroAnimation = container.animate(
        animationValues,
        animationDuraction
    );

    container.addEventListener("mouseenter", (e) => {
        heroAnimation.pause();
    });

    container.addEventListener("mouseleave", (e) => {
        heroAnimation.play();
    });

    // TICKER ITEM OVERLAY

    var tickerItems = document.querySelectorAll(".ticker-item__wrap");

    tickerItems.forEach((item) => {
        item.addEventListener("mouseenter", (e) => {
            item.querySelector(".ticker-item-back-card").classList.add("show-back");
        });
        item.addEventListener("mouseleave", (e) => {
            item
                .querySelector(".ticker-item-back-card")
                .classList.remove("show-back");
        });
    });

    // Text typer logic

    var vsOpts = {
        slides: document.querySelectorAll(".v-slide"),
        list: document.querySelector(".v-slides"),
        duration: 0.5,
        lineHeight: 50,
    };

    var vSlide = gsap.timeline({
        paused: true,
        repeat: -1,
    });

    vsOpts.slides.forEach(function(slide, i) {
        // Move each letter
        let neonate = gsap.from(slide, {
            duration: vsOpts.duration,
            y: 100,
            repeat: 1,
            yoyo: true,
            stagger: 2,
            repeatDelay: 1,
        });

        vSlide.add(neonate);
    });
    vSlide.play();

    // athena button logic

    var targetElement = document.querySelector(".target");
    const newDiv = document.createElement("div");
    const arrow = document.createElement("div");
    newDiv.classList.add("tooltip");
    newDiv.innerHTML =
        `<p>Athena is Medallia’s AI engine that gives answers to business questions, surfaces summaries, writes personalized correspondence, and more.</br> <a class="tooltip-link" href="/platform/athena">Learn about Athena AI &#10132;</a></p>`;
    targetElement.appendChild(newDiv);

    //gsap draggable logic

    gsap.registerPlugin(Draggable, InertiaPlugin);
    let mm = gsap.matchMedia();

    var draggables = document.querySelectorAll(".carousel-container");

    draggables.forEach((el) => {
        var carousel = el.querySelector(".carousel-hp");
        var barWidth = 0;
        var numberOfItems = carousel.querySelectorAll(".carousel-item-hp").length;

        var singleWidth = carousel.querySelector(".carousel-item-hp").clientWidth;
        var snapSize = 0;

        function onResize() {
            mm.add("(min-width: 1270px)", () => {
                barWidth =
                    singleWidth * numberOfItems + 10 * numberOfItems - singleWidth;
                snapSize = singleWidth + 10;
            });

            mm.add("(max-width: 1269px)", () => {
                barWidth =
                    singleWidth * numberOfItems + 20 * numberOfItems - singleWidth;
                snapSize = singleWidth + 20;
            });
        }
        onResize();
        window.addEventListener("resize", onResize);

        Draggable.create(carousel, {
            type: "x",
            inertia: true,
            bounds: {
                minX: -barWidth,
                maxX: 0
            },
            snap: gsap.utils.snap(snapSize),
        });

        // Navigation Logic

        try {
            
            let parent = el.parentElement;
            let nextArrow = parent.querySelector(".nav-arrows .right");
            let prevArrow = parent.querySelector(".nav-arrows .left");

            nextArrow.addEventListener("click", () => {
                gsap.to(carousel, {
                    x: `-=${snapSize}`,
                    duration: 0.5,
                    ease: "power2.inOut",
                    onComplete: updateArrows,
                });
            });
            prevArrow.addEventListener("click", () => {
                gsap.to(carousel, {
                    x: `+=${snapSize}`,
                    duration: 0.5,
                    ease: "power2.inOut",
                    onComplete: updateArrows,
                });
            });

            function updateArrows() {
                let currentX = gsap.getProperty(carousel, "x");

                if(currentX >= 0) {
                    prevArrow.classList.add("inactive");
                    prevArrow.style.pointerEvents = "none";
                } else {
                    prevArrow.classList.remove("inactive");
                    prevArrow.style.pointerEvents = "auto";
                }

                if(currentX <= -barWidth) {
                    nextArrow.classList.add("inactive");
                    nextArrow.style.pointerEvents = "none";
                } else {
                    nextArrow.classList.remove("inactive");
                    nextArrow.style.pointerEvents = "auto";
                }
            }

            updateArrows();

        } catch (error) {
            console.log("No navigation arrows found: ", error);
        }

    });

    // Blue CTA bar logic 

    var ctaBars = document.querySelectorAll('.blue-bar-cta');
    var ctaClose = document.querySelectorAll('.cta-close');
    var homeWrap = document.querySelector('.home-page__wrap');

    var myVar = "Experience is back! March 24–26, 2025 | Wynn Las Vegas";

    if (myVar) {
        homeWrap.classList.add('expanded');
    }

    ctaClose.forEach(el => {
        el.addEventListener('click', () => {
            ctaBars.forEach(element => {
                element.classList.add('closed')
                homeWrap.classList.remove('expanded');
            });
        })
    });


})