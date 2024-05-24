<footer class="footer">
	<div class="container">
		<div class="row">

			<div class="col-lg-3 col-md-12">
				<div class="footer-about">
					<div class="footer-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img src="<?php echo wp_get_attachment_url(get_theme_mod('custom_logo')); ?>" alt="Logo" /></a>
					</div>
					<div class="ftr-abt">
						<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently</p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4">
				<div class="rqst-mm">
					<h3>ABOUT US</h3>
					<ul>
						<li><a href="#">Text- 1</a></li>
						<li><a href="#">Text- 2</a></li>
						<li><a href="#">Text- 3</a></li>
						<li><a href="#">Text- 4</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4">
				<div class="rqst-mm">
					<h3>SERVICES</h3>
					<ul>
						<li><a href="#">Text- 1</a></li>
						<li><a href="#">Text- 2</a></li>
						<li><a href="#">Text- 3</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4">
				<div class="rqst-mm">
					<h3>CONTACT</h3>
					<ul>
						<li><a href="#">Text- 1</a></li>
						<li><a href="#">Text- 2</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-12">
				<div class="socials-footer">
					<div class="apps">
						<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?> /assets/images/app-store.png" alt="img"></a>
						<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?> /assets/images/play-store.png" alt="img"></a>
					</div>
					<div class="follow-us">
						<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>

		</div>
	</div>
</footer>

<script src="<?php echo get_stylesheet_directory_uri(); ?> /assets/js/jquery.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?> /assets/js/bootstrap.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?> /assets/js/owl.carousel.js"></script>
<script>
	owl = $('.testimonials');
	owl.owlCarousel({
		margin: 10,
		loop: true,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	})
</script>
<script>
	function openNav() {
		document.getElementById("mySidenavs").style.width = "280px";
	}

	function closeNav() {
		document.getElementById("mySidenavs").style.width = "0";
	}
</script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

<script>
	// jQuery(document).ready(function($) {
	// 	const paginationContainer = $('#pagination-container');

	// 	paginationContainer.on('click', '.pagination a', function(event) {
	// 		event.preventDefault();
	// 		const paged = $(this).attr('href');
	// 		loadProducts(paged);
	// 	});

	// 	function loadProducts(paged) {
	// 		$.ajax({
	// 			type: 'GET',
	// 			url: '<?php echo esc_url(admin_url('admin-ajax.php')); ?>',
	// 			data: {
	// 				action: 'more_post_ajax',
	// 				paged: paged,
	// 			},
	// 			success: function(data) {
	// 				$('.load-more-target').html(data);
	// 			}
	// 		});
	// 	}
	// });
</script>

<script>
	// jQuery(document).ready(function($) {
	// 	$('.tip-button').on('click', function() {
	// 		var amount = parseFloat($(this).data('amount')) / 100; // Convert to percentage
	// 		document.cookie = "tip_percentage=" + amount + ";path=/"; // Set cookie
	// 		location.reload(); // Reload the page to reflect changes
	// 	});
	// });
	// 	document.addEventListener('DOMContentLoaded', function () {
	//     var tipButtons = document.querySelectorAll('.tip-button');
	//     var tipAmountInput = document.getElementById('tip-amount');

	//     tipButtons.forEach(function (button) {
	//         button.addEventListener('click', function () {
	//             var amount = this.getAttribute('data-amount');
	//             tipAmountInput.value = amount;
	//         });
	//     });
	// });
	// jQuery('#tip-form').submit(function(event) {
	//     event.preventDefault();
	//     var link = "<?php // echo admin_url('admin-ajax.php'); 
						?>";
	//     var form = jQuery('#tip-form').serialize();
	//     var formData = new FormData();
	//     formData.append('action', 'form_data'); // Assuming 'contact_form' is the action name
	//     formData.append('form_data', form); // Changed 'contact-form' to 'form_data'

	//     jQuery.ajax({
	//         url: link,
	//         data: formData,
	//         type: 'post',
	//         processData: false, // To prevent jQuery from automatically processing the data
	//         contentType: false, // To prevent jQuery from automatically setting the content type
	//         success: function(result) {
	//             // Update the total value in the DOM
	//             //var newTotal = parseFloat(jQuery('.order-amount').text()) + parseFloat(result);
	//            // jQuery('.order-amount').text(newTotal.toFixed(2));
	//             // alert('result');
	//         },
	//         error: function(xhr, status, error) {
	//             console.error(xhr.responseText);
	//         }
	//     });
	// });
	// jQuery(document).ready(function($) {
	//     $('.tip-button').click(function() {
	//         var tipPercentage = $(this).data('amount');

	//         // Send AJAX request to store tip percentage
	//         $.ajax({
	//             url:  "<?php  //echo admin_url('admin-ajax.php'); 
							?>", // Use ajax_url defined by wp_localize_script
	//             type: 'POST',
	//             data: {
	//                 action: 'store_tip_percentage',
	//                 tip_percentage: tipPercentage
	//             },
	//             success: function(response) {
	//                 console.log('Tip percentage stored successfully');
	//             },
	//             error: function(error) {
	//                 console.error('Error storing tip percentage');
	//             }
	//         });
	//     });
	// });



	// 
</script>



<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script>
// 	$(document).ready(function() {
//     $('.category-checkbox').change(function() {
//         var categories = [];
//         $('.category-checkbox:checked').each(function() {
//             categories.push($(this).val());
// 			console.log(categories);
//         });
//         $.ajax({
//             url: '<?php echo admin_url('admin-ajax.php'); ?>',
//             type: 'post',
//             data: {
//                 action: 'custom_filter_movies',
//                 category: categories
//             },
//             success: function(response) {
//                 $('#custom_filtered-posts').html(response.html);
//             }
//         });
//     });
// });
</script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var tipButtons = document.querySelectorAll('.tip-button');
		var tipAmountInput = document.getElementById('tip-amount');

		tipButtons.forEach(function(button) {
			button.addEventListener('click', function() {
				var amount = this.getAttribute('data-amount');
				tipAmountInput.value = amount;
			});
		});
	});

	// jQuery(document).ready(function($) {

// // Function to get a cookie value by name
//        function getCookie(cookieName) {
// 			var name = cookieName + "=";
// 			var decodedCookie = decodeURIComponent(document.cookie);
// 			var cookieArray = decodedCookie.split(';');
// 			for (var i = 0; i < cookieArray.length; i++) {
// 				var cookie = cookieArray[i];
// 				while (cookie.charAt(0) == ' ') {
// 					cookie = cookie.substring(1);
// 				}
// 				if (cookie.indexOf(name) == 0) {
// 					return cookie.substring(name.length, cookie.length);
// 				}
// 			}
// 			return "";
// 		}

// 		// Find elements with class woocommerce-Price-amount and add class userSubtotalAmount
// 		$('.woocommerce-Price-amount').addClass('userSubtotalAmount');
// 		var storedNetAmount = getCookie("allAmount");
// 		// $('.test').children().text(storedNetAmount);
// 	});



	jQuery('#tip-form').submit(function(event) {
		event.preventDefault();
		var link = "<?php echo admin_url('admin-ajax.php'); ?>";
		var form = jQuery('#tip-form').serialize();
		var formData = new FormData();
		formData.append('action', 'form_data'); // Assuming 'contact_form' is the action name
		formData.append('form_data', form); // Changed 'contact-form' to 'form_data'



		jQuery.ajax({
			url: link,
			data: formData,
			type: 'post',
			processData: false, // To prevent jQuery from automatically processing the data
			contentType: false, // To prevent jQuery from automatically setting the content type
			success: function(result) {
				//var text = $('.test').children().text();
				console.log(text);
				var text = $('.test').children().text(); // Assuming this gives you: "₹7,200.00"
				var amount = parseFloat(text.replace(/[^\d.]/g, '')); // Removes currency symbol and converts to float
				// console.log(amount);
				// console.log(result);
				var netAmount = parseInt(amount) + parseInt(result);
				console.log(netAmount);
				 $('.test').children().text(netAmount);

				$('.test').children().html('₹'+netAmount+'.00');
				//var allAmount = $('.test').children().html('₹' + netAmount + '.00');

				//var allAmount = netAmount;
				
			},
			error: function(xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
	});
</script>

<pre>
<?php
global $woocommerce;
$woocommerce->cart->add_fee('tip', 40);
// print_r(get_class_methods($woocommerce->cart->add_fee());
?>
</pre>
<!-- <script>
    // Filter posts based on category
    jQuery(document).ready(function($) {
        $('.category-filter').on('change', function() {
            var category = $(this).val();

            // AJAX call to retrieve posts based on selected category
            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'filter_posts_by_category',
                    category: category,
                },
                success: function(response) {
                    $('#filtered-posts').html(response);
                }
            });
        });
    });
</script> -->

<!-- 
checkbox wala hai -->

 <script>
    // Filter posts based on category
    jQuery(document).ready(function($) {
        $('.category-checkbox').on('change', function() {
            var categories = [];
			console.log(categories);
            $('.category-checkbox:checked').each(function() {
                categories.push($(this).val());
            });

            // AJAX call to retrieve posts based on selected categories
            $.ajax({
                type: 'POST',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: 'filter_posts_by_category',
                    categories: categories,
                },
                success: function(response) {
                    $('#filtered-posts').html(response);
                }
            });
        });
    });
</script> 




<script>
   $(document).ready(()=>{
        $('.category-checkbox').change(function() {
        var categories = [];
        $('.category-checkbox:checked').each(function() {
            categories.push($(this).val());
			console.log(categories);
        });
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'post',
            data: {
                action: 'custom_filter_movies',
                category: categories
            },
            success: function(response) {
                $('#custom_filtered-posts').html(response.html);
            }
        });
    });
    })
</script> 

<script>
	jQuery(document).ready(function($) {
    $('#tip_amount').change(function() {
        var tipAmount = $(this).val();
        $.ajax({
            type: 'POST',
            url: wc_cart_params.ajax_url,
            data: {
                action: 'update_cart_totals',
                tip_amount: tipAmount
            },
            success: function(response) {
                $('body').trigger('update_checkout');
            }
        });
    });
});
</script>

<!-- <input type="hidden" name="admin_ajax_url" id="admin_ajax_url" value="<?php //echo admin_url('admin-ajax.php');?>"> -->

<?php wp_footer(); ?>
</body>

</html>