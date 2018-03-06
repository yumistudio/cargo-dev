	<div class="container-fluid side-padding rsvrn-buttons">		
		<div class="col-xs-12 col-sm-6 col-lg-3">	
			<a href="/wydarzenia/" class="reservation-btn">
				
				<div>
					<i class="icon-ticket"></i>
					<h4>Bilet <br />na event</h4>
				</div>
				
				<div class="txt"><?php the_field('buy_ticket_btn_text', 2); ?></div>
				<div class="btn"><?php the_field('buy_ticket_btn_text_btn', 2); ?></div>
				
			</a>
		</div>

		<div class="col-xs-12 col-sm-6 col-lg-3">	
        	<a class="reservation-btn" href="/rezerwacja/">
				<div>
					<i class="icon-table"></i>
					<h4>Rezerwacja Stolika</h4>
				</div>
				<div class="txt"><?php the_field('table_btn_text', 2); ?></div>
				<div class="btn"><?php the_field('table_btn_text_btn', 2); ?></div>
			</a>
		</div>

		<div class="col-xs-12 col-sm-6 col-lg-3">	
        	<a class="reservation-btn" href="/rezerwacja/?seat_type=lodge">
				<div>
					<i class="icon-lodge"></i>
					<h4>Rezerwacja Loży</h4>
				</div>
				<div class="txt"><?php the_field('lodge_btn_text', 2); ?></div>
				<div class="btn"><?php the_field('lodge_btn_text_btn', 2); ?></div>
			</a>
		</div>

		<div class="col-xs-12 col-sm-6 col-lg-3">	
        	<a class="reservation-btn" href="/oferta/">
				<div>
					<i class="icon-paper"></i>
					<h4>Oferta Biznesowa</h4>
				</div>
				<div class="txt"><?php the_field('offer_btn_text', 2); ?></div>
				<div class="btn"><?php the_field('offer_btn_text_btn', 2); ?></div>	
			</a>
		</div>
		
	</div>
<script>
(function( $ ) {
	$(function() {
		$('#home-menu > div:last').equalBoxes();
	});
})( jQuery );
</script>
