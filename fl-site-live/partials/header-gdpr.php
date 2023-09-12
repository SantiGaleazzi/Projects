<script>
	
	(function($){

		$( document ).ready(function() {
			//Block Europe and Russia 

			// List of countries and continents we want to block
			var blacklistCountry = ['RU'];
			var blacklistContinent = ['EU'];

			// Getting the country code from the user's IP
			$.get("https://api.ipdata.co?api-key=93b2f0ceef78e8299e80e10f685188a0f7d0535efa221ec7f2eff524", function (response) {

			    // Checking if the user's country code is in the blacklist
			    // You could inverse the logic here to use a whitelist instead
			    if (blacklistCountry.includes(response.country_code) || blacklistContinent.includes(response.continent_code)) {
			      	window.location.href = "/eu-gdpr.html";
			      	window.location.origin + '/eu-gdpr.html';
			      	window.location.protocol + '/' + window.location.host + '/eu-gdpr.html' ;
			    }
			}, "jsonp");
		});
		
	})(jQuery);

</script>