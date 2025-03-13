
$(document).ready(function() {
    let currentIndex =0;
    const items = $(".temoignage-track .temoignage");
    const totalItems = items.length;

    function showTestimonial(index) {
        items.fadeOut(400);
        $(items[index]).fadeIn(400);
    }

    $(".next").click(function() {
        currentIndex = (currentIndex + 1) % totalItems;
        showTestimonial(currentIndex);
    });

    $(".prev").click(function() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        showTestimonial(currentIndex);
    });

    //Affichage du premier temoignage au chargemnt de la page
    showTestimonial(currentIndex);

});