var image = document.getElementById('header');

image.addEventListener('mouseover', function() { 
    image.setAttribute('style','-webkit-filter: brightness(2.0)'); 
}, false);

image.addEventListener('mouseout', function() { 
    image.setAttribute('style','-webkit-filter: brightness(1.0)'); 
}, false);
