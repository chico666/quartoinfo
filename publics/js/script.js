$(document).ready(function() {
    $('#slideshow').rhinoslider({
        effect: 'slide',
        showTime: 3000,
        easing: 'easeInCubic',
        autoPlay: true,
        captionsFadeTime: 2500,
        showCaptions: 'never'
    });

    $('.act-excluir').click(function() {
        return confirm('Deseja excluir esse Menu?');
    });
});
