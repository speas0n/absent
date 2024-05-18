let isFadedIn = false;
    const quoteElement = document.querySelector(".cat_moti");
    const imageElement = document.querySelector(".cat_png");

    function fade() {
        if (isFadedIn) {

            quoteElement.style.animationName = 'fadeout';
            quoteElement.style.animationDuration = '2s';
            quoteElement.style.animationTimingFunction = 'ease-in-out';
            quoteElement.style.opacity = 0;


            imageElement.src = 'img/cat2sleep.png';
            imageElement.classList.add('crossfade');
        } else {

            quoteElement.style.animationName = 'fadeIn';
            quoteElement.style.animationDuration = '2s';
            quoteElement.style.animationTimingFunction = 'ease-in-out';
            quoteElement.style.opacity = 1;


            imageElement.src = 'img/cat2awake.png';
            imageElement.classList.add('crossfade');
        }


        imageElement.addEventListener('animationend', function () {
            imageElement.classList.remove('crossfade');
        });

        isFadedIn = !isFadedIn;
    }

    quoteElement.addEventListener('click', fade);