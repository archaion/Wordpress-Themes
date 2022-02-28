<footer>
    <a href='https://t.me/TraditionBooks' id='tg'></a>
    <a href='https://github.com/sunvvheel' id='gh'></a>
    <a href='https://twitter.com/TraditionBooks' id='tw'></a>
    <a href='https://gab.com/TraditionBooks' id='gb'></a>
    <?php //wp_footer(); 
    ?>
</footer>
</body>

</html>
<script>
    function toggleMenu() {
        ex.classList.toggle('hidden');
        dropdown.classList.toggle('offscreen');
        overlay.classList.toggle('disabled');
        burger.classList.toggle('hidden');
        if (document.getElementById('carousel')) carousel.classList.toggle('disabled');
    }
    burger.onclick = () => {
        toggleMenu();
    }
    ex.onclick = () => {
        toggleMenu();
    }
    document.onclick = (e) => {
        if (e.target.id == 'overlay') toggleMenu();
    }
    window.addEventListener('scroll', function() {
        if (window.scrollY > 150) {
            menuBar.classList.remove('rollUp');
        } else {
            menuBar.classList.add('rollUp');
            burger.classList.remove('hidden');
            ex.classList.add('hidden');
            overlay.classList.add('disabled');
            if (document.getElementById('carousel')) carousel.classList.remove('disabled');
            dropdown.classList.add('offscreen');
        }
    });

    arrow.onclick = () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    /*
    EXCERPT CAROUSEL
    var pages = document.getElementsByClassName('slide'),
    spans = document.getElementsByTagName('span'),
    oldWidth = Math.round((document.querySelector('.slide').getBoundingClientRect().width + 15)),
    oldLefts = new Array(),
    set = false,
    reset;

    var setLefts = function() { // set initial variables
        for (var i = 0; i < pages.length; i++) { 
            oldLefts[i]=pages[i].style.left.replace(/px/, '' ); 
            if (oldLefts[i]> -1 && oldLefts[i] < 1) { 
                oldLefts[i]=0; 
            } 
        } 
    }; 

    window.onload=setLefts(); // ADD STOP CONDITION FOR "NEXT" -> CHECK DIV WIDTH

    for (var i = 0; i < spans.length; i++) { 
        spans[i].addEventListener('click', function() { 
            var slide=this.closest('#carousel').querySelector('.slide'); // parent of clicked element 
            slide.style.transition='left 0.55s cubic-bezier(.4, .3, .35, 1)' ; // enable transition for event 
            var oldX=slide.style.left.replace(/px/, '' ); // current left position 
            var newX=Math.round((slide.getBoundingClientRect().width + 15) * 100) / 100; 
            if (oldX.charAt(0)=='-' ) { // replace dash character with negative sign 
                oldX=oldX.replace(/-/, '' ); 
                if (this.classList.contains('left')) { // no left scroll past original position 
                    slide.style.left=(-oldX + newX) + 'px' ; 
                } else if (this.classList.contains('right')) { 
                    slide.style.left=(-oldX - newX) + 'px' ; 
                } 
                } else { 
                    if (this.classList.contains('left')) { 
                        slide.style.left=(oldX + newX) + 'px' ; 
                    } else if (this.classList.contains('right')) { 
                        slide.style.left=(oldX - newX) + 'px' ; 
                    } 
                } 
                setTimeout(function() { slide.style.transition='none' ; setLefts(); }, 550); }); 
            } 
            window.addEventListener('resize', function() { 
                var newWidth=Math.round((document.querySelector('.slide').getBoundingClientRect().width + 15)); 
                if (set==false)(setLefts(), set=true); 
                clearTimeout(reset); 
                for (var i=0; i < pages.length; i++) { 
                    if (oldLefts[i] !=0) pages[i].style.left=oldLefts[i] - (newWidth - oldWidth) + 'px' ; 
                } 
                reset=setTimeout(function() { set=false; oldWidth=newWidth; }, 500); }); */
</script>