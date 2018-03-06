<?php
/**
 * Template Name: Rezerwacja
 *
 * @package WordPress
 * @since vilicon 1.0
 */

$dt = new DateTime();
$date = date_i18n( 'l, d F Y', date_timestamp_get($dt), false );
$initDate = date_i18n( 'Y-m-d', date_timestamp_get($dt), false );

get_header();
wp_enqueue_script( 'datetimepicker', get_theme_file_uri( '/assets/js/datetimepicker/build/jquery.datetimepicker.full.min.js' ), array( 'jquery' ), '1.0', true );
wp_enqueue_style( 'datetimepicker', get_theme_file_uri( '/assets/js/datetimepicker/build/jquery.datetimepicker.min.css' ) );
wp_enqueue_script( 'validate', get_theme_file_uri( '/assets/js/jquery-validation-1.17.0/dist/jquery.validate.js' ), array(), '', true );
wp_enqueue_script( 'validate-pl', get_theme_file_uri( '/assets/js/jquery-validation-1.17.0/dist/localization/messages_pl.min.js' ), array(), '', true );
wp_enqueue_script( 'yumi-reservation', get_theme_file_uri( '/assets/js/make-reservation.js' ), array( 'jquery' ), '1.0', true );
?>
<script>
window.ticketPrice = 0;
</script>

<section id="reservation-form" class="section-padding">
	<div class="max-width">
	<form id="checkout" class="checkout adq-billing" enctype="multipart/form-data" action="/quote-list/" method="post" name="checkout">
		<div id="date-selector" class="container-fluid field-row">
			<div class="col-xs-12 col-sm-3">
				<div class="form-label"><h2>Szczegóły</br>rezerwacji</h2></div>
			</div>
			<div class="col-xs-12 col-sm-5">
				<div id="#date-selector" class="md-form">
					<i class="icon icon-calendar prefix"></i>
					<input value="<?php echo $date; ?>" id="datePicker1" type="text" class="select form-control" readonly/>
					<input id="reservation_date" name="reservation_date" type="hidden" value="<?php echo $initDate; ?>" />
					<label for="datePicker1">Wybierz datę</label>
					<input id="product-id" name="product-id" type="hidden" value="460" />
				</div>

				<div class="md-form">
					<i class="icon icon-clock prefix"></i>
					<input id="reservation_time" name="reservation_time" type="text" class="select form-control w-50" required/>
					<i class="icon-dropdown selector-arrow"></i>
					<label for="reservation_time">Wybierz godzinę</label>
				</div>
                
                <div class="md-form">
				<i class="icon icon-group prefix"></i>
	                <div id="qty-selector" class="qty-selector">
						<div class="btn-nav decrease"><i class="icon-minus"></i></div>
						<input id="quantity" name="quantity" type="number" min="1" value="1" required/>
						<div class="btn-nav increase"><i class="icon-plus"></i></div>
						<label for="quantity" class="active">Liczba osób</label>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-offset-1 col-sm-3">
				<div class="hint">
					<?php the_field('reservation_hint'); ?>
				</div>
			</div>
		</div>
	
		<div class="separator-line"></div>

		<div class="customer-data">
			<div class="container-fluid field-row">
				<div class="col-xs-12 col-sm-3">
					<div class="form-label"><h2>Twoje</br>dane</h2></div>
				</div>
				<div class="col-xs-12 col-sm-5">
					<div class="col-md-6 no-gutters">
						<div class="text-field">
							<div class="md-form">
								<i class="icon icon-person prefix"></i>
								<input type="text" class="input-text form-control" name="billing_first_name" id="billing_first_name" value="" required/>
								<label for="billing_first_name">Imię</label>
							</div>
						</div>
					</div>
					<div class="col-md-6 no-gutters">
						<div class="text-field">
							<div class="md-form">
								<i class="icon prefix"></i>
								<input type="text" class="input-text form-control" name="billing_last_name" id="billing_last_name" value="" required/>
								<label for="billing_last_name">Nazwisko</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid field-row">
				<div class="col-xs-12 col-sm-3"></div>
				<div class="col-xs-12 col-sm-5">
					<div class="text-field">
						<div class="md-form">
							<i class="icon icon-mail prefix"></i>
							<input type="email" class="input-text form-control" name="billing_email" id="billing_email" value="" required/>
							<label for="billing_email">Adres e-mail</label>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid field-row">
				<div class="col-xs-12 col-sm-3"></div>
				<div class="col-xs-12 col-sm-5">
					<div class="text-field">
						<div class="md-form">
							<i class="icon icon-phone prefix"></i>
							<input type="tel" class="input-text form-control" name="billing_phone" id="billing_phone" value="" required/>
							<label for="billing_phone">Telefon</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="separator-line"></div>
		<div class="container-fluid field-row">
			<div class="col-xs-12 col-sm-3">
				<div class="form-label"><h2>Dodatkowe</br>uwagi</h2></div>
			</div>
			<div class="col-xs-12 col-sm-5">
				<div class="text-field md-form">
				<i class="prefix"></i>
					<textarea rows="5" id="order_comments" class="input-text md-textarea" name="order_comments"></textarea>
					<label for="form8">Specjalne prośby (np. butelka szampana)</label>
				</div>
			</div>
		</div>
		<div class="container-fluid field-row submit text-center">
			<div class="col-md-11">
			<button class="btn btn-secondary" type="submit">Wyślij</button></div>
		</div>
	</form>
<?php
while ( have_posts() ) : the_post();
endwhile; // End of the loop.
?>
<script>
</script>
</div>
</section>

<?php get_footer(); ?>