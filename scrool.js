<script>
	$(document).ready(function() {
		$('.js-scrollTo').on('click', function() { // Au clic sur un élément
			let page = $(this).attr('href'); // Page cible
			let speed = 750; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
			return false;
		})
	});

</script>
